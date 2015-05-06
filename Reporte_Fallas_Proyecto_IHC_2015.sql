SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

create schema if not exists `Fallas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use `Fallas`;

create table if not exists `Fallas`.`Usuario`
(
	`User_usuar` varchar(30) not null,
	`Pass_usuar` varchar(20) not null,
	`Email_usuar` varchar(30) not null,
	`Telefono_usuar` varchar(15),
	`verf_tecnico` int not null DEFAULT 1,

	PRIMARY KEY (`User_usuar`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table if not exists `Fallas`.`Reporte`
(
	`Id` int not null AUTO_INCREMENT,
	`Fecha` date not null,
	`Hora` time not null,
	`tipo` varchar(10) not null,
	`Asunto` varchar(30) not null,
	`Descrip` varchar(120) not null,
	`Estado` varchar(15) not null DEFAULT "En Progreso",
	`Depto` varchar(15) not null,
	`Usuario` varchar(20) not null,

	PRIMARY KEY(`Id`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table if not exists `Fallas`.`UserRealizaRepor`
(
	`Id_repor` int not null AUTO_INCREMENT,
	`User_repor` varchar(30) not null,

	PRIMARY KEY (`Id_repor`,`User_repor`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table if not exists `Fallas`.`Tecnico_atiende_reporte`
(
	`Id_repor_tecn` int not null AUTO_INCREMENT,
	`User_repor_tecn` varchar(30) not null,

	PRIMARY KEY(`Id_repor_tecn`,`User_repor_tecn`)
	/*,
		FOREIGN KEY (`Id`)
		REFERENCES (`Fallas`.`Reporte`)
		ON DELETE CASCADE,

		FOREIGN KEY (`User_tecn`)
		REFERENCES(`Fallas`.`Tecnico`)
		ON DELETE CASCADE
*/

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


/*insert into `Fallas`.`Usuario` (`User_usuar`, `Pass_usuar`, `Email_usuar`, `Telefono_usuar`,`verf_tecnico`)
	values ('user1','8474','dgazcon@correo.com','61634665',0);

insert into `Fallas`.`Usuario` (`User_usuar`, `Pass_usuar`, `Email_usuar`, `Telefono_usuar`,`verf_tecnico`)
	values ('czerpa','1234','czerpa@correo.com','61634665',1);

insert into `Fallas`.`Reporte` (`Id`,`Fecha`,`Hora`,`tipo`,`Asunto`,`Estado`,`Descrip`,`Depto`,`Usuario`)
	values (0,'2002-08-20','17:00','Hardward','Daño material','impresora','Computacion','dgazcon1');

insert into `Fallas`.`Reporte` (`Id`,`Fecha`,`Hora`,`tipo`,`Asunto`,`Estado`,`Descrip`,`Depto`,`Usuario`)
	values (0,'2002-08-20','17:00','Hardward','Daño material','impresora','Computacion','user1');

/*
insert into `Fallas`.`Tecnico` (`User_tecn`,`Pass_tecn`,`Nombre`,`email_tecn`,`telefono_tecn`,`verf_tecnico`)
	values ('admin','1234','lele','lele@correo.com','65443');
*/

/*
insert into `Fallas`.`UserRealizaRepor` (`Id_repor`,`User_repor`)
	values (0,'dgazcon1');*/


	