/*Student ID, Name, City*/
SELECT student_id, name, city
FROM Student;

/*Instructor Name, Department Name, Salary*/
SELECT i.name, d.name AS department_name, i.salary
FROM Instructor i
JOIN Department d
ON i.department_code = d.department_code;

/*Department Name, Course Code, Title*/
SELECT d.name, c.course_code, c.title
FROM Course c
JOIN Department d
ON c.department_code = d.department_code
ORDER BY d.name;

/*Students in CS101*/
SELECT s.name, e.enrollment_date, e.final_grade
FROM Enrollments e
JOIN Student s
ON s.student_id = e.student_id
WHERE e.course_code = 'CS101';

/*Number of students in each course*/
SELECT course_code, COUNT(student_id) AS total_students
FROM Enrollments
GROUP BY course_code;

/*Instructor with highest salary*/
SELECT i.name, i.salary, d.name
FROM Instructor i
JOIN Department d
ON i.department_code = d.department_code
WHERE i.salary = (SELECT MAX(salary) FROM Instructor);

/*Course with prerequisite (Self Join)*/
SELECT c1.title AS course,
       c2.title AS prerequisite
FROM Course_Prerequisite cp
JOIN Course c1 ON cp.course_code = c1.course_code
JOIN Course c2 ON cp.prerequisite_code = c2.course_code;

/*Students with dependents*/
SELECT s.name, h.name, h.relationship
FROM Student s
JOIN Health_Insurance h
ON s.student_id = h.student_id;

/*Departments with more than 5 instructors*/
SELECT d.name, COUNT(i.instructor_id) AS instructor_count
FROM Department d
JOIN Instructor i
ON d.department_code = i.department_code
GROUP BY d.name
HAVING COUNT(i.instructor_id) > 5;

/*Students enrolled in more than 3 courses*/
SELECT s.name, COUNT(e.course_code) AS number_of_courses
FROM Student s
JOIN Enrollments e
ON s.student_id = e.student_id
GROUP BY s.name
HAVING COUNT(e.course_code) > 3;

/*Courses with no students*/
SELECT c.course_code, c.title
FROM Course c
LEFT JOIN Enrollments e
ON c.course_code = e.course_code
WHERE e.student_id IS NULL;