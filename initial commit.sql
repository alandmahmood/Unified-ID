DROP DATABASE IF EXISTS universal_id;
CREATE DATABASE universal_id;
USE universal_id;

CREATE TABLE national_id(nid VARCHAR(14) PRIMARY KEY, 
fname VARCHAR(15), 
lname VARCHAR(15), 
phone VARCHAR(20),
gender VARCHAR(10),
nissue_date DATE,
nexp_date DATE,
DoB DATE,
image_name VARCHAR(100));

CREATE TABLE health_id(hid VARCHAR(14) PRIMARY KEY,
hissue_date DATE,
hexp_date DATE,
blood_type VARCHAR(3));

CREATE TABLE driving_license(did VARCHAR(14) PRIMARY KEY,
dissue_date DATE,
dexp_date DATE,
li_type CHAR);

CREATE TABLE city(
cid INT PRIMARY KEY,
city_name VARCHAR(23));

CREATE TABLE addresses(aid VARCHAR(14) PRIMARY KEY,
cid INT,
address VARCHAR(50),
FOREIGN KEY (cid) REFERENCES city(cid)
);

CREATE TABLE relation(nid VARCHAR(14),
hid VARCHAR(14),
did VARCHAR(14),
aid VARCHAR(14)
);

DELIMITER //

CREATE TRIGGER national_exp
BEFORE INSERT ON national_id
FOR EACH ROW
BEGIN
    SET NEW.nexp_date = DATE_ADD(NEW.nissue_date, INTERVAL 5 YEAR);
END;
//

CREATE TRIGGER health_exp
BEFORE INSERT ON health_id
FOR EACH ROW
BEGIN
    SET NEW.hexp_date = DATE_ADD(NEW.hissue_date, INTERVAL 5 YEAR);
END;
//


CREATE TRIGGER driving_exp
BEFORE INSERT ON driving_license
FOR EACH ROW
BEGIN
    SET NEW.dexp_date = DATE_ADD(NEW.dissue_date, INTERVAL 5 YEAR);
END;
//
DELIMITER ;


CREATE VIEW people AS SELECT nid, concat(fname,' ',lname) as `name` FROM national_id;

CREATE VIEW address_view AS SELECT addresses.aid, concat(addresses.address, ', ', city.city_name) AS address FROM addresses NATURAL JOIN city; 

CREATE VIEW info AS SELECT national_id.nid, concat(national_id.fname,' ',national_id.lname) AS full_name, national_id.phone,
national_id.gender, national_id.nissue_date AS national_iss, national_id.nexp_date AS national_exp, national_id.dob, floor(DATEDIFF(current_date(),national_id.dob)/365) AS age, national_id.image_name,
address_view.address, health_id.hid, health_id.hissue_date AS health_iss, health_id.hexp_date AS health_exp, health_id.blood_type, driving_license.did, driving_license.dissue_date AS driving_iss, driving_license.dexp_date AS driving_exp, driving_license.li_type 
FROM national_id NATURAL JOIN address_view NATURAL JOIN health_id NATURAL JOIN driving_license NATURAL JOIN relation;

INSERT INTO city VALUES ('1', 'slemani'), ('2', 'Hawler'), ('3', 'Duhok');


select * from info;