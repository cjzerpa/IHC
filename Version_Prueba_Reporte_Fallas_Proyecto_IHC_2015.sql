SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

/*DROP DATABASE `reporteFallasFacyt`;*/

create schema if not exists `reporteFallasFacyt` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use `reporteFallasFacyt`;

create table if not exists `reporteFallasFacyt`.`Usuario`
(
	`Nombre` varchar(30) not null,
	`Apellido` varchar(30) not null,
	`Escuela` varchar(30) not null,
	`User_usuar` varchar(30) not null,
	`Pass_usuar` varchar(20) not null,
	`Email_usuar` varchar(30) not null,
	`Telefono_usuar` varchar(15),
	`verf_tecnico` int not null DEFAULT 1,

	PRIMARY KEY (`User_usuar`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table if not exists `reporteFallasFacyt`.`Reporte`
(
	`Id` int not null AUTO_INCREMENT,
	`Fecha` date not null,
	`Hora` time not null,
	`tipo` varchar(10) not null,
	`Asunto` varchar(30) not null,
	`Descrip` varchar(120) not null,
	`Estado` varchar(15) not null DEFAULT "En Progreso",
	`Depto` varchar(15) not null,

	PRIMARY KEY(`Id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table if not exists `reporteFallasFacyt`.`UserRealizaRepor`
(
	`User_usuar` varchar(30) not null,
	`Email_usuar` varchar(30) not null,
	`Telefono_usuar` varchar(15),
	`Id_repor` int not null AUTO_INCREMENT,
	`Fecha` date not null,
	`Hora` time not null,
	`tipo` varchar(10) not null,
	`Asunto` varchar(30) not null,
	`Descrip` varchar(120) not null,
	`Estado` varchar(15) not null DEFAULT "En Progreso",
	`Depto` varchar(15) not null,

	PRIMARY KEY (`Id_repor`),
	FOREIGN KEY (`User_usuar`) REFERENCES `reporteFallasFacyt`.`Usuario`(`User_usuar`)
	ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (`Id_repor`) REFERENCES `reporteFallasFacyt`.`Reporte`(`Id`)
	ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table if not exists `reporteFallasFacyt`.`Tecnico_atiende_reporte`
(
	`Id_repor_tecn` int not null AUTO_INCREMENT,
	`User_repor_tecn` varchar(30) not null,

	PRIMARY KEY(`Id_repor_tecn`,`User_repor_tecn`)
	/*,
		FOREIGN KEY (`Id`)
		REFERENCES (`reporteFallasFacyt`.`Reporte`)
		ON DELETE CASCADE,

		FOREIGN KEY (`User_tecn`)
		REFERENCES(`reporteFallasFacyt`.`Tecnico`)
		ON DELETE CASCADE
*/

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


insert into `reporteFallasFacyt`.`Usuario` (`Nombre`,`Apellido`,`Escuela`,`User_usuar`, `Pass_usuar`, `Email_usuar`, `Telefono_usuar`,`verf_tecnico`)
	values ('Usuario','Usuario','Computacion','user1','8474','dgazcon@correo.com','61634665',0);

insert into `reporteFallasFacyt`.`Reporte` (`Id`,`Fecha`,`Hora`,`tipo`,`Asunto`,`Descrip`,`Depto`)
	values (0,'2002-08-20','17:00','Hardward','Daño material','impresora','Computacion');

insert into `reporteFallasFacyt`.`UserRealizaRepor` (`User_usuar`,`Email_usuar`,`Telefono_usuar`,`Id_repor`,`Fecha`,`Hora`,`tipo`,`Asunto`,`Descrip`,`Depto`)
	values ('user1','dgazcon@correo.com','61634665',0,'2002-08-20','17:00','Hardward','Daño material','impresora','Computacion');	

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------*/
insert into `reporteFallasFacyt`.`Usuario` (`Nombre`,`Apellido`,`Escuela`, `User_usuar`, `Pass_usuar`, `Email_usuar`, `Telefono_usuar`,`verf_tecnico`)
	values ('Carlos','Zerpa','Computacion','czerpa','1234','czerpa@correo.com','61634665',1);

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/*
insert into `reporteFallasFacyt`.`Usuario` (`Nombre`,`Apellido`,`Escuela`, `User_usuar`, `Pass_usuar`, `Email_usuar`, `Telefono_usuar`,`verf_tecnico`)
	values ('user4','4421','user4@correo.com','050005465',0);

insert into `reporteFallasFacyt`.`Reporte` (`Fecha`,`Hora`,`tipo`,`Asunto`,`Descrip`,`Depto`)
	values ('2015-12-1','1:00','Hardward','Explosion','impresora','Fisica');

insert into `reporteFallasFacyt`.`UserRealizaRepor` (`User_usuar`,`Email_usuar`,`Telefono_usuar`,`Id_repor`,`Fecha`,`Hora`,`tipo`,`Asunto`,`Descrip`,`Depto`)
	values ('user4','user4@correo.com','050005465',1,'2015-12-1','1:00','Hardward','Explosion','impresora','Fisica');
*/
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------*/
insert into `reporteFallasFacyt`.`Usuario` (`Nombre`,`Apellido`,`Escuela`,`User_usuar`, `Pass_usuar`, `Email_usuar`, `Telefono_usuar`,`verf_tecnico`)
	values ('Daniel','Gazcon','Computacion','dgazcon','8474','dgazcon@correo.com','123456789',1);
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/*UPDATE `Reporte` SET (`Fecha`='2015-12-1',`Hora`='7:07',`tipo`='Software',`Asunto`='Daniel',`Descrip`='listado',`Estado`='Listo',`Depto`='Computacion') WHERE `Id`='2';*/

/*
insert into `reporteFallasFacyt`.`Reporte` (`Id`,`Fecha`,`Hora`,`tipo`,`Asunto`,`Estado`,`Descrip`,`Depto`,`Usuario`)
	values (0,'2002-08-20','17:00','Hardward','Daño material','impresora','Computacion','user1');


insert into `reporteFallasFacyt`.`Tecnico` (`User_tecn`,`Pass_tecn`,`Nombre`,`email_tecn`,`telefono_tecn`,`verf_tecnico`)
	values ('admin','1234','lele','lele@correo.com','65443');


/*
insert into `reporteFallasFacyt`.`UserRealizaRepor` (`Id_repor`,`User_repor`)
	values (0,'dgazcon1');*/



