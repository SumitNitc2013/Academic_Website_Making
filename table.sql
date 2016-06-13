create table SignUpLogin ( First_Name text NOT NULL, 
						Last_Name text NOT NULL, 
						Email varchar(50) NOT NULL, 
						Password text NOT NULL,
						Gender text NOT NULL,
						PRIMARY KEY (Email)
					  );

create table CoursesTaken ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
							   Email varchar(50) NOT NULL, 
							   Subject text NOT NULL
					  );



create table TeacherCourse (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
							TeacherName text NOT NULL, 
							Subject text NOT NULL
					  );



create table TrainingAndPlacement ( Year INT(4) NOT NULL, 
						Name text NOT NULL, 
						Email varchar(50) NOT NULL, 
						Company text NOT NULL,
						CTC FLOAT(5,2) NOT NULL,
						CGPA FLOAT(4,2) NOT NULL,
						PRIMARY KEY (Email)
					  );




//to get column names

SELECT COLUMN_NAME
FROM INFORMATION_SCHEMA.COLUMNS
WHERE TABLE_SCHEMA=yourdatabasename
    AND TABLE_NAME=yourtablename;







