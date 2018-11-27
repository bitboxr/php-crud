CREATE TABLE projects (
	project_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title TEXT(30) NOT NULL,
	category TEXT(30) NOT NULL
);

-- Populate projects table with test data
INSERT INTO projects VALUES(1,'Project 1 Test','Billable');
INSERT INTO projects VALUES(2,'Project 2 Test','Personal');
INSERT INTO projects VALUES(3,'Project 3 Test','Charity');

-- CAUTION: sql reserves keywords date & time. Changed date to task_date and time to task_time
CREATE TABLE tasks (
	task_id	INT(11) PRIMARY KEY AUTO_INCREMENT,
	project_id INT(11),
	title TEXT(30), 
	task_date TEXT NOT NULL, 
	task_time INT NOT NULL
);

-- Populate tasks table with test data
INSERT INTO tasks VALUES(1,1,'Task 1 Test','07/25/2016','90');
INSERT INTO tasks VALUES(2,1,'Task 2 Test','07/29/2016','60');
INSERT INTO tasks VALUES(3,2,'Task 3 Test','08/2/2016','120');
INSERT INTO tasks VALUES(4,2,'Task 4 Test','08/10/2016','30');