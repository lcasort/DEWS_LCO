CREATE DATABASE IF NOT EXISTS my_employees;
USE my_employees;

CREATE TABLE IF NOT EXISTS employees (
    id_employee      INT             NOT NULL,
    first_name  VARCHAR(14)     NOT NULL,
    last_name   VARCHAR(16)     NOT NULL,
    picture     NVARCHAR(260),
    PRIMARY KEY (id_employee)
);