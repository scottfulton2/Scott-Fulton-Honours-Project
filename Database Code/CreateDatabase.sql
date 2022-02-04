
DROP DATABASE IF EXISTS `scottfultondb`;
CREATE DATABASE `scottfultondb`;
USE `scottfultondb`;



DROP TABLE IF EXISTS `REQUESTS`;
CREATE TABLE `REQUESTS` (
	`RequestID` int(11) NOT NULL,
    `EquipmentID` int(11) NOT NULL,
    `MaterialID` int(11) NOT NULL,
    PRIMARY KEY (RequestID),
    FOREIGN KEY (EquipmentID) REFERENCES EQUIPMENT(EquipmentID),
	FOREIGN KEY (MaterialID) REFERENCES MATERIALS(MaterialID)
);



DROP TABLE IF EXISTS `EQUIPMENT`;
CREATE TABLE `EQUIPMENT` (
	`EquipmentID` int(11) NOT NULL,
    `EquipmentName` varchar(20) DEFAULT NULL,
    `Descr` varchar(200) DEFAULT NULL,
    `Location` varchar(20) DEFAULT NULL,
    `Cost` Decimal(6,2) DEFAULT NULL,
    `DateAdded` date,
    PRIMARY KEY (EquipmentID)
);



DROP TABLE IF EXISTS `MATERIALS`;
CREATE TABLE `MATERIALS` (
	`MaterialID` int(11) NOT NULL,
    `MaterialName` varchar(20) DEFAULT NULL,
    `Cost` Decimal(6,2) DEFAULT NULL,
    `UnitOfMeasure` varchar(10) DEFAULT NULL,
    `Descr` varchar(200) DEFAULT NULL,
    `DateAdded` date,
	PRIMARY KEY (MaterialID)
)

/*
DROP TABLE IF EXISTS `REQUESTS`;

CREATE TABLE `REQUESTS` (
	`RequestID` int(11) NOT NULL,
    
PRIMARY KEY (RequestID)
)


DROP TABLE IF EXISTS `REQUESTS`;

CREATE TABLE `REQUESTS` (
	`RequestID` int(11) NOT NULL,
    
PRIMARY KEY (RequestID)
)
*/