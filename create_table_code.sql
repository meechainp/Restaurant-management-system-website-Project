
-- code สร้างตาราง


CREATE TABLE Type(
	typeId	CHAR(3) NOT NULL,
	typeName	VARCHAR(80),
	CONSTRAINT Type_fk PRIMARY KEY(typeId)
);


CREATE TABLE Menu(
	menuId			CHAR(6) NOT NULL,
	typeId 			CHAR(3),
	menuTHname	VARCHAR(200),
	menuENname	VARCHAR(200),
	menuPrice	FLOAT(3),
	menuStatus	VARCHAR(20),
	menuDesc	VARCHAR(300),
	menuImg		VARCHAR(200),
	datesave 	DATETIME,

	CONSTRAINT Menu_pk PRIMARY KEY (menuId),
	CONSTRAINT menu_fk_type FOREIGN KEY(typeId)
		REFERENCES Type(typeId)
);

CREATE TABLE Customer(
	username	CHAR(10) NOT NULL,
	password 	CHAR(8),
	custFName	VARCHAR(80),
	custLName	VARCHAR(80),
	custTel		CHAR(10),
	level		INTEGER(1),
	CONSTRAINT Customer_pk PRIMARY KEY (username)
);


CREATE TABLE Staff(
	staffId		CHAR(10) NOT NULL,
	password	CHAR(8),
	level		INTEGER(1),
	staffName	VARCHAR(80),
	staffTel	CHAR(10),
	staffAddress VARCHAR(80),	
	CONSTRAINT Staff_pk PRIMARY KEY (staffId)
);

CREATE TABLE Tables(
	tableId		CHAR(4) NOT NULL,
	staffId		CHAR(10),
	tableName	VARCHAR(20),
	tableStatus	INTEGER(2),
	CONSTRAINT tables_pk PRIMARY KEY (tableId),
	CONSTRAINT tables_fk_staff FOREIGN KEY(staffId)
		REFERENCES staff(staffId)
);


CREATE TABLE Booking_table(
	tableId				CHAR(4),
	username			CHAR(10),
	dateBookingTable	DATETIME,
	custCount			INTEGER(3),

	CONSTRAINT BookingTable_pk PRIMARY KEY (dateBookingTable),
	CONSTRAINT BookingTable_fk_tables FOREIGN KEY(tableId)
		REFERENCES tables(tableId)
);


CREATE TABLE Receipt(
	receiptId 			CHAR(10) NOT NULL,
	staffId    			CHAR(10),
	tableId 			CHAR(4),
	receiptDate			DATETIME,
	amount				INTEGER(3),
	totalPrice 			FLOAT(5),
	receiptStatus 		VARCHAR(20),
	monthId				CHAR(3),


	CONSTRAINT Receipt_pk PRIMARY KEY (receiptId),
	CONSTRAINT receip_fk_table FOREIGN KEY (tableId)
		REFERENCES tables(tableId),
	CONSTRAINT receip_fk_staff FOREIGN KEY (staffId)
		REFERENCES staff(staffId),
	CONSTRAINT receip_fk_income FOREIGN KEY (monthId)
		REFERENCES Income(monthId)
);



CREATE TABLE Orders(
	orderId			CHAR(10) NOT NULL,
	receiptId		CHAR(10),
	staffId			CHAR(10),
	tableId			CHAR(4),
	totalPrice		FLOAT(5),
	orderDate		DATETIME,
	orderStatus 	VARCHAR(20),
	amount			INTEGER(3),

	CONSTRAINT Orders_pk PRIMARY KEY (orderId),
	CONSTRAINT Orders_fk_staff FOREIGN KEY (staffId)
		REFERENCES Staff(staffId),
	CONSTRAINT Orders_fk_table FOREIGN KEY (tableId)
		REFERENCES tables(tableId),
	CONSTRAINT Orders_fk_rec FOREIGN KEY (receiptId)
		REFERENCES receipt(receiptId)
);





CREATE TABLE cart(
	orderId		CHAR(10),
	menuId 		CHAR(6),
	amount 		INTEGER(3),
	price 		FLOAT(5),
	totalPrice	FLOAT(5),
	cartStatus	VARCHAR(20),

	CONSTRAINT SelectMenu_fk_order FOREIGN KEY (orderId)
		REFERENCES Orders(orderId),
	CONSTRAINT SelectMenu_fk_menu FOREIGN KEY (menuId)
		REFERENCES menu(menuId)

);



CREATE TABLE Kitchen(
	orderId 		CHAR(10),
	kitchenStatus  VARCHAR(20),
 
	CONSTRAINT Kitchen_fk_order FOREIGN KEY (orderId)
		REFERENCES orders(orderId)

);



CREATE TABLE Income(
	monthId		CHAR(3),
	monthName	VARCHAR(80),
	amount 		INTEGER(5),
	totalPrice	FLOAT(6),
	CONSTRAINT income_pk PRIMARY KEY (monthId)
);



