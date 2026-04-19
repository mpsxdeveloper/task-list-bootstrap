CREATE DATABASE todolist;

CREATE TABLE tasks (
    id INT NOT NULL AUTO_INCREMENT,
    description VARCHAR(50) NOT NULL,
    priority ENUM('LOW', 'MEDIUM', 'HIGH', 'URGENT') NOT NULL DEFAULT 'LOW',
    done ENUM('YES', 'NO') NOT NULL DEFAULT 'NO',
    PRIMARY KEY(id)
);