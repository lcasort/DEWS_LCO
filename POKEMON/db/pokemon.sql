-- Creamos la base de datos
CREATE DATABASE `pokemon` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `pokemon`;

-- Creamos las tablas
CREATE TABLE `pokemon`.`pokemons` (
`no` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`pic` VARCHAR(600) NOT NULL ,
`name` VARCHAR(50) NOT NULL ,
`hp` INT NOT NULL ,
`att` INT NOT NULL ,
`def` INT NOT NULL ,
`s_att` INT NOT NULL ,
`s_def` INT NOT NULL ,
`spd` INT NOT NULL
) ENGINE = INNODB;

CREATE TABLE `pokemon`.`type` (
`id_type` INT NOT NULL ,
`type` VARCHAR(50) NOT NULL ,
PRIMARY KEY ( `id_type` )
) ENGINE = INNODB;

CREATE TABLE `pokemon`.`pokemons_type` (
`no` INT NOT NULL ,
`id_type` INT NOT NULL ,
PRIMARY KEY ( `no` , `id_type` )
) ENGINE = INNODB;

CREATE TABLE `pokemon`.`abilities` (
`id_ability` INT NOT NULL ,
`ability` VARCHAR(50) NOT NULL ,
PRIMARY KEY ( `id_ability` )
) ENGINE = INNODB;

CREATE TABLE `pokemon`.`pokemons_abilities` (
`no` INT NOT NULL ,
`id_ability` INT NOT NULL ,
PRIMARY KEY ( `no` , `id_ability` )
) ENGINE = INNODB;

-- Creamos las claves foráneas
ALTER TABLE `pokemons_type`
ADD CONSTRAINT `pokemons_type_ibfk_1`
FOREIGN KEY (`no`) REFERENCES `pokemons` (`no`)
ON UPDATE CASCADE;
ALTER TABLE `pokemons_type`
ADD CONSTRAINT `pokemons_type_ibfk_2`
FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`)
ON UPDATE CASCADE;
ALTER TABLE `pokemons_abilities`
ADD CONSTRAINT `pokemons_abilities_ibfk_1`
FOREIGN KEY (`no`) REFERENCES `pokemons` (`no`)
ON UPDATE CASCADE;
ALTER TABLE `pokemons_abilities`
ADD CONSTRAINT `pokemons_abilities_ibfk_2`
FOREIGN KEY (`id_ability`) REFERENCES `abilities` (`id_ability`)
ON UPDATE CASCADE;

-- Insertamos datos de ejemplo en la tienda
USE `pokemon`;

INSERT INTO `pokemons` (`no`, `pic`, `name`, `hp`, `att`, `def`, `s_att`, `s_def`, `spd` ) VALUES
(001, './public/img/001.png', 'Bulbasaur', '45', '49', '49', '65', '65', '45'),
(002, './public/img/002.png', 'Ivysaur', '60', '62', '63', '80', '80', '60'),
(003, './public/img/003.png', 'Venusaur', '80', '82', '83', '100', '100', '80'),
(004, './public/img/004.png', 'Charmander', '39', '52', '43', '60', '50', '65'),
(005, './public/img/005.png', 'Charmeleon', '58', '64', '58', '80', '65', '80'),
(006, './public/img/006.png', 'Charizard', '78', '84', '78', '109', '85', '100'),
(007, './public/img/007.png', 'Squirtle', '44', '48', '65', '50', '64', '43'),
(008, './public/img/008.png', 'Wartortle', '59', '63', '80', '65', '80', '58'),
(009, './public/img/009.png', 'Blastoise', '79', '83', '100', '85', '105', '78'),
(010, './public/img/010.png', 'Caterpie', '45', '30', '35', '20', '20', '45'),
(011, './public/img/011.png', 'Metapod', '50', '20', '55', '25', '25', '30'),
(012, './public/img/012.png', 'Butterfree', '60', '45', '50', '90', '80', '70'),
(013, './public/img/013.png', 'Weedle', '40', '35', '30', '20', '20', '50'),
(014, './public/img/014.png', 'Kakuna', '45', '25', '50', '25', '25', '35'),
(015, './public/img/015.png', 'Beedrill', '65', '90', '40', '45', '80', '75'),
(016, './public/img/016.png', 'Pidgey', '40', '45', '40', '35', '35', '56'),
(017, './public/img/017.png', 'Pidgeotto', '63', '60', '55', '50', '50', '71'),
(018, './public/img/018.png', 'Pidgeot', '83', '80', '75', '70', '70', '101'),
(019, './public/img/019.png', 'Rattata', '30', '56', '35', '25', '35', '72'),
(020, './public/img/020.png', 'Raticate', '55', '81', '60', '50', '70', '97');

INSERT INTO `type` (`id_type`, `type`) VALUES 
(1, 'Grass'),
(2, 'Poison'),
(3, 'Fire'),
(4, 'Flying'),
(5, 'Water'),
(6, 'Bug'),
(7, 'Normal');

INSERT INTO `pokemons_type` (`no`, `id_type`) VALUES 
(001, 1),
(001, 2),
(002, 1),
(002, 2),
(003, 1),
(003, 2),
(004, 3),
(005, 3),
(006, 3),
(006, 4),
(007, 5),
(008, 5),
(009, 5),
(010, 6),
(011, 6),
(012, 6),
(012, 4),
(013, 6),
(013, 2),
(014, 6),
(014, 2),
(015, 6),
(015, 2),
(016, 7),
(016, 4),
(017, 7),
(017, 4),
(018, 7),
(018, 4),
(019, 7),
(020, 7);

INSERT INTO `abilities` (`id_ability`, `ability`) VALUES
(1, 'Overgrow'),
(2, 'Chlorophyll'),
(3, 'Blaze'),
(4, 'Solar Power'),
(5, 'Torrent'),
(6, 'Rain Dish'),
(7, 'Shield Dust'),
(8, 'Run Away'),
(9, 'Shed Skin'),
(10, 'Compoundeyes'),
(11, 'Tinted Lens'),
(12, 'Swarm'),
(13, 'Sniper'),
(14, 'Keen Eye'),
(15, 'Tangled Feet'),
(16, 'Big Pecks'),
(17, 'Guts'),
(18, 'Hustles');

INSERT INTO `pokemons_abilities` (`no`, `id_ability`) VALUES
(001, 1),
(001, 2),
(002, 1),
(002, 2),
(003, 1),
(003, 2),
(004, 3),
(004, 4),
(005, 3),
(005, 4),
(006, 3),
(006, 4),
(007, 5),
(007, 6),
(008, 5),
(008, 6),
(009, 5),
(009, 6),
(010, 7),
(010, 8),
(011, 9),
(012, 10),
(012, 11),
(013, 7),
(013, 8),
(014, 9),
(015, 12),
(015, 13),
(016, 14),
(016, 15),
(016, 16),
(017, 14),
(017, 15),
(017, 16),
(018, 14),
(018, 15),
(018, 16),
(019, 8),
(019, 17),
(019, 18),
(020, 8),
(020, 17),
(020, 18);