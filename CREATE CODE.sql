CREATE TABLE Buyers(
	Ssn VARCHAR(9) PRIMARY KEY NOT NULL,
	Fname VARCHAR(20) NOT NULL,
	Minit VARCHAR(1),
	Lname VARCHAR(20) NOT NULL,
	Sex VARCHAR(1) NOT NULL,
	Phone VARCHAR(10) NOT NULL,
	Address VARCHAR(50) NOT NULL
);

CREATE TABLE Sellers(
	Ssn VARCHAR(9) PRIMARY KEY NOT NULL,
	Fname VARCHAR(20) NOT NULL,
	Minit VARCHAR(1),
	Lname VARCHAR(20) NOT NULL,
	Sex VARCHAR(1) NOT NULL,
	Phone VARCHAR(10) NOT NULL,
	Address VARCHAR(50) NOT NULL
);

CREATE TABLE Dealers(
	Id NUMBER(3) PRIMARY KEY NOT NULL,
	Fname VARCHAR(20) NOT NULL,
	Minit VARCHAR(1),
	Lname VARCHAR(20) NOT NULL,
	Sex VARCHAR(1) NOT NULL,
	Phone VARCHAR(10) NOT NULL
);

CREATE TABLE Works_on(
	Branch_no REFERENCES Branch(Bno),
	Id REFERENCES Dealers(Id),
	PRIMARY KEY(Branch_no,Id)
);

CREATE TABLE Branch(
	Bno NUMBER(3) PRIMARY KEY NOT NULL,
	Address VARCHAR(50) NOT NULL,
	Mgr_id REFERENCES Dealers(Id) ON DELETE SET NULL
);

CREATE TABLE Cars(
	Vin VARCHAR(17) PRIMARY KEY NOT NULL,
	Model VARCHAR(20) NOT NULL,
	Make VARCHAR(20) NOT NULL,
	Year NUMBER(4) NOT NULL,
	Mileage INT NOT NULL,
	Rrp DECIMAL(10,2),
	Bno REFERENCES Branch(Bno) ON DELETE SET NULL,
	S_ssn REFERENCES Sellers(Ssn) ON DELETE SET NULL,
	B_ssn REFERENCES Buyers(Ssn) ON DELETE SET NULL
);

CREATE TABLE Car_feature(
	Vin REFERENCES Cars(Vin),
	Description VARCHAR(50),
	PRIMARY KEY(Vin)
);

CREATE TABLE Trade_in(
	In_id INT NOT NULL,
	Vin REFERENCES Cars(Vin),
	S_ssn  REFERENCES Sellers(Ssn),
	Price_in DECIMAL(10,2),
	Out_date DATE,
	PRIMARY KEY(In_id,Vin,S_ssn)
);

CREATE TABLE Trade_out(
	Out_id INT NOT NULL,
	Vin REFERENCES Cars(Vin),
	B_ssn REFERENCES Buyers(Ssn),
	Price_out DECIMAL(10,2),
	Out_date DATE,
	PRIMARY KEY(Out_id,Vin,B_ssn)
);