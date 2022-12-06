-- Creamos la base de datos
CREATE DATABASE `pokemon` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `pokemon`;

-- Creamos las tablas
CREATE TABLE `pokemon`.`pokemons` (
`no` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`pic` VARCHAR2(600) NOT NULL ,
`name` VARCHAR(50) NOT NULL ,
`hp` INT NOT NULL ,
`att` INT NOT NULL ,
`def` INT NOT NULL ,
`s_att` INT NOT NULL ,
`s_def` INT NOT NULL ,
`spd` INT NOT NULL
) ENGINE = INNODB;

CREATE TABLE `pokemon`.`type` (
`no` INT NOT NULL ,
`type` VARCHAR(50) NOT NULL ,
PRIMARY KEY ( `no` , `type` )
) ENGINE = INNODB;

CREATE TABLE `pokemon`.`abilities` (
`no` INT NOT NULL ,
`ability` VARCHAR(50) NOT NULL ,
PRIMARY KEY ( `no` , `ability` )
) ENGINE = INNODB;

-- Creamos las claves foráneas
ALTER TABLE `type`
ADD CONSTRAINT `type_ibfk_1`
FOREIGN KEY (`no`) REFERENCES `pokemons` (`no`)
ON UPDATE CASCADE;
ALTER TABLE `abilities`
ADD CONSTRAINT `abilities_ibfk_1`
FOREIGN KEY (`no`) REFERENCES `pokemons` (`no`)
ON UPDATE CASCADE;

-- Insertamos datos de ejemplo en la tienda
USE `pokemon`;

INSERT INTO `pokemons` (`no`, `pic`, `name`, `hp`, `att`, `def`, `s_att`, `s_def`, `spd` ) VALUES
(001, '../public/img/001.png', 'Bulbasaur', '45', '49'. '49', '65', '65', '45'),
(002, '../public/img/002.png', 'Ivysaur', '60', '62', '63', '80', '80', '60'),
(003, '../public/img/003.png', 'Venusaur', '80', '82', '83', '100', '100', '80'),
(004, '../public/img/004.png', 'Charmander', '39', '52'. '43', '60', '50', '65'),
(005, '../public/img/005.png', 'Charmeleon', '58', '64', '58', '80', '65', '80'),
(006, '../public/img/006.png', 'Charizard', '78', '84', '78', '109', '85', '100'),
(007, '../public/img/007.png', 'Squirtle', '44', '48'. '65', '50', '64', '43'),
(008, '../public/img/008.png', 'Wartortle', '59', '63', '80', '65', '80', '58'),
(009, '../public/img/009.png', 'Blastoise', '79', '83', '100', '85', '105', '78'),
(010, '../public/img/010.png', 'Caterpie', '45', '30', '35', '20', '20', '45'),
(011, '../public/img/011.png', 'Metapod', '50', '20', '55', '25', '25', '30'),
(012, '../public/img/012.png', 'Butterfree', '60', '45', '50', '90', '80', '70'),
(013, '../public/img/013.png', 'Weedle', '40', '35', '30', '20', '20', '50'),
(014, '../public/img/014.png', 'Kakuna', '45', '25', '50', '25', '25', '35'),
(015, '../public/img/015.png', 'Beedrill', '65', '90', '40', '45', '80', '75');

INSERT INTO `type` (`no`, `type`) VALUES
(001, 'Grass'),
(001, 'Poison'),
(002, 'Grass'),
(002, 'Poison')
(003, 'Grass'),
(003, 'Poison'),
(004, 'Fire'),
(005, 'Fire'),
(006, 'Fire'),
(006, 'Flying'),
(007, 'Water'),
(008, 'Water'),
(009, 'Water'),
(010, 'Bug'),
(011, 'Bug'),
(012, 'Bug'),
(012, 'Flying'),
(013, 'Bug'),
(013, 'Poison'),
(014, 'Bug'),
(014, 'Poison'),
(015, 'Bug'),
(015, 'Poison');

INSERT INTO `abilities` (`no`, `ability`) VALUES
(001, 'Overgrow'),
(001, 'Chlorophyll'),
(002, 'Overgrow'),
(002, 'Chlorophyll')
(003, 'Overgrow'),
(003, 'Chlorophyll'),
(004, 'Blaze'),
(004, 'Solar Power'),
(005, 'Blaze'),
(005, 'Solar Power'),
(006, 'Blaze'),
(006, 'Solar Power'),
(007, 'Torrent'),
(007, 'Rain Dish'),
(008, 'Torrent'),
(008, 'Rain Dish'),
(009, 'Torrent'),
(009, 'Rain Dish'),
(010, 'Shield Dust'),
(010, 'Run Away'),
(011, 'Shed Skin'),
(012, 'Compoundeyes'),
(012, 'Tinted Lens'),
(013, 'Shield Dust'),
(013, 'Run Away'),
(014, 'Shed Skin'),
(015, 'Swarm'),
(015, 'Sniper');