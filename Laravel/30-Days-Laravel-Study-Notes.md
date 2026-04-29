# 📚 30 Days to Learn Laravel — Complete Study Notes
> Based on the 8-Hour Laracasts Course by Jeffrey Way  
> Tailored for: **VSCode + Laragon + MySQL Workbench**

---

## 🔧 YOUR SETUP (Before You Start)

| Tool | Purpose |
|------|---------|
| **VSCode** | Code editor |
| **Laragon** | Local server (Apache/Nginx + PHP + MySQL all-in-one) |
| **MySQL Workbench** | Visual database manager |

### Setup Checklist
- Laragon must be running before you work on any Laravel project
- In Laragon: click **Start All** to run Apache + MySQL
- MySQL Workbench connects to: Host `127.0.0.1`, Port `3306`, User `root`, Password *(empty by default)*
- In VSCode, open the Laravel project folder directly
- Use VSCode's integrated terminal (`Ctrl + backtick`) to run artisan commands

### Create a New Laravel Project
```bash
# In Laragon terminal or VSCode terminal:
composer create-project laravel/laravel my-project

# Or with Laravel installer:
laravel new my-project

cd my-project
php artisan serve  # starts dev server at http://localhost:8000
```
> With Laragon, your site is also auto-available at `http://my-project.test` — no need for `php artisan serve`.

---

## 📁 LARAVEL FOLDER STRUCTURE (What Each Folder Does)

```
my-project/
├── app/
│   ├── Http/
│   │   └── Controllers/     ← Your controller files go here
│   └── Models/              ← Your model files go here
├── database/
│   ├── migrations/          ← Database table definitions
│   ├── factories/           ← Fake data generators
│   └── seeders/             ← Scripts to populate DB
├── resources/
│   └── views/               ← Your Blade HTML templates go here
├── routes/
│   └── web.php              ← All your URL routes are defined here
├── public/                  ← The web root (index.php lives here)
├── .env                     ← Your environment config (DB credentials, etc.)
└── artisan                  ← Laravel's command-line tool
```

---

## 📗 MODULE 1: ROUTING & VIEWS (Episodes 1–6)

---

### Episode 1 — Hello, Laravel

Laravel is a PHP framework that follows the **MVC pattern** (Model-View-Controller).

The request lifecycle:
1. Browser sends a request → `public/index.php`
2. Laravel reads `routes/web.php` to find a matching route
3. That route calls a controller or returns a view
4. The view (HTML) is sent back to the browser

---

### Episode 2 — Your First Route and View

**Routes** are defined in `routes/web.php`.

```php
// Most basic route: just returns text
Route::get('/', function () {
    return 'Hello World';
});

// Return a Blade view (resources/views/home.blade.php)
Route::get('/', function () {
    return view('home');
});
```

**Views** are Blade files in `resources/views/`.

```html
<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html>
  <body>
    <h1>Welcome to Laravel!</h1>
  </body>
</html>
```

---

### Episode 3 — Create a Layout File Using Laravel Components

Instead of repeating HTML (header, footer) in every file, use a **component layout**.

```html
<!-- resources/views/components/layout.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>My App</title>
</head>
<body>
    <nav><!-- navigation here --></nav>

    {{ $slot }}  <!-- page content goes here -->

</body>
</html>
```

Use the layout in a page:
```html
<!-- resources/views/home.blade.php -->
<x-layout>
    <h1>This is the home page</h1>
</x-layout>
```

The `{{ $slot }}` is replaced with whatever you put inside `<x-layout>`.

---

### Episode 4 — Make a Pretty Layout Using TailwindCSS

Add Tailwind via CDN (quick, no build step):
```html
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
```

Tailwind uses utility classes directly in HTML:
```html
<h1 class="text-3xl font-bold text-blue-600">Hello!</h1>
<div class="flex gap-4 bg-gray-100 p-4">...</div>
```

---

### Episode 5 — Style the Currently Active Navigation Link

Detect the current URL in Blade to highlight the active nav link:

```html
<a href="/"
   class="{{ request()->is('/') ? 'text-blue-600 font-bold' : 'text-gray-600' }}">
    Home
</a>

<a href="/about"
   class="{{ request()->is('about') ? 'text-blue-600 font-bold' : 'text-gray-600' }}">
    About
</a>
```

Or extract into a reusable component:
```html
<!-- resources/views/components/nav-link.blade.php -->
@props(['href'])

<a href="{{ $href }}"
   class="{{ request()->is(ltrim($href, '/')) ? 'font-bold text-blue-500' : 'text-gray-600' }}">
    {{ $slot }}
</a>
```

---

### Episode 6 — View Data and Route Wildcards

**Pass data to views:**
```php
Route::get('/jobs', function () {
    $jobs = ['Developer', 'Designer', 'Manager'];
    return view('jobs', ['jobs' => $jobs]);
    // OR shorthand:
    return view('jobs', compact('jobs'));
});
```

**Display in Blade:**
```html
@foreach ($jobs as $job)
    <li>{{ $job }}</li>
@endforeach
```

**Route Wildcards (dynamic URLs):**
```php
Route::get('/jobs/{id}', function ($id) {
    return "Job ID: " . $id;
});
```

URL: `/jobs/5` → `$id = 5`

`{{ }}` in Blade **escapes HTML** (safe). Use `{!! !!}` only if you trust the content.

---

## 📘 MODULE 2: DATABASE & ELOQUENT (Episodes 7–15)

---

### Episode 7 — Autoloading, Namespaces, and Models

**Autoloading** = PHP automatically finds and loads class files. You never need `require` or `include`.

**Namespaces** = like folders for classes, preventing name conflicts.

```php
namespace App\Models;  // This file lives in app/Models/

use Illuminate\Database\Eloquent\Model;

class Job extends Model {
    // ...
}
```

In a controller or route, you import it:
```php
use App\Models\Job;

$jobs = Job::all();
```

---

### Episode 8 — Introduction to Migrations

**Migrations** = PHP files that define your database tables. Think of them as version control for your database.

**Create a migration:**
```bash
php artisan make:migration create_jobs_table
```

**Edit the migration file** (in `database/migrations/`):
```php
public function up(): void
{
    Schema::create('jobs', function (Blueprint $table) {
        $table->id();                    // AUTO INCREMENT primary key
        $table->string('title');         // VARCHAR
        $table->string('employer');
        $table->decimal('salary', 10, 2);
        $table->timestamps();            // created_at and updated_at
    });
}
```

**Run migrations (creates tables in MySQL):**
```bash
php artisan migrate
```

> In MySQL Workbench, refresh and you'll see the new `jobs` table appear!

**Useful migration commands:**
```bash
php artisan migrate          # Run new migrations
php artisan migrate:rollback # Undo last batch
php artisan migrate:fresh    # Drop ALL tables and re-run all migrations
php artisan migrate:status   # See which migrations have run
```

**⚠️ `.env` setup for MySQL Workbench:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel        # Create this DB in MySQL Workbench first!
DB_USERNAME=root
DB_PASSWORD=               # Empty by default in Laragon
```

To create the database in MySQL Workbench: click the cylinder icon → "Create Schema" → name it `laravel` → Apply.

---

### Episode 9 — Meet Eloquent

**Eloquent** is Laravel's ORM (Object-Relational Mapper). It lets you interact with database tables using PHP objects instead of raw SQL.

**Create a Model:**
```bash
php artisan make:model Job
```

Each model automatically maps to a table. `Job` → `jobs` table.

**Basic Eloquent operations:**
```php
// Get all records
$jobs = Job::all();

// Find by ID
$job = Job::find(1);

// Get first match
$job = Job::where('salary', '>', 50000)->first();

// Get all matches
$jobs = Job::where('employer', 'Google')->get();

// Create a new record
Job::create([
    'title' => 'Laravel Developer',
    'employer' => 'Laracasts',
    'salary' => 70000,
]);

// Update
$job = Job::find(1);
$job->title = 'Senior Developer';
$job->save();

// Delete
Job::find(1)->delete();
```

**Mass Assignment Protection:**
In your model, define `$fillable` to allow mass assignment:
```php
class Job extends Model {
    protected $fillable = ['title', 'employer', 'salary'];
}
```

Or allow all (less safe for production):
```php
protected $guarded = [];
```

---

### Episode 10 — Model Factories

**Factories** generate fake data for testing and development. 

```bash
php artisan make:factory JobFactory --model=Job
```

Edit `database/factories/JobFactory.php`:
```php
public function definition(): array
{
    return [
        'title'    => fake()->jobTitle(),
        'employer' => fake()->company(),
        'salary'   => fake()->numberBetween(40000, 120000),
    ];
}
```

Use it in tinker or a seeder:
```bash
php artisan tinker
```
```php
// In tinker:
App\Models\Job::factory(10)->create(); // Creates 10 fake jobs in DB
```

---

### Episode 11 — Two Key Eloquent Relationship Types

**hasMany** — One record has many related records

```php
// app/Models/Employer.php
class Employer extends Model {
    public function jobs() {
        return $this->hasMany(Job::class);
    }
}
```
Usage: `$employer->jobs` → returns all jobs for that employer

**belongsTo** — The inverse (a job belongs to one employer)

```php
// app/Models/Job.php
class Job extends Model {
    public function employer() {
        return $this->belongsTo(Employer::class);
    }
}
```
Usage: `$job->employer` → returns the employer for that job

> In the `jobs` table, you need an `employer_id` column to link them.

```php
$table->foreignIdFor(Employer::class)->constrained()->cascadeOnDelete();
// This adds employer_id + foreign key constraint
```

---

### Episode 12 — Pivot Tables and BelongsToMany

**Many-to-Many** = e.g., a Job can have many Tags, and a Tag can belong to many Jobs.

You need a **pivot table** (a middle table):
```bash
php artisan make:migration create_job_tag_table
```
```php
$table->id();
$table->foreignIdFor(Job::class)->constrained()->cascadeOnDelete();
$table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
$table->timestamps();
```

Define relationships:
```php
// In Job model:
public function tags() {
    return $this->belongsToMany(Tag::class);
}

// In Tag model:
public function jobs() {
    return $this->belongsToMany(Job::class);
}
```

Usage:
```php
$job->tags           // All tags for a job
$tag->jobs           // All jobs with this tag

// Attach/Detach:
$job->tags()->attach($tagId);
$job->tags()->detach($tagId);
$job->tags()->sync([$tag1Id, $tag2Id]); // Sync exactly
```

---

### Episode 13 — Eager Loading and the N+1 Problem

**The N+1 Problem:**
```php
// ❌ BAD - runs 1 query for jobs, then 1 query PER JOB for employer = N+1 queries
$jobs = Job::all();
foreach ($jobs as $job) {
    echo $job->employer->name; // Each access fires a new query!
}
```

**The Fix — Eager Loading:**
```php
// ✅ GOOD - runs 2 queries total (1 for jobs, 1 for all employers)
$jobs = Job::with('employer')->get();
```

Load multiple relationships:
```php
$jobs = Job::with(['employer', 'tags'])->get();
```

You can detect N+1 issues by enabling:
```php
// In AppServiceProvider::boot()
Model::preventLazyLoading();
```

---

### Episode 14 — Pagination

```php
// In your route or controller:
$jobs = Job::paginate(10);   // 10 per page

// In your Blade view:
@foreach ($jobs as $job)
    <li>{{ $job->title }}</li>
@endforeach

{{ $jobs->links() }}  // Renders the page links automatically
```

Customise with Tailwind styling:
```bash
php artisan vendor:publish --tag=laravel-pagination
```

---

### Episode 15 — Database Seeders

**Seeders** populate your database with initial/demo data.

```bash
php artisan make:seeder DatabaseSeeder
```

```php
// database/seeders/DatabaseSeeder.php
public function run(): void
{
    // Create 3 employers, each with 5 jobs
    Employer::factory(3)
        ->has(Job::factory(5))
        ->create();
}
```

Run seeders:
```bash
php artisan db:seed

# Or wipe and re-seed everything at once:
php artisan migrate:fresh --seed
```

---

## 📙 MODULE 3: FORMS & CRUD (Episodes 16–18)

---

### Episode 16 — Forms and CSRF

**CSRF (Cross-Site Request Forgery)** = an attack where a malicious site tricks a user's browser into making unwanted requests to your app.

Laravel blocks this automatically. You just need to add `@csrf` in every form:

```html
<form method="POST" action="/jobs">
    @csrf   <!-- Adds a hidden token field -->

    <input type="text" name="title" placeholder="Job Title">
    <button type="submit">Submit</button>
</form>
```

**Form Method Spoofing** — HTML forms only support GET and POST. For PUT/PATCH/DELETE, add:
```html
<form method="POST" action="/jobs/1">
    @csrf
    @method('DELETE')   <!-- Tells Laravel to treat this as DELETE -->
    <button>Delete Job</button>
</form>
```

---

### Episode 17 — Validation

**Never trust user input!** Always validate on the server.

```php
// In your controller:
public function store(Request $request)
{
    $validated = $request->validate([
        'title'    => ['required', 'min:3', 'max:255'],
        'employer' => ['required'],
        'salary'   => ['required', 'numeric', 'min:1'],
    ]);

    Job::create($validated);
    return redirect('/jobs');
}
```

**Show validation errors in Blade:**
```html
<input type="text" name="title" value="{{ old('title') }}">

@error('title')
    <p class="text-red-500">{{ $message }}</p>
@enderror
```

`old('title')` repopulates the field after failed validation so users don't retype everything.

---

### Episode 18 — Editing, Updating, and Deleting (Full CRUD)

**RESTful resource routes** follow a naming convention:

| Method | URL | Action | Route Name |
|--------|-----|--------|------------|
| GET | /jobs | List all | jobs.index |
| GET | /jobs/create | Show create form | jobs.create |
| POST | /jobs | Store new | jobs.store |
| GET | /jobs/{id} | Show one | jobs.show |
| GET | /jobs/{id}/edit | Show edit form | jobs.edit |
| PUT/PATCH | /jobs/{id} | Update | jobs.update |
| DELETE | /jobs/{id} | Delete | jobs.destroy |

**One line to define all 7 routes:**
```php
Route::resource('jobs', JobController::class);
```

**Create the controller:**
```bash
php artisan make:controller JobController --resource
```

**Example Controller Methods:**
```php
class JobController extends Controller
{
    public function index() {
        return view('jobs.index', ['jobs' => Job::all()]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function store(Request $request) {
        $data = $request->validate([...]);
        Job::create($data);
        return redirect('/jobs');
    }

    public function edit(Job $job) {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job) {
        $data = $request->validate([...]);
        $job->update($data);
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job) {
        $job->delete();
        return redirect('/jobs');
    }
}
```

**Route Model Binding** = Laravel automatically fetches the model by ID from the URL:
```php
// Laravel sees {job} in the route, fetches Job::find($id) automatically
public function edit(Job $job) { ... }
```

---

## 📕 MODULE 4: ROUTING, AUTH & AUTHORIZATION (Episodes 19–23)

---

### Episode 19 — Routes Reloaded: 6 Essential Tips

```php
// 1. Named routes — reference by name, not URL
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
// In Blade: <a href="{{ route('jobs.index') }}">Jobs</a>

// 2. Route prefixes — group related routes
Route::prefix('admin')->group(function () {
    Route::get('/jobs', ...);   // /admin/jobs
    Route::get('/users', ...);  // /admin/users
});

// 3. Only/Except on resource routes
Route::resource('jobs', JobController::class)->only(['index', 'show']);
Route::resource('jobs', JobController::class)->except(['destroy']);

// 4. Redirect routes
Route::redirect('/old-url', '/new-url');

// 5. List all routes
// php artisan route:list

// 6. Fallback route (404 handler)
Route::fallback(function () {
    return view('errors.404');
});
```

---

### Episode 20 — Starter Kits, Breeze, and Middleware

**Laravel Breeze** = a starter kit that scaffolds auth (login, register, password reset) with minimal code.

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

**Middleware** = code that runs before or after a route handler. Used for auth checks, logging, etc.

```php
// Protect a route — only logged-in users can access
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Protect a group of routes
Route::middleware('auth')->group(function () {
    Route::get('/jobs/create', ...);
    Route::post('/jobs', ...);
});
```

---

### Episode 21 & 22 — Build Login/Registration From Scratch

**Registration:**
```php
// Store user
public function store(Request $request) {
    $data = $request->validate([
        'name'     => 'required',
        'email'    => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed', // 'confirmed' checks password_confirmation field
    ]);

    $data['password'] = bcrypt($data['password']); // Always hash!
    $user = User::create($data);
    Auth::login($user);  // Log them in immediately
    return redirect('/dashboard');
}
```

**Login:**
```php
public function store(Request $request) {
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        return redirect('/dashboard');
    }

    return back()->withErrors(['email' => 'Credentials do not match.']);
}
```

**Logout:**
```php
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect('/');
```

---

### Episode 23 — Authorization (Gates & Policies)

**Authorization** = what an authenticated user is *allowed* to do.

**Gates** (simple, closure-based):
```php
// In AppServiceProvider::boot()
Gate::define('edit-job', function (User $user, Job $job) {
    return $job->employer->user_id === $user->id;
});
```

Use in controller:
```php
Gate::authorize('edit-job', $job); // Throws 403 if not allowed
// OR:
if (Gate::allows('edit-job', $job)) { ... }
```

Use in Blade:
```html
@can('edit-job', $job)
    <a href="/jobs/{{ $job->id }}/edit">Edit</a>
@endcan
```

**Policies** (class-based, for models):
```bash
php artisan make:policy JobPolicy --model=Job
```
```php
class JobPolicy {
    public function edit(User $user, Job $job): bool {
        return $job->employer->user_id === $user->id;
    }
}
```
Laravel auto-discovers policies. Use with:
```php
$this->authorize('edit', $job);
```

---

## 📓 MODULE 5: MAIL, QUEUES & BUILD (Episodes 24–26)

---

### Episode 24 — Email with Mailable Classes

**Create a Mailable:**
```bash
php artisan make:mail JobPosted
```

```php
// app/Mail/JobPosted.php
class JobPosted extends Mailable
{
    public function __construct(public Job $job) {}

    public function envelope(): Envelope {
        return new Envelope(subject: 'New Job Posted: ' . $this->job->title);
    }

    public function content(): Content {
        return new Content(view: 'emails.job-posted');
        // Create resources/views/emails/job-posted.blade.php
    }
}
```

**Send it:**
```php
Mail::to($user->email)->send(new JobPosted($job));
```

**Preview emails in browser** (no SMTP needed):
```php
// In routes/web.php (development only!):
Route::get('/mailable', function () {
    $job = Job::first();
    return new \App\Mail\JobPosted($job);
});
```

**Configure mail in `.env` for development (use Mailtrap or log driver):**
```env
MAIL_MAILER=log       # Just logs emails to storage/logs/laravel.log
# OR use Mailtrap.io for fake inbox testing
```

---

### Episode 25 — Queues

**Why Queues?** Sending email or processing files during a web request makes the user wait. Queues run tasks in the background.

**Setup:**
```env
QUEUE_CONNECTION=database
```
```bash
php artisan queue:table
php artisan migrate
```

**Dispatch a job to the queue:**
```php
use App\Jobs\SendJobPostedEmail;

// Queue it (non-blocking):
SendJobPostedEmail::dispatch($job);
// Instead of Mail::to()->send() which blocks
```

**Create a Queue Job:**
```bash
php artisan make:job SendJobPostedEmail
```
```php
class SendJobPostedEmail implements ShouldQueue
{
    public function __construct(public Job $job) {}

    public function handle(): void {
        Mail::to($this->job->employer->user->email)
            ->send(new JobPosted($this->job));
    }
}
```

**Run the queue worker:**
```bash
php artisan queue:work
```

---

### Episode 26 — Build Process (Vite)

Laravel uses **Vite** to compile CSS and JavaScript.

```bash
npm install
npm run dev    # Watch mode (development)
npm run build  # Production build
```

In your Blade layout:
```html
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
```

Import Tailwind in `resources/css/app.css`:
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

---

## 📒 MODULE 6: FINAL PROJECT — JOB BOARD (Episodes 27–30)

---

### Episode 27 — From Design to Blade

Key concepts:
- Break a design mockup into **Blade components**
- Each UI section becomes a reusable component file
- Pass data with props: `<x-job-card :job="$job" />`

Component with props:
```html
<!-- resources/views/components/job-card.blade.php -->
@props(['job'])

<div class="border p-4 rounded">
    <h2>{{ $job->title }}</h2>
    <p>{{ $job->employer->name }}</p>
    <p>${{ number_format($job->salary) }}</p>
</div>
```

---

### Episode 28 — Blade and Tailwind Techniques

**Conditional classes:**
```html
<div class="{{ $active ? 'bg-blue-500' : 'bg-gray-200' }}">...</div>
```

**Blade directives:**
```html
@if ($user)
    <p>Hello, {{ $user->name }}</p>
@else
    <a href="/login">Login</a>
@endif

@auth
    <a href="/logout">Logout</a>
@endauth

@guest
    <a href="/login">Login</a>
@endguest
```

---

### Episode 29 — Jobs, Tags, TDD

**TDD (Test-Driven Development)** = write tests before writing the actual code.

```bash
php artisan make:test JobTest
```
```php
public function test_user_can_create_job()
{
    $user = User::factory()->create();
    
    $this->actingAs($user)
         ->post('/jobs', [
             'title'    => 'Developer',
             'employer' => 'Laracasts',
             'salary'   => 70000,
         ])
         ->assertRedirect('/jobs');

    $this->assertDatabaseHas('jobs', ['title' => 'Developer']);
}
```

Run tests:
```bash
php artisan test
```

**Tagging Jobs** (BelongsToMany in practice):
```php
// When storing a job, attach tags:
$job->tags()->sync($request->tags);
```

Filter jobs by tag:
```php
$jobs = Job::when(request('tag'), function ($query) {
    $query->whereHas('tags', fn($q) => $q->where('name', request('tag')));
})->paginate(10);
```

---

### Episode 30 — The Everything Episode (Wrap-Up)

**Final concepts covered:**

**Flash Messages:**
```php
// In controller after action:
return redirect('/jobs')->with('success', 'Job posted successfully!');
```
```html
<!-- In Blade layout -->
@if (session('success'))
    <div class="bg-green-100 p-4">{{ session('success') }}</div>
@endif
```

**Authorization in controller constructor:**
```php
public function __construct() {
    $this->middleware('auth')->except(['index', 'show']);
}
```

**Useful Artisan Commands Summary:**
```bash
php artisan make:model Job -m          # Model + migration together
php artisan make:model Job -mcr        # Model + migration + resource controller
php artisan tinker                     # Interactive PHP shell
php artisan route:list                 # List all routes
php artisan config:clear               # Clear config cache
php artisan cache:clear                # Clear app cache
php artisan optimize                   # Cache everything for production
```

---

## 🗂️ QUICK REFERENCE CHEAT SHEET

### Eloquent Quick Reference
```php
Model::all()                          // Get everything
Model::find($id)                      // Get by ID (or null)
Model::findOrFail($id)                // Get by ID (or 404)
Model::where('col', 'val')->get()     // Get with condition
Model::where('col', 'val')->first()   // Get first match
Model::create([...])                  // Create + save
Model::firstOrCreate(['col'=>'val'])  // Get or create
$model->save()                        // Save changes
$model->delete()                      // Delete record
Model::paginate(10)                   // Paginate results
Model::with('relation')->get()        // Eager load
```

### Blade Quick Reference
```html
{{ $var }}             Output (escaped)
{!! $var !!}           Output (unescaped — use carefully)
@if / @elseif / @else / @endif
@foreach / @endforeach
@forelse / @empty / @endforelse   (handles empty collections)
@auth / @endauth       Show if logged in
@guest / @endguest     Show if NOT logged in
@can / @endcan         Show if user can do action
@error('field')        Show validation error
{{ old('field') }}     Repopulate form after failed validation
@csrf                  CSRF token (required in all forms)
@method('PUT')         Spoof HTTP method
{{ $slot }}            Component content placeholder
```

### Common Artisan Commands
```bash
php artisan serve                    # Start dev server
php artisan make:model NAME -mcr     # Model + migration + controller
php artisan make:controller NAME     # Just a controller
php artisan make:migration NAME      # Just a migration
php artisan migrate                  # Run migrations
php artisan migrate:fresh --seed     # Wipe + re-run + seed
php artisan make:seeder NAME         # Create seeder
php artisan db:seed                  # Run seeders
php artisan make:factory NAME        # Create factory
php artisan tinker                   # Interactive PHP REPL
php artisan route:list               # Show all routes
php artisan queue:work               # Start queue worker
php artisan test                     # Run tests
```

---

## 🧠 KEY CONCEPTS SUMMARY

| Concept | What It Is | Why It Matters |
|---------|-----------|----------------|
| **MVC** | Pattern: Models (data), Views (HTML), Controllers (logic) | Keeps code organized |
| **Blade** | Laravel's template engine | Cleaner HTML with PHP logic |
| **Eloquent** | ORM to interact with DB as PHP objects | No raw SQL needed |
| **Migration** | PHP file defining a DB table | Version-control for database |
| **Seeder** | Populates the DB with test data | Easy to reset dev environment |
| **Factory** | Generates fake data | Great for testing |
| **Route Model Binding** | Auto-fetches model from URL parameter | Less boilerplate |
| **Eager Loading** | Load related models upfront with `with()` | Prevents N+1 queries |
| **CSRF** | Token to prevent form attack | Always use `@csrf` |
| **Middleware** | Code that runs before route | Auth checks, logging |
| **Gates/Policies** | Define what users can do | Authorization |
| **Queues** | Run tasks in background | Don't make users wait |
| **Vite** | Compiles CSS/JS assets | Modern frontend build |

---

*Study tip: Follow the videos one episode at a time, type the code yourself (don't copy-paste!), and verify each change in your browser and MySQL Workbench.*
