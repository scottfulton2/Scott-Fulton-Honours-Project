
USE `honoursprojectmyad`;



INSERT INTO `EQUIPMENT` (`EquipmentID`,`EquipmentName`,`Descr`,`Location`,`Cost`,`DateAdded`)
VALUES
	(1,'CNC Machine','A CNC machine allows for three-dimensional cutting tasks to be accomplished with a single set of prompts. A CNC Machine can be used to control a range of complex machinery, from grinders and lathes to mills and CNC routers.','Main Workshop',1.00,'2022-02-13'),
	(2,'Drill','A Drill that can can have many different drill bits attached to it, so that holes of different sizes can be cut.','Main Workshop',1.00,'2022-02-13'),
	(3,'3D Printer','A Printer which can produce 3D objects when given the relevant specifications and dimensions for that object.','Printing & Cutting Room',1.00,'2022-02-13'),
	(4,'Laser Cutter','A cutting machine which uses a computer controlled laser to finely cut through material.','Printing & Cutting Room',1.00,'2022-02-13'),
	(5,'Furnace','Used for heating material to a very high temperature.','Room 1.07',1.00,'2022-02-13');
    
    
   
INSERT INTO `MATERIALS` (`MaterialID`,`MaterialName`,`Cost`,`UnitOfMeasure`,`Descr`,`DateAdded`)
VALUES
	(1,'3D Printing Material',2.00,'cm³','Material used for 3D printing','2022-02-13'),
	(2,'Laser Cutting Wood',2.00,'cm²','Particular type of wood used ','2022-02-13'),
	(3,'Aluminium',2.00,'cm²','Type of Metal','2022-02-13'),
	(4,'Copper',2.00,'cm²','Type of Metal. Very Conductive','2022-02-13'),
	(5,'Steel',2.00,'cm²','Type of Metal','2022-02-13'),
    (6,'Wood',2.00,'cm³','Just generic wood','2022-02-13'),
    (7,'Brass',2.00,'cm²','Type of Metal','2022-02-16'),
    (8,'Glue',0.50,'ml','Used for Joining Material together','2022-02-15'),
    (9,'Nuts & Bolts',1.00,'','Used for Joining Material together','2022-02-14');
    
    
    
INSERT INTO `USERACCOUNTS` (`AccountID`,`AccountType`,`Username`,`Password`)
VALUES
	(1,'System Administrator','SYSADMIN','Sys_Admin2022HonProj'),
	(2,'Technician','TECHNICIAN','Tech2022HonProj'),
	(3,'Finance/Admin Staff','FINAD','Fin/Admin2022HonProj'),
	(4,'Supervisor','SUPERVISOR','Superv2022HonProj');
    
    
 /*   
INSERT INTO `REQUESTS` (`RequestID`,`RequestorType`,`AttachedFiles`,`PrefCompDate`,`Email`,`FirstName`,`Surname`,
						`Discipline`,`ProjType`,`AccountToBeCharged`,`AccountHolder`,`NatureOfReq`,`SupervFName`,
						`SupervSName`,`SupervEmail`,`PhoneNumber`,`Organisation`,`OrgAddress`,`EstOfMaterial`,`MaterialUsed`,
						`MaterialID`,`EquipUsedTime`,`EquipmentID`,`RequestStatus`,`ApproverOneID`,`ApproverTwoID`,
						`ApprovOneRevStatus`,`ApprovTwoRevStatus`, `Paid`,`DateSubmitted`,`AssignedTo`,`TechnicianTime`,
						`TechnicianNotes`)
VALUES
	(1,'Staff','','2022-05-21','az@dundee.ac.uk','Andrew','Richards','Biomedical Engineering','Research',0111333555,'Dr Andrew Richards',
	'To create a 3D model of a wrist bone for a project I am working on','','','','','','orgadd',150,'',1,'00:00:00',3,status,),
	(2,'Student','','2022-04-04','012345@dundee.ac.uk'),
	(3,'Student','','2022-04-04',''),
	(4,'Student','','2022-04-04',''),
	(5,'External','','2022-04-04','JoeyBloggs@evilcorp.co.uk');
    
    
    
INSERT INTO `ARCHIVEDREQUESTS` (`ArchRequestID`,`RequestorType`,`AttachedFiles`,`PrefCompDate`,`Email`,`FirstName`,`Surname`,
						`Discipline`,`ProjType`,`AccountToBeCharged`,`AccountHolder`,`NatureOfReq`,`SupervFName`,
						`SupervSName`,`SupervEmail`,`PhoneNumber`,`Organisation`,`OrgAddress`,`EstOfMaterial`,`MaterialUsed`,
						`MaterialID`,`EquipUsedTime`,`EquipmentID`,`RequestStatus`,`ApproverOneID`,`ApproverTwoID`,
						`ApprovOneRevStatus`,`ApprovTwoRevStatus`, `Paid`,`DateSubmitted`,`AssignedTo`,`TechnicianTime`,
						`TechnicianNotes`)
VALUES
	(1,'Staff',''),
	(8,'Student',''),
	(223,'External','');
    */