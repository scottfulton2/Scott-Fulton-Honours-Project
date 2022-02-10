
DROP DATABASE IF EXISTS `scottfultondb`;
CREATE DATABASE `scottfultondb`;
USE `scottfultondb`;



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
);


DROP TABLE IF EXISTS `USERACCOUNTS`;
CREATE TABLE `USERACCOUNTS` (
	`AccountID` int(11) NOT NULL,
    `AccountType` varchar(20) NOT NULL,
    `Username` varchar(20) NOT NULL,
    `Password` varchar(50) NOT NULL,
	PRIMARY KEY (AccountID)
);



DROP TABLE IF EXISTS `REQUESTS`;
CREATE TABLE `REQUESTS` (
	`RequestID` int(11) NOT NULL,
    `RequestorType` varchar(20) NOT NULL,
    `AttachedFiles` LONGBLOB DEFAULT NULL,
    `PrefCompDate` date,
    `Email` varchar(20) NOT NULL,
    `FirstName` varchar(20) NOT NULL,
    `Surname` varchar(20) NOT NULL,
    `Discipline` varchar(20) NOT NULL,
    `ProjType` varchar(20) NOT NULL,
    `AccountToBeCharged` int(20) NOT NULL,
    `AccountHolder` varchar(40) NOT NULL,
    `NatureOfReq` varchar(200) DEFAULT NULL,
    `SupervFName` varchar(20) DEFAULT NULL,
    `SupervSName` varchar(20) DEFAULT NULL,
    `SupervEmail` varchar(20) DEFAULT NULL,
    `PhoneNumber` int(20) DEFAULT NULL,
    `Organisation` varchar(30) DEFAULT NULL,
    `OrgAddress` varchar(40) DEFAULT NULL,
    `EstOfMaterial` Decimal(10,3) DEFAULT NULL,
    `MaterialUsed` Decimal(10,3) DEFAULT NULL,
    `MaterialID` int(11) NOT NULL,
    `EquipUsedTime` time DEFAULT NULL,
    `EquipmentID` int(11) NOT NULL,
    `RequestStatus` varchar(20) NOT NULL,
    `ApproverOneID` int(11) NOT NULL,
    `ApproverTwoID` int(11) NOT NULL,
    `ApprovOneRevStatus` varchar(20) NOT NULL,
    `ApprovTwoRevStatus` varchar(20) NOT NULL,
    `Paid` bool DEFAULT 0,
    `DateSubmitted` date,
    `AssignedTo` varchar(20) DEFAULT NULL,
    `TechnicianTime` time DEFAULT NULL,
    `TechnicianNotes` varchar(200) DEFAULT NULL,
    PRIMARY KEY (RequestID),
    FOREIGN KEY (EquipmentID) REFERENCES EQUIPMENT(EquipmentID),
	FOREIGN KEY (MaterialID) REFERENCES MATERIALS(MaterialID),
    FOREIGN KEY (ApproverOneID) REFERENCES USERACCOUNTS(AccountID),
    FOREIGN KEY (ApproverTwoID) REFERENCES USERACCOUNTS(AccountID)
); 



DROP TABLE IF EXISTS `ARCHIVEDREQUESTS`;
CREATE TABLE `ARCHIVEDREQUESTS` (
	`ArchRequestID` int(11) NOT NULL,
    `RequestorType` varchar(20) NOT NULL,
    `AttachedFiles` LONGBLOB DEFAULT NULL,
    `PrefCompDate` date,
    `Email` varchar(20) NOT NULL,
    `FirstName` varchar(20) NOT NULL,
    `Surname` varchar(20) NOT NULL,
    `Discipline` varchar(20) NOT NULL,
    `ProjType` varchar(20) NOT NULL,
    `AccountToBeCharged` int(20) NOT NULL,
    `AccountHolder` varchar(40) NOT NULL,
    `NatureOfReq` varchar(200) DEFAULT NULL,
    `SupervFName` varchar(20) DEFAULT NULL,
    `SupervSName` varchar(20) DEFAULT NULL,
    `SupervEmail` varchar(20) DEFAULT NULL,
    `PhoneNumber` int(20) DEFAULT NULL,
    `Organisation` varchar(30) DEFAULT NULL,
    `OrgAddress` varchar(40) DEFAULT NULL,
    `EstOfMaterial` Decimal(10,3) DEFAULT NULL,
    `MaterialUsed` Decimal(10,3) DEFAULT NULL,
    `MaterialID` int(11) NOT NULL,
    `EquipUsedTime` time DEFAULT NULL,
    `EquipmentID` int(11) NOT NULL,
    `RequestStatus` varchar(20) NOT NULL,
    `ApproverOneID` int(11) NOT NULL,
    `ApproverTwoID` int(11) NOT NULL,
    `ApprovOneRevStatus` varchar(20) NOT NULL,
    `ApprovTwoRevStatus` varchar(20) NOT NULL,
    `Paid` bool DEFAULT 0,
    `DateSubmitted` date,
    `AssignedTo` varchar(20) DEFAULT NULL,
    `TechnicianTime` time DEFAULT NULL,
    `TechnicianNotes` varchar(200) DEFAULT NULL,
    PRIMARY KEY (ArchRequestID),
    FOREIGN KEY (EquipmentID) REFERENCES EQUIPMENT(EquipmentID),
	FOREIGN KEY (MaterialID) REFERENCES MATERIALS(MaterialID),
    FOREIGN KEY (ApproverOneID) REFERENCES USERACCOUNTS(AccountID),
    FOREIGN KEY (ApproverTwoID) REFERENCES USERACCOUNTS(AccountID)
);