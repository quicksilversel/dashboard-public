CREATE TABLE task (
    id int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    taskName varchar(255) NOT NULL,
    taskStatus tinyint(1) NOT NULL,
    taskDue DATE DEFAULT NULL
);