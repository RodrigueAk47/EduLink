CREATE TABLE user
(
    id        INT AUTO_INCREMENT PRIMARY KEY,
    name      VARCHAR(255)           NOT NULL,
    matricule VARCHAR(20) UNIQUE     NOT NULL,
    email     VARCHAR(255) UNIQUE    NOT NULL,
    password  VARCHAR(255)           NOT NULL,
    role      ENUM ('user', 'admin') NOT NULL DEFAULT 'user'
);

INSERT INTO user (name, matricule, email, password, role)
VALUES ('RODRIGUE ASSOHOU', '123456', 'rodrigueassohou@gmail.com', 'password123', 'admin');

/* Cree mes tables pour les cours */
CREATE TABLE classes
(
    class_id INT PRIMARY KEY AUTO_INCREMENT,
    name     VARCHAR(255) NOT NULL
);

CREATE TABLE semesters
(
    semester_id INT PRIMARY KEY AUTO_INCREMENT,
    class_id    INT,
    name        VARCHAR(255) NOT NULL,
    FOREIGN KEY (class_id) REFERENCES classes (class_id)
);

CREATE TABLE course_lists
(
    course_list_id INT PRIMARY KEY AUTO_INCREMENT,
    semester_id    INT,
    name           VARCHAR(255) NOT NULL,
    FOREIGN KEY (semester_id) REFERENCES semesters (semester_id)
);

CREATE TABLE courses
(
    course_id      INT PRIMARY KEY AUTO_INCREMENT,
    course_list_id INT,
    name           VARCHAR(255) NOT NULL,
    description    LONGTEXT,
    FOREIGN KEY (course_list_id) REFERENCES course_lists (course_list_id)
);


/**/
INSERT INTO classes (name)
VALUES ('Licence 1');
INSERT INTO semesters (class_id, name)
VALUES (1, 'Semestre 1');

INSERT INTO course_lists (course_lists.semester_id, name)
VALUES (1, 'Logique mathematique');
INSERT INTO courses (course_list_id, name, description)
VALUES (1, 'Logique mathematique', 'test');




