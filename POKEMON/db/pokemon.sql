-- Creamos la base de datos
CREATE DATABASE `pokemon` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `pokemon`;

-- Creamos las tablas
CREATE TABLE `pokemon`.`pokemons` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`no` INT NOT NULL,
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
`id` INT NOT NULL ,
`id_type` INT NOT NULL ,
PRIMARY KEY ( `id` , `id_type` )
) ENGINE = INNODB;

CREATE TABLE `pokemon`.`abilities` (
`id_ability` INT NOT NULL ,
`ability` VARCHAR(50) NOT NULL ,
PRIMARY KEY ( `id_ability` )
) ENGINE = INNODB;

CREATE TABLE `pokemon`.`pokemons_abilities` (
`id` INT NOT NULL ,
`id_ability` INT NOT NULL ,
PRIMARY KEY ( `id` , `id_ability` )
) ENGINE = INNODB;

-- Creamos las claves foráneas
ALTER TABLE `pokemons_type`
ADD CONSTRAINT `pokemons_type_ibfk_1`
FOREIGN KEY (`id`) REFERENCES `pokemons` (`id`)
ON DELETE CASCADE
ON UPDATE CASCADE;
ALTER TABLE `pokemons_type`
ADD CONSTRAINT `pokemons_type_ibfk_2`
FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`)
ON DELETE CASCADE
ON UPDATE CASCADE;
ALTER TABLE `pokemons_abilities`
ADD CONSTRAINT `pokemons_abilities_ibfk_1`
FOREIGN KEY (`id`) REFERENCES `pokemons` (`id`)
ON DELETE CASCADE
ON UPDATE CASCADE;
ALTER TABLE `pokemons_abilities`
ADD CONSTRAINT `pokemons_abilities_ibfk_2`
FOREIGN KEY (`id_ability`) REFERENCES `abilities` (`id_ability`)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- Insertamos datos de ejemplo en la tienda
USE `pokemon`;

INSERT INTO `pokemons` (`id`, `no`, `pic`, `name`, `hp`, `att`, `def`, `s_att`, `s_def`, `spd` ) VALUES
(1, 001, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png', 'Bulbasaur', '45', '49', '49', '65', '65', '45'),
(2, 002, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/2.png', 'Ivysaur', '60', '62', '63', '80', '80', '60'),
(3, 003, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/3.png', 'Venusaur', '80', '82', '83', '100', '100', '80'),
(4, 004, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png', 'Charmander', '39', '52', '43', '60', '50', '65'),
(5, 005, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/5.png', 'Charmeleon', '58', '64', '58', '80', '65', '80'),
(6, 006, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/6.png', 'Charizard', '78', '84', '78', '109', '85', '100'),
(7, 007, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png', 'Squirtle', '44', '48', '65', '50', '64', '43'),
(8, 008, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/8.png', 'Wartortle', '59', '63', '80', '65', '80', '58'),
(9, 009, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/9.png', 'Blastoise', '79', '83', '100', '85', '105', '78'),
(10, 010, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/10.png', 'Caterpie', '45', '30', '35', '20', '20', '45'),
(11, 011, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/11.png', 'Metapod', '50', '20', '55', '25', '25', '30'),
(12, 012, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/12.png', 'Butterfree', '60', '45', '50', '90', '80', '70'),
(13, 013, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/13.png', 'Weedle', '40', '35', '30', '20', '20', '50'),
(14, 014, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/14.png', 'Kakuna', '45', '25', '50', '25', '25', '35'),
(15, 015, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/15.png', 'Beedrill', '65', '90', '40', '45', '80', '75'),
(16, 016, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/16.png', 'Pidgey', '40', '45', '40', '35', '35', '56'),
(17, 017, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/17.png', 'Pidgeotto', '63', '60', '55', '50', '50', '71'),
(18, 018, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/18.png', 'Pidgeot', '83', '80', '75', '70', '70', '101'),
(19, 019, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/19.png', 'Rattata', '30', '56', '35', '25', '35', '72'),
(20, 020, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/20.png', 'Raticate', '55', '81', '60', '50', '70', '97'),
(21, 021, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/21.png', 'Spearow', '40', '60', '30', '31', '31', '70'),
(22, 022, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/22.png', 'Fearow', '65', '90', '65', '61', '61', '100'),
(23, 023, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/23.png', 'Ekans', '35', '60', '44', '40', '54', '55'),
(24, 024, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/24.png', 'Arbok', '60', '95', '69', '65', '79', '80'),
(25, 025, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png', 'Pikachu', '35', '55', '40', '50', '50', '90'),
(26, 026, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/26.png', 'Raichu', '60', '90', '55', '90', '80', '110'),
(27, 027, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/27.png', 'Sandshrew', '50', '75', '85', '20', '30', '40'),
(28, 028, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/28.png', 'Sandslash', '75', '100', '110', '45', '55', '65'),
(29, 029, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/29.png', 'Nidoran♀', '55', '47', '52', '40', '40', '41'),
(30, 030, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/30.png', 'Nidorina', '70', '62', '67', '55', '55', '56'),
(31, 031, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/31.png', 'Nidoqueen', '90', '92', '87', '75', '85', '76'),
(32, 032, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/32.png', 'Nidoran♂', '46', '57', '40', '40', '40', '50'),
(33, 033, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/33.png', 'Nidorino', '61', '72', '57', '55', '55', '65'),
(34, 034, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/34.png', 'Nidoking', '81', '102', '77', '85', '75', '85'),
(35, 035, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/35.png', 'Clefairy', '70', '45', '48', '60', '65', '35'),
(36, 036, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/36.png', 'Clefable', '95', '70', '73', '95', '90', '60'),
(37, 037, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/37.png', 'Vulpix', '38', '41', '40', '50', '65', '65'),
(38, 038, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/38.png', 'Ninetales', '73', '76', '75', '81', '100', '100'),
(39, 039, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/39.png', 'Jigglypuff', '115', '45', '20', '45', '25', '20'),
(40, 040, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/40.png', 'Wigglytuff', '140', '70', '45', '85', '50', '45'),
(41, 041, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/41.png', 'Zubat', '40', '45', '35', '30', '40', '55'),
(42, 042, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/42.png', 'Golbat', '75', '80', '70', '65', '75', '90'),
(43, 043, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/43.png', 'Oddish', '45', '50', '55', '75', '65', '30'),
(44, 044, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/44.png', 'Gloom', '60', '65', '70', '85', '75', '40'),
(45, 045, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/45.png', 'Vileplume', '75', '80', '85', '110', '90', '50'),
(46, 046, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/46.png', 'Paras', '35', '70', '55', '45', '55', '25'),
(47, 047, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/47.png', 'Parasect', '60', '95', '80', '60', '80', '30'),
(48, 048, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/48.png', 'Venonat', '60', '55', '50', '40', '55', '45'),
(49, 049, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/49.png', 'Venomoth', '70', '65', '60', '90', '75', '90'),
(50, 050, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/50.png', 'Diglett', '10', '55', '25', '35', '45', '95'),
(51, 051, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/51.png', 'Dugtrio', '35', '100', '50', '50', '70', '120'),
(52, 052, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/52.png', 'Meowth', '40', '45', '35', '40', '40', '90'),
(53, 053, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/53.png', 'Persian', '65', '70', '60', '65', '65', '115'),
(54, 054, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/54.png', 'Psyduck', '50', '52', '48', '65', '50', '55'),
(55, 055, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/55.png', 'Golduck', '80', '82', '78', '95', '80', '85'),
(56, 056, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/56.png', 'Mankey', '40', '80', '35', '35', '45', '70'),
(57, 057, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/57.png', 'Primeape', '65', '105', '60', '60', '70', '95'),
(58, 058, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/58.png', 'Growlithe', '55', '70', '45', '70', '50', '60'),
(59, 059, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/59.png', 'Arcanine', '90', '110', '80', '100', '80', '95'),
(60, 060, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/60.png', 'Poliwag', '40', '50', '40', '40', '40', '90'),
(61, 061, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/61.png', 'Poliwhirl', '65', '65', '65', '50', '50', '90'),
(62, 062, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/62.png', 'Poliwrath', '90', '95', '95', '70', '90', '70'),
(63, 063, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/63.png', 'Abra', '25', '20', '15', '105', '55', '90'),
(64, 064, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/64.png', 'Kadabra', '40', '35', '30', '120', '70', '105'),
(65, 065, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/65.png', 'Alakazam', '55', '50', '45', '135', '95', '120'),
(66, 066, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/66.png', 'Machop', '70', '80', '50', '35', '35', '35'),
(67, 067, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/67.png', 'Machoke', '80', '100', '70', '50', '60', '45'),
(68, 068, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/68.png', 'Machamp', '90', '130', '80', '65', '85', '55'),
(69, 069, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/69.png', 'Bellsprout', '50', '75', '35', '70', '30', '40'),
(70, 070, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/70.png', 'Weepinbell', '65', '90', '50', '85', '45', '55'),
(71, 071, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/71.png', 'Victreebel', '80', '105', '65', '100', '70', '70'),
(72, 072, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/72.png', 'Tentacool', '40', '40', '35', '50', '100', '70'),
(73, 073, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/73.png', 'Tentacruel', '80', '70', '65', '80', '120', '100'),
(74, 074, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/74.png', 'Geodude', '40', '80', '100', '30', '30', '20'),
(75, 075, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/75.png', 'Graveler', '55', '95', '115', '45', '45', '35'),
(76, 076, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/76.png', 'Golem', '80', '120', '130', '55', '65', '45'),
(77, 077, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/77.png', 'Ponyta', '50', '85', '55', '65', '65', '90'),
(78, 078, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/78.png', 'Rapidash', '65', '100', '70', '80', '80', '105'),
(79, 079, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/79.png', 'Slowpoke', '90', '65', '65', '40', '40', '15'),
(80, 080, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/80.png', 'Slowbro', '95', '75', '110', '100', '80', '30'),
(81, 081, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/81.png', 'Magnemite', '25', '35', '70', '95', '55', '45'),
(82, 082, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/82.png', 'Magneton', '50', '60', '95', '120', '70', '70'),
(83, 083, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/83.png', "Farfetch'd", '52', '90', '55', '58', '62', '60'),
(84, 084, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/84.png', 'Doduo', '35', '85', '45', '35', '35', '75'),
(85, 085, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/85.png', 'Dodrio', '60', '110', '70', '60', '60', '110'),
(86, 086, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/86.png', 'Seel', '65', '45', '55', '45', '70', '45'),
(87, 087, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/87.png', 'Dewgong', '90', '70', '80', '70', '95', '70'),
(88, 088, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/88.png', 'Grimer', '80', '80', '50', '40', '50', '25'),
(89, 089, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/89.png', 'Muk', '105', '105', '75', '65', '100', '50'),
(90, 090, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/90.png', 'Shellder', '30', '65', '100', '45', '25', '40'),
(91, 091, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/91.png', 'Cloyster', '50', '95', '180', '85', '45', '70'),
(92, 092, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/92.png', 'Gastly', '30', '35', '30', '100', '35', '80'),
(93, 093, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/93.png', 'Haunter', '45', '50', '45', '115', '55', '95'),
(94, 094, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/94.png', 'Gengar', '60', '65', '60', '130', '75', '110'),
(95, 095, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/95.png', 'Onix', '35', '45', '160', '30', '45', '70'),
(96, 096, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/96.png', 'Drowzee', '60', '48', '45', '43', '90', '42'),
(97, 097, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/97.png', 'Hypno', '85', '73', '70', '73', '115', '67'),
(98, 098, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/98.png', 'Krabby', '30', '105', '90', '25', '25', '50'),
(99, 099, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/99.png', 'Kingler', '55', '130', '115', '50', '50', '75'),
(100, 100, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/100.png', 'Voltorb', '40', '30', '50', '55', '55', '100'),
(101, 101, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/101.png', 'Electrode', '60', '50', '70', '80', '80', '150');

INSERT INTO `type` (`id_type`, `type`) VALUES 
(1, 'Grass'),
(2, 'Poison'),
(3, 'Fire'),
(4, 'Flying'),
(5, 'Water'),
(6, 'Bug'),
(7, 'Normal'),
(8, 'Electric'),
(9, 'Ground'),
(10, 'Fairy'),
(11, 'Fight'),
(12, 'Psychic'),
(13, 'Rock'),
(14, 'Steel'),
(15, 'Ice'),
(16, 'Ghost'),
(17, 'Dragon');

INSERT INTO `pokemons_type` (`id`, `id_type`) VALUES 
(1, 1), (1, 2), (2, 1), (2, 2), (3, 1), (3, 2),
(4, 3), (5, 3), (6, 3), (6, 4),
(7, 5), (8, 5), (9, 5),
(10, 6), (11, 6), (12, 6), (12, 4),
(13, 6), (13, 2), (14, 6), (14, 2), (15, 6), (15, 2),
(16, 7), (16, 4), (17, 7), (17, 4), (18, 7), (18, 4),
(19, 7), (20, 7),
(21, 4), (21, 7), (22, 4), (22, 7),
(23, 2), (24, 2),
(25, 8), (26, 8),
(27, 9), (28, 9),
(29, 2), (30, 2), (31, 2), (31, 9),
(32, 2), (33, 2), (34, 2), (34, 9),
(35, 10), (36, 10),
(37, 3), (38, 3),
(39, 7), (39, 10), (40, 7), (40, 10),
(41, 2), (41, 4), (42, 2), (42, 4),
(43, 1), (43, 2), (44, 1), (44, 2), (45, 1), (45, 2),
(46, 6), (46, 1), (47, 6), (47, 1),
(48, 6), (48, 2), (49, 6), (49, 2),
(50, 9), (51, 9),
(52, 7), (53, 7),
(54, 5), (55, 5),
(56, 11), (57, 11),
(58, 3), (59, 3),
(60, 5), (61, 5), (62, 5), (62, 11),
(63, 12), (64, 12), (65, 12),
(66, 11), (67, 11), (68, 11),
(69, 1), (69, 2), (70, 1), (70, 2), (71, 1), (71, 2),
(72, 5), (72, 2), (73, 5), (73, 2),
(74, 13), (74, 9), (75, 13), (75, 9), (76, 13), (76, 9),
(77, 3), (78, 3),
(79, 5), (79, 12), (80, 5), (80, 12),
(81, 8), (81, 14), (82, 8), (82, 14),
(83, 7), (83, 4),
(84, 7), (84, 4), (85, 7), (85, 4),
(86, 5), (87, 5), (87, 15),
(88, 2), (89, 2),
(90, 5), (91, 5), (91, 15),
(92, 16), (92, 2), (93, 16), (93, 2), (94, 16), (94, 2),
(95, 13), (95, 9),
(96, 12), (97, 12),
(98, 5), (99, 5),
(100, 8), (101, 8);

INSERT INTO `abilities` (`id_ability`, `ability`) VALUES
(1, 'Overgrow'), (2, 'Chlorophyll'), (3, 'Blaze'),
(4, 'Solar Power'), (5, 'Torrent'), (6, 'Rain Dish'),
(7, 'Shield Dust'), (8, 'Run Away'), (9, 'Shed Skin'),
(10, 'Compoundeyes'), (11, 'Tinted Lens'), (12, 'Swarm'),
(13, 'Sniper'), (14, 'Keen Eye'), (15, 'Tangled Feet'),
(16, 'Big Pecks'), (17, 'Guts'), (18, 'Hustle'),
(19, 'Intimidate'), (20, 'Unnerve'), (21, 'Static'),
(22, 'Lightning Rod'), (23, 'Sand Veil'), (24, 'Sand Rush'),
(25, 'Rivalry'), (26, 'Sheer Force'), (27, 'Poison Point'),
(28, 'Cute Charm'), (29, 'Magic Guard'), (30, 'Friend Guard'),
(31, 'Unaware'), (32, 'Flash Fire'), (33, 'Drought'),
(34, 'Competitive'), (35, 'Frisk'), (36, 'Inner Focus'),
(37, 'Infiltrator'), (38, 'Stench'), (39, 'Effect Spore'),
(40, 'Dry Skin'), (41, 'Damp'), (42, 'Wonder Skin'),
(43, 'Arena Trap'), (44, 'Sand Force'), (45, 'Pickup'),
(46, 'Technician'), (47, 'Limber'), (48, 'Cloud Nine'),
(49, 'Swift Swim'), (50, 'Vital Spirit'), (51, 'Anger Point'),
(52, 'Defiant'), (53, 'Justified'), (54, 'Water Absorb'),
(55, 'Synchronize'), (56, 'No Guard'), (57, 'Steadfast'),
(58, 'Gluttony'), (59, 'Clear Body'), (60, 'Liquid Ooze'),
(61, 'Rock Head'), (62, 'Sturdy'), (63, 'Flame Body'),
(64, 'Oblivious'), (65, 'Own Tempo'), (66, 'Regenerator'),
(67, 'Magnet Pull'), (68, 'Analytic'), (69, 'Early Bird'),
(70, 'Thick Fat'), (71, 'Hydration'), (72, 'Ice Body'),
(73, 'Sticky Hold'), (74, 'Poison Touch'), (75, 'Shell Armor'),
(76, 'Skill Link'), (77, 'Overcoat'), (78, 'Levitate'),
(79, 'Cursed Body'), (80, 'Weak Armor'), (81, 'Insomnia'),
(82, 'Forewarn'), (83, 'Hyper Cutter'), (84, 'Soundproof'),
(85, 'Aftermath');

INSERT INTO `pokemons_abilities` (`id`, `id_ability`) VALUES
(1, 1), (1, 2), (2, 1), (2, 2), (3, 1), (3, 2),
(4, 3), (4, 4), (5, 3), (5, 4), (6, 3), (6, 4),
(7, 5), (7, 6), (8, 5), (8, 6), (9, 5), (9, 6),
(10, 7), (10, 8), (11, 9), (12, 10), (12, 11),
(13, 7), (13, 8), (14, 9), (15, 12), (15, 13),
(16, 14), (16, 15), (16, 16), (17, 14), (17, 15), (17, 16), (18, 14), (18, 15), (18, 16),
(19, 8), (19, 17), (19, 18), (20, 8), (20, 17), (20, 18),
(21, 14), (21, 13), (22, 14), (22, 13),
(23, 19), (23, 9), (23, 20), (24, 19), (24, 9), (24, 20),
(25, 21), (25, 22), (26, 21), (26, 22),
(27, 23), (27, 24), (28, 23), (28, 24),
(29, 27), (29, 25), (29, 18), (30, 27), (30, 25), (30, 18), (31, 27), (31, 25), (31, 26),
(32, 27), (32, 25), (32, 18), (33, 27), (33, 25), (33, 18), (34, 27), (34, 25), (34, 26),
(35, 28), (35, 29), (35, 30), (36, 28), (36, 29), (36, 31),
(37, 32), (37, 33), (38, 32), (38, 33),
(39, 28), (39, 34), (39, 30), (40, 28), (40, 34), (40, 35),
(41, 36), (41, 37), (42, 36), (42, 37),
(43, 2), (43, 8), (44, 2), (44, 38), (45, 2), (45, 39),
(46, 39), (46, 40), (46, 41), (47, 39), (47, 40), (47, 41),
(48, 10), (48, 11), (48, 8), (49, 7), (49, 11), (49, 42),
(50, 23), (50, 43), (50, 44), (51, 23), (51, 43), (51, 44),
(52, 45), (52, 46), (52, 20), (53, 47), (53, 46), (53, 20),
(54, 41), (54, 48), (54, 49), (55, 41), (55, 48), (55, 49),
(56, 50), (56, 51), (56, 52), (57, 50), (57, 51), (57, 52),
(58, 19), (58, 32), (58, 53), (59, 19), (59, 32), (59, 53),
(60, 54), (60, 41), (60, 49), (61, 54), (61, 41), (61, 49), (62, 54), (62, 41), (62, 49),
(63, 55), (63, 36), (63, 29), (64, 55), (64, 36), (64, 29), (65, 55), (65, 36), (65, 29),
(66, 17), (66, 56), (66, 57), (67, 17), (67, 56), (67, 57), (68, 17), (68, 56), (68, 57),
(69, 2), (69, 58), (70, 2), (70, 58), (71, 2), (71, 58),
(72, 59), (72, 60), (72, 6), (73, 59), (73, 60), (73, 6),
(74, 61), (74, 62), (74, 23), (75, 61), (75, 62), (75, 23), (76, 61), (76, 62), (76, 23),
(77, 8), (77, 32), (77, 63), (78, 8), (78, 32), (78, 63),
(79, 64), (79, 65), (79, 66), (80, 64), (80, 65), (80, 66),
(81, 67), (81, 62), (81, 68), (82, 67), (82, 62), (82, 68),
(83, 14), (83, 36), (83, 52),
(84, 8), (84, 69), (84, 15), (85, 8), (85, 69), (85, 15),
(86, 70), (86, 71), (86, 72), (87, 70), (87, 71), (87, 72),
(88, 38), (88, 73), (88, 74), (89, 38), (89, 73), (89, 74),
(90, 75), (90, 76), (90, 77), (91, 75), (91, 76), (91, 77),
(92, 78), (93, 78), (94, 79),
(95, 61), (95, 62), (95, 80),
(96, 81), (96, 82), (96, 36), (97, 81), (97, 82), (97, 36),
(98, 83), (98, 75), (98, 26), (99, 83), (99, 75), (99, 26),
(100, 84), (100, 21), (100, 85), (101, 84), (101, 21), (101, 85);