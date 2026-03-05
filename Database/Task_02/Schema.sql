CREATE TABLE Department (
    department_code VARCHAR(10) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    building_location VARCHAR(100),
    manager_id INT UNIQUE
);

CREATE TABLE Instructor (
    instructor_id INT PRIMARY KEY,
    department_code VARCHAR(10) NOT NULL,
    name VARCHAR(100) NOT NULL,
    salary DECIMAL(10,2) CHECK (salary > 0),
    hire_date DATE NOT NULL,
    city VARCHAR(50),
    street VARCHAR(50),
    zip_code VARCHAR(10),
    FOREIGN KEY (department_code) REFERENCES Department(department_code)
);

ALTER TABLE Department
ADD CONSTRAINT fk_manager
FOREIGN KEY (manager_id)
REFERENCES Instructor(instructor_id);

CREATE TABLE Instructor_Phone (
    instructor_id INT,
    phone_number VARCHAR(20),
    PRIMARY KEY (instructor_id, phone_number),
    FOREIGN KEY (instructor_id) REFERENCES Instructor(instructor_id)
    ON DELETE CASCADE
);

CREATE TABLE Student (
    student_id INT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(50),
    street VARCHAR(50),
    zip_code VARCHAR(10)
);

CREATE TABLE Student_Phone (
    student_id INT,
    phone_number VARCHAR(20),
    PRIMARY KEY (student_id, phone_number),
    FOREIGN KEY (student_id) REFERENCES Student(student_id)
    ON DELETE CASCADE
);

CREATE TABLE Course (
    course_code VARCHAR(10) PRIMARY KEY,
    department_code VARCHAR(10),
    title VARCHAR(100) NOT NULL,
    credits INT CHECK (credits > 0),
    FOREIGN KEY (department_code) REFERENCES Department(department_code)
);

CREATE TABLE Course_Prerequisite (
    course_code VARCHAR(10),
    prerequisite_code VARCHAR(10),
    PRIMARY KEY (course_code, prerequisite_code),
    FOREIGN KEY (course_code) REFERENCES Course(course_code)
    ON DELETE CASCADE,
    FOREIGN KEY (prerequisite_code) REFERENCES Course(course_code)
);

CREATE TABLE Health_Insurance (
    related_id INT,
    student_id INT,
    name VARCHAR(100),
    birthday DATE,
    relationship VARCHAR(50),
    PRIMARY KEY (related_id, student_id),
    FOREIGN KEY (student_id) REFERENCES Student(student_id)
    ON DELETE CASCADE
);

CREATE TABLE Enrollments (
    student_id INT,
    course_code VARCHAR(10),
    enrollment_date DATE,
    final_grade CHAR(2),
    PRIMARY KEY (student_id, course_code),
    FOREIGN KEY (student_id) REFERENCES Student(student_id)
    ON DELETE CASCADE,
    FOREIGN KEY (course_code) REFERENCES Course(course_code)
);