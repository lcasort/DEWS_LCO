CREATE DATABASE IF NOT EXISTS my_employees;
USE my_employees;

CREATE TABLE IF NOT EXISTS employees (
    id_employee      INT             NOT NULL,
    first_name  VARCHAR(14)     NOT NULL,
    last_name   VARCHAR(16)     NOT NULL,
    picture     NVARCHAR(260),
    PRIMARY KEY (id_employee)
);

IF((SELECT COUNT(*) FROM `employees`)==0)
BEGIN
INSERT INTO `employees` VALUES (10001,'Georgi','Facello','./images/user.png'),
    (10002,'Bezalel','Simmel','./images/user.png'),
    (10003,'Parto','Bamford','./images/user.png'),
    (10004,'Chirstian','Koblick','./images/user.png'),
    (10005,'Kyoichi','Maliniak','./images/user.png'),
    (10006,'Anneke','Preusig','./images/user.png'),
    (10007,'Tzvetan','Zielinski','./images/user.png'),
    (10008,'Saniya','Kalloufi','./images/user.png'),
    (10009,'Sumant','Peac','./images/user.png'),
    (10010,'Duangkaew','Piveteau','./images/user.png'),
    (10011,'Mary','Sluis','./images/user.png'),
    (10012,'Patricio','Bridgland','./images/user.png'),
    (10013,'Eberhardt','Terkki','./images/user.png'),
    (10014,'Berni','Genin','./images/user.png'),
    (10015,'Guoxiang','Nooteboom','./images/user.png'),
    (10016,'Kazuhito','Cappelletti','./images/user.png'),
    (10017,'Cristinel','Bouloucos','./images/user.png'),
    (10018,'Kazuhide','Peha','./images/user.png'),
    (10019,'Lillian','Haddadi','./images/user.png'),
    (10020,'Mayuko','Warwick','./images/user.png');
END;