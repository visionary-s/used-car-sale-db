DROP DATABASE IF EXISTS Used_car_sale;
CREATE DATABASE Used_car_sale;

USE Used_car_sale;

DROP TABLE IF EXISTS Buyers;
CREATE TABLE Buyers(
	Ssn VARCHAR(9) PRIMARY KEY NOT NULL,
	Fname VARCHAR(20) NOT NULL,
	Minit VARCHAR(1),
	Lname VARCHAR(20) NOT NULL,
	Sex VARCHAR(1) NOT NULL,
	Phone VARCHAR(10) NOT NULL,
	Address VARCHAR(50) NOT NULL
);

DROP TABLE IF EXISTS Sellers;
CREATE TABLE Sellers(
	Ssn VARCHAR(9) PRIMARY KEY NOT NULL,
	Fname VARCHAR(20) NOT NULL,
	Minit VARCHAR(1),
	Lname VARCHAR(20) NOT NULL,
	Sex VARCHAR(1) NOT NULL,
	Phone VARCHAR(10) NOT NULL,
	Address VARCHAR(50) NOT NULL
);

DROP TABLE IF EXISTS Dealers;
CREATE TABLE Dealers(
	Id NUMERIC(3) NOT NULL PRIMARY KEY,
	Sex VARCHAR(1) NOT NULL,
	Fname VARCHAR(20) NOT NULL,
	Minit VARCHAR(1),
	Lname VARCHAR(20) NOT NULL,
	Address VARCHAR(50) NOT NULL,
	Phone VARCHAR(10) NOT NULL,
	Branch_no NUMERIC(3) NOT NULL
);

DROP TABLE IF EXISTS Branch;
CREATE TABLE Branch(
	Bno NUMERIC(3) PRIMARY KEY NOT NULL,
	Address VARCHAR(50) NOT NULL,
    Mgr_id Numeric(3)
);

DROP TABLE IF EXISTS Cars;
CREATE TABLE Cars(
	Vin VARCHAR(17) PRIMARY KEY NOT NULL,
	Model VARCHAR(20) NOT NULL,
	Make VARCHAR(20) NOT NULL,
	Year INT(4) NOT NULL,
	Mileage INT NOT NULL,
	Bno NUMERIC(3) NOT NULL,
	Rrp DECIMAL(10,2)
);

DROP TABLE IF EXISTS Buy;
CREATE TABLE Buy(
	Vin VARCHAR(17) NOT NULL,
    S_ssn VARCHAR(9) NOT NULL,
	In_id INT NOT NULL,
	FOREIGN KEY (Vin) REFERENCES Cars(Vin),
	FOREIGN KEY (S_ssn)  REFERENCES Sellers(Ssn),
	Price_in DECIMAL(10,2) NOT NULL,
	In_date DATE NOT NULL,
	PRIMARY KEY(In_id)
);

DROP TABLE IF EXISTS Sell;
CREATE TABLE Sell(
	Vin VARCHAR(17) NOT NULL,
    B_ssn VARCHAR(9) NOT NULL,
	Out_id INT NOT NULL,
    In_id INT NOT NULL,
	FOREIGN KEY (Vin) REFERENCES Cars(Vin),
	FOREIGN KEY (B_ssn) REFERENCES Buyers(Ssn),
	FOREIGN KEY (In_id) REFERENCES Buy(In_id),
	Price_out DECIMAL(10,2) NOT NULL,
	Out_date DATE NOT NULL,
	PRIMARY KEY(Out_id)
);

ALTER TABLE Dealers ADD CONSTRAINT Dealers_FK1
foreign key (Branch_no) REFERENCES Branch(Bno);

ALTER TABLE CARs ADD CONSTRAINT CARSFK1
FOREIGN KEY (Bno) REFERENCES Branch(Bno);

ALTER TABLE Branch ADD CONSTRAINT Branch_FK1
foreign key (Mgr_id) REFERENCES Dealers(Id);

SET GLOBAL FOREIGN_KEY_CHECKS=0;
INSERT INTO Branch(Bno, Address, Mgr_id) VALUES (1, "Richardson", 101);
INSERT INTO Dealers(Id, Sex, Fname, Minit, Lname, Address, Phone, Branch_no) VALUES (101,"m", "Andy", "C", "Vile", "980 Dallas, Houston, TX", "222222202", 1);
INSERT INTO Dealers(Id, Sex, Fname, Minit, Lname, Address, Phone, Branch_no) VALUES (102,"f", "Joyce", "K", "English", "5631 Rice, Houston, TX", "453453453", 1);
INSERT INTO Dealers(Id, Sex, Fname, Minit, Lname, Address, Phone, Branch_no) VALUES (103,"m", "Ramesh", "A", "Narayan", "971 Fire Oak, Humble, TX", "666884444", 1);
INSERT INTO Cars(Vin, Model, Make, Mileage, Year, Bno, Rrp) VALUES ("66666660222222222", "Camry", "Toyota", 49000, 2011, 1, 13000);
INSERT INTO Cars(Vin, Model, Make, Mileage, Year, Bno, Rrp) VALUES ("66666660255555555", "Camry", "Toyota", 43000, 2015, 1, 12000);

/*SET GLOBAL FOREIGN_KEY_CHECKS=0;*/
INSERT INTO Branch(Bno, Address, Mgr_id) VALUES (2, "Plano", 201);
INSERT INTO Dealers(Id, Sex, Fname, Minit, Lname, Address, Phone, Branch_no) VALUES (201,"f", "Alicia", "J", "Zelaya", "321 Castle, Spring, TX", "999887777", 2);
INSERT INTO Dealers(Id, Sex, Fname, Minit, Lname, Address, Phone, Branch_no) VALUES (202,"m", "John", "B", "Smith", "731 Fondren, Houston, TX", "123456789", 2);
INSERT INTO Dealers(Id, Sex, Fname, Minit, Lname, Address, Phone, Branch_no) VALUES (203,"f", "Jennifer", "S", "Wallace", "291 Berry, Bellaire, TX", "987654321", 2);
INSERT INTO Cars(Vin, Model, Make, Mileage, Year, Bno, Rrp) VALUES ("66666660222211111", "Corolla", "Toyota", 51000, 2014, 2, 12000);
INSERT INTO Cars(Vin, Model, Make, Mileage, Year, Bno, Rrp) VALUES ("66666660333333333", "Prius", "Toyota", 72000, 2010, 2, 14000);

/*SET GLOBAL FOREIGN_KEY_CHECKS=0;*/
INSERT INTO Branch(Bno, Address, Mgr_id) VALUES (3, "Garland", 301);
INSERT INTO Dealers(Id, Sex, Fname, Minit, Lname, Address, Phone, Branch_no) VALUES (301,"m", "Franklin", "T", "Wong", "638 Voss, Houston, TX", "333445555", 3);
INSERT INTO Dealers(Id, Sex, Fname, Minit, Lname, Address, Phone, Branch_no) VALUES (302,"m", "James", "E", "Borg", "450 Stone, Houston, TX", "888665555", 3);
INSERT INTO Dealers(Id, Sex, Fname, Minit, Lname, Address, Phone, Branch_no) VALUES (303,"m", "Tom", "G", "Brand", "122 Ball Street, Dallas, TX", "222222203", 3);
INSERT INTO Cars(Vin, Model, Make, Mileage, Year, Bno, Rrp) VALUES ("66666660444444444", "Civic", "Honda", 68000, 2012, 3, 11000);
INSERT INTO Cars(Vin, Model, Make, Mileage, Year, Bno, Rrp) VALUES ("66666660777777777", "Altima", "Nissan", 102000, 2013, 3, 11000);
SET GLOBAL FOREIGN_KEY_CHECKS=1;

INSERT INTO Sellers(Ssn, Fname, Minit, Lname, Sex, Phone, Address) VALUES ("666666608", "Arnold", "A", "Head", "m", "666666602", "233 Spring St, Dallas, TX");
INSERT INTO Sellers(Ssn, Fname, Minit, Lname, Sex, Phone, Address) VALUES ("666666609", "Helga", "C", "Pataki", "f", "666666600", "101 Holyoke St, Dallas, TX");

INSERT INTO Buyers(Ssn, Fname, Minit, Lname, Sex, Phone, Address) VALUES ("987987987", "Ahmad", "V", "Jabbar", "m", "987654321", "980 Dallas, Houston, TX");
INSERT INTO Buyers(Ssn, Fname, Minit, Lname, Sex, Phone, Address) VALUES ("453453453", "Justin", "N", "Mark", "m", "333445555", "521 Voss, Houston, TX");

INSERT INTO Buy(Vin, S_ssn, In_id, Price_in, In_date) VALUES ("66666660222222222", "666666608", 1, 10000, "2017-04-20");
INSERT INTO Buy(Vin, S_ssn, In_id, Price_in, In_date) VALUES ("66666660222211111", "666666609", 2, 9000, "2017-04-21");

INSERT INTO Sell(Vin, B_ssn, Out_id, In_id, Price_out, Out_date) VALUES ("66666660222222222", "987987987", 1, 1, 13000, "2017-04-24");
INSERT INTO Sell(Vin, B_ssn, Out_id, In_id, Price_out, Out_date) VALUES ("66666660222211111", "453453453", 2, 2, 12000, "2017-04-25");
