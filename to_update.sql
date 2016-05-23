-- update studenteneperklasa set CourseID = floor(CourseID);
-- insert into studentneperklasa values (99999, 'admin', 'Administrator', NULL, NULL, 'segjendo', NULL, NULL, NULL, NULL, NULL, NULL);

create table student_lecturer(
   id INT NOT NULL AUTO_INCREMENT,
   username VARCHAR(100),
   password VARCHAR(40),
   fullname VARCHAR(40),
   studentcode VARCHAR(40),
   email VARCHAR(40),
   islecturer INT,
   PRIMARY KEY ( id )
);

create table lecture(
   id_lecture INT NOT NULL AUTO_INCREMENT,
   namelecture VARCHAR(100),
   tipology VARCHAR(100),
   typemandatory VARCHAR(100),
   id_lecturer INT,
   PRIMARY KEY ( id_lecture )
);

create table exam_question(
   id_question INT NOT NULL AUTO_INCREMENT,
   question VARCHAR(100),
   typemandatory VARCHAR(100),
   id_lecture INT,
   PRIMARY KEY ( id_question )
);

create table exam_answer(
   id_answer INT NOT NULL AUTO_INCREMENT,
   answer1 VARCHAR(100),
   answer2 VARCHAR(100),
   answer3 VARCHAR(100),
   answer4 VARCHAR(100),
   PRIMARY KEY ( id_answer )
);

insert into student_lecturer(username, fullname, islecturer) values ('admin', 'Administrator', 1);
insert into student_lecturer(username, fullname, islecturer) values ('jonada', 'Jonada Metani', 1);
update student_lecturer set password = sha1(username);
insert into lecture(namelecture, tipology, typemandatory, id_lecturer) values('Java Programming', 'This is some text.', 'Mandatory', 1);

alter table lecture add COLUMN lecturetype varchar(50);
alter table lecture add COLUMN academicyear varchar(50);
alter table lecture add COLUMN email varchar(200);


alter table exam_question add COLUMN answer1 varchar(200);
alter table exam_question add COLUMN answer2 varchar(200);
alter table exam_question add COLUMN answer3 varchar(200);
alter table exam_question add COLUMN answer4 varchar(200);
alter table exam_question add COLUMN finalanswer varchar(200);
alter table exam_question add COLUMN orders INT;

alter table lecture add COLUMN codelecture varchar(50);