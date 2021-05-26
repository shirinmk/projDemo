-- CREATE DATABASE firstedu4;  

-- CREATE TABLE fun;
use firstedu;


drop table if exists parent;

CREATE TABLE parent(
    id int AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(25) NOT NULL,
    middle_name varchar(25),
    last_name varchar(25) NOT NULL,
    relationship varchar(25),
    address1 varchar(50) NOT NULL,
    address2 varchar(50),
    city varchar(20) NOT NULL,
    state char(2) NOT NULL,
    zip varchar(10) NOT NULL,
    phone char(15),
    email varchar(25),
    emergency_name varchar(25) ,
    emergency_relationship varchar(25),
    emergency_phone varchar(25) );
    
drop table if exists child;

create table child(  
    id int AUTO_INCREMENT PRIMARY KEY,
    parent_id int,
    first_name varchar(25) NOT NULL,
    middle_name varchar(25),
    last_name varchar(25) NOT NULL,
    nickname varchar(25) ,
    image_filename varchar(15) ,
    birthdate char(15) ,
    medical_conditions varchar(200),
    FOREIGN KEY(parent_id) references parent(id)); 
    
-- drop table if exists camp;

create table camp(
    id int AUTO_INCREMENT PRIMARY KEY,
    description varchar(20) NOT NULL );
    
drop table if exists enrollment;

create table enrollment(
    camp_id int NOT NULL,
    child_id int NOT NULL,
    FOREIGN KEY(camp_id) references camp(id),
    FOREIGN KEY(child_id) references child(id));   

      
-- CREATE TABLE Employee(
-- Fname       VARCHAR(20) NOT NULL,
-- Minit       VARCHAR(1),
-- Lname       VARCHAR(20) NOT NULL,
-- Ssn         CHAR(9)     PRIMARY KEY,
-- Bdate       DATE,
-- Address     VARCHAR(30),
-- Sex         CHAR(1),
-- Salary      NUMERIC(10,2),
-- Super_ssn   CHAR(9)     REFERENCES Department(Mgr_ssn),
-- Dno         INTEGER     REFERENCES Department(Dnumber)
-- );

-- CREATE TABLE Department(
-- Dname       VARCHAR(15) NOT NULL,
-- Dnumber     INTEGER     PRIMARY KEY,
-- Mgr_ssn     CHAR(9),
-- Mgr_start_date  DATE
-- );
-- DROP TABLE MyGuests;
-- CREATE TABLE MyGuests (
-- id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
-- firstname VARCHAR(30) NOT NULL,
-- lastname VARCHAR(30) NOT NULL,
-- email VARCHAR(50),
-- reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- )
