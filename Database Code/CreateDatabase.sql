
DROP DATABASE IF EXISTS `scottfultondb`;
CREATE DATABASE `scottfultondb`;
USE `scottfultondb`;



DROP TABLE IF EXISTS `REQUESTS`;
CREATE TABLE `REQUESTS` (
	`RequestID` int(11) NOT NULL,
    PRIMARY KEY (RequestID)
);



DROP TABLE IF EXISTS `EQUIPMENT`;
CREATE TABLE `EQUIPMENT` (
	`EquipmentID` int(11) NOT NULL,
    `EquipmentName` varchar(10) DEFAULT NULL,
    `EquipmentDescr`varchar(200) DEFAULT NULL,
    `Location`varchar(20) DEFAULT NULL,
    `Cost` Decimal(6,2) DEFAULT NULL,
    `DateAdded` date,
    PRIMARY KEY (EquipmentID)
);



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


DROP TABLE IF EXISTS `REQUESTS`;

CREATE TABLE `REQUESTS` (
	`RequestID` int(11) NOT NULL,
    
PRIMARY KEY (RequestID)
)