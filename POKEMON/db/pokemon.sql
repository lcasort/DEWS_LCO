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
ON DELETE CASCADE
ON UPDATE CASCADE;
ALTER TABLE `pokemons_type`
ADD CONSTRAINT `pokemons_type_ibfk_2`
FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`)
ON DELETE CASCADE
ON UPDATE CASCADE;
ALTER TABLE `pokemons_abilities`
ADD CONSTRAINT `pokemons_abilities_ibfk_1`
FOREIGN KEY (`no`) REFERENCES `pokemons` (`no`)
ON DELETE CASCADE
ON UPDATE CASCADE;
ALTER TABLE `pokemons_abilities`
ADD CONSTRAINT `pokemons_abilities_ibfk_2`
FOREIGN KEY (`id_ability`) REFERENCES `abilities` (`id_ability`)
ON DELETE CASCADE
ON UPDATE CASCADE;

-- Insertamos datos de ejemplo en la tienda
USE `pokemon`;

INSERT INTO `pokemons` (`no`, `pic`, `name`, `hp`, `att`, `def`, `s_att`, `s_def`, `spd` ) VALUES
(001, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png', 'Bulbasaur', '45', '49', '49', '65', '65', '45'),
(002, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/2.png', 'Ivysaur', '60', '62', '63', '80', '80', '60'),
(003, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/3.png', 'Venusaur', '80', '82', '83', '100', '100', '80'),
(004, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png', 'Charmander', '39', '52', '43', '60', '50', '65'),
(005, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/5.png', 'Charmeleon', '58', '64', '58', '80', '65', '80'),
(006, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/6.png', 'Charizard', '78', '84', '78', '109', '85', '100'),
(007, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png', 'Squirtle', '44', '48', '65', '50', '64', '43'),
(008, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/8.png', 'Wartortle', '59', '63', '80', '65', '80', '58'),
(009, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/9.png', 'Blastoise', '79', '83', '100', '85', '105', '78'),
(010, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/10.png', 'Caterpie', '45', '30', '35', '20', '20', '45'),
(011, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/11.png', 'Metapod', '50', '20', '55', '25', '25', '30'),
(012, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/12.png', 'Butterfree', '60', '45', '50', '90', '80', '70'),
(013, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/13.png', 'Weedle', '40', '35', '30', '20', '20', '50'),
(014, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/14.png', 'Kakuna', '45', '25', '50', '25', '25', '35'),
(015, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/15.png', 'Beedrill', '65', '90', '40', '45', '80', '75'),
(016, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/16.png', 'Pidgey', '40', '45', '40', '35', '35', '56'),
(017, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/17.png', 'Pidgeotto', '63', '60', '55', '50', '50', '71'),
(018, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/18.png', 'Pidgeot', '83', '80', '75', '70', '70', '101'),
(019, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/19.png', 'Rattata', '30', '56', '35', '25', '35', '72'),
(020, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/20.png', 'Raticate', '55', '81', '60', '50', '70', '97'),
(021, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/21.png', 'Spearow', '40', '60', '30', '31', '31', '70'),
(022, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/22.png', 'Fearow', '65', '90', '65', '61', '61', '100'),
(023, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/23.png', 'Ekans', '35', '60', '44', '40', '54', '55'),
(024, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/24.png', 'Arbok', '60', '95', '69', '65', '79', '80'),
(025, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png', 'Pikachu', '35', '55', '40', '50', '50', '90'),
(026, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/26.png', 'Raichu', '60', '90', '55', '90', '80', '110'),
(027, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/27.png', 'Sandshrew', '50', '75', '85', '20', '30', '40'),
(028, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/28.png', 'Sandslash', '75', '100', '110', '45', '55', '65'),
(029, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/29.png', 'Nidoran♀', '55', '47', '52', '40', '40', '41'),
(030, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/30.png', 'Nidorina', '70', '62', '67', '55', '55', '56'),
(031, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/31.png', 'Nidoqueen', '90', '92', '87', '75', '85', '76'),
(032, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/32.png', 'Nidoran♂', '46', '57', '40', '40', '40', '50'),
(033, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/33.png', 'Nidorino', '61', '72', '57', '55', '55', '65'),
(034, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/34.png', 'Nidoking', '81', '102', '77', '85', '75', '85'),
(035, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/35.png', 'Clefairy', '70', '45', '48', '60', '65', '35'),
(036, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/36.png', 'Clefable', '95', '70', '73', '95', '90', '60'),
(037, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/37.png', 'Vulpix', '38', '41', '40', '50', '65', '65'),
(038, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/38.png', 'Ninetales', '73', '76', '75', '81', '100', '100'),
(039, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/39.png', 'Jigglypuff', '115', '45', '20', '45', '25', '20'),
(040, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/40.png', 'Wigglytuff', '140', '70', '45', '85', '50', '45'),
(041, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/41.png', 'Zubat', '40', '45', '35', '30', '40', '55'),
(042, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/42.png', 'Golbat', '75', '80', '70', '65', '75', '90'),
(043, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/43.png', 'Oddish', '45', '50', '55', '75', '65', '30'),
(044, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/44.png', 'Gloom', '60', '65', '70', '85', '75', '40'),
(045, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/45.png', 'Vileplume', '75', '80', '85', '110', '90', '50'),
(046, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/46.png', 'Paras', '35', '70', '55', '45', '55', '25'),
(047, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/47.png', 'Parasect', '60', '95', '80', '60', '80', '30'),
(048, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/48.png', 'Venonat', '60', '55', '50', '40', '55', '45'),
(049, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/49.png', 'Venomoth', '70', '65', '60', '90', '75', '90'),
(050, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/50.png', 'Diglett', '10', '55', '25', '35', '45', '95'),
(051, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/51.png', 'Dugtrio', '35', '100', '50', '50', '70', '120'),
(052, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/52.png', 'Meowth', '40', '45', '35', '40', '40', '90'),
(053, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/53.png', 'Persian', '65', '70', '60', '65', '65', '115'),
(054, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/54.png', 'Psyduck', '50', '52', '48', '65', '50', '55'),
(055, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/55.png', 'Golduck', '80', '82', '78', '95', '80', '85'),
(056, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/56.png', 'Mankey', '40', '80', '35', '35', '45', '70'),
(057, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/57.png', 'Primeape', '65', '105', '60', '60', '70', '95'),
(058, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/58.png', 'Growlithe', '55', '70', '45', '70', '50', '60'),
(059, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/59.png', 'Arcanine', '90', '110', '80', '100', '80', '95'),
(060, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/60.png', 'Poliwag', '40', '50', '40', '40', '40', '90'),
(061, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/61.png', 'Poliwhirl', '65', '65', '65', '50', '50', '90'),
(062, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/62.png', 'Poliwrath', '90', '95', '95', '70', '90', '70'),
(063, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/63.png', 'Abra', '25', '20', '15', '105', '55', '90'),
(064, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/64.png', 'Kadabra', '40', '35', '30', '120', '70', '105'),
(065, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/65.png', 'Alakazam', '55', '50', '45', '135', '95', '120'),
(066, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/66.png', 'Machop', '70', '80', '50', '35', '35', '35'),
(067, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/67.png', 'Machoke', '80', '100', '70', '50', '60', '45'),
(068, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/68.png', 'Machamp', '90', '130', '80', '65', '85', '55'),
(069, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/69.png', 'Bellsprout', '50', '75', '35', '70', '30', '40'),
(070, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/70.png', 'Weepinbell', '65', '90', '50', '85', '45', '55'),
(071, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/71.png', 'Victreebel', '80', '105', '65', '100', '70', '70'),
(072, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/72.png', 'Tentacool', '40', '40', '35', '50', '100', '70'),
(073, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/73.png', 'Tentacruel', '80', '70', '65', '80', '120', '100'),
(074, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/74.png', 'Geodude', '40', '80', '100', '30', '30', '20'),
(075, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/75.png', 'Graveler', '55', '95', '115', '45', '45', '35'),
(076, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/76.png', 'Golem', '80', '120', '130', '55', '65', '45'),
(077, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/77.png', 'Ponyta', '50', '85', '55', '65', '65', '90'),
(078, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/78.png', 'Rapidash', '65', '100', '70', '80', '80', '105'),
(079, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/79.png', 'Slowpoke', '90', '65', '65', '40', '40', '15'),
(080, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/80.png', 'Slowbro', '95', '75', '110', '100', '80', '30'),
(081, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/81.png', 'Magnemite', '25', '35', '70', '95', '55', '45'),
(082, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/82.png', 'Magneton', '50', '60', '95', '120', '70', '70'),
(083, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/83.png', "Farfetch'd", '52', '90', '55', '58', '62', '60'),
(084, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/84.png', 'Doduo', '35', '85', '45', '35', '35', '75'),
(085, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/85.png', 'Dodrio', '60', '110', '70', '60', '60', '110'),
(086, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/86.png', 'Seel', '65', '45', '55', '45', '70', '45'),
(087, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/87.png', 'Dewgong', '90', '70', '80', '70', '95', '70'),
(088, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/88.png', 'Grimer', '80', '80', '50', '40', '50', '25'),
(089, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/89.png', 'Muk', '105', '105', '75', '65', '100', '50'),
(090, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/90.png', 'Shellder', '30', '65', '100', '45', '25', '40'),
(091, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/91.png', 'Cloyster', '50', '95', '180', '85', '45', '70'),
(092, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/92.png', 'Gastly', '30', '35', '30', '100', '35', '80'),
(093, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/93.png', 'Haunter', '45', '50', '45', '115', '55', '95'),
(094, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/94.png', 'Gengar', '60', '65', '60', '130', '75', '110'),
(095, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/95.png', 'Onix', '35', '45', '160', '30', '45', '70'),
(096, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/96.png', 'Drowzee', '60', '48', '45', '43', '90', '42'),
(097, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/97.png', 'Hypno', '85', '73', '70', '73', '115', '67'),
(098, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/98.png', 'Krabby', '30', '105', '90', '25', '25', '50'),
(099, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/99.png', 'Kingler', '55', '130', '115', '50', '50', '75'),
(100, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/100.png', 'Voltorb', '40', '30', '50', '55', '55', '100'),
(101, 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/101.png', 'Electrode', '60', '50', '70', '80', '80', '150');

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
(12, 'Psychc'),
(13, 'Rock'),
(14, 'Steel'),
(15, 'Ice'),
(16, 'Ghost'),
(17, 'Dragon');

INSERT INTO `pokemons_type` (`no`, `id_type`) VALUES 
(001, 1), (001, 2), (002, 1), (002, 2), (003, 1), (003, 2),
(004, 3), (005, 3), (006, 3), (006, 4),
(007, 5), (008, 5), (009, 5),
(010, 6), (011, 6), (012, 6), (012, 4),
(013, 6), (013, 2), (014, 6), (014, 2), (015, 6), (015, 2),
(016, 7), (016, 4), (017, 7), (017, 4), (018, 7), (018, 4),
(019, 7), (020, 7),
(021, 4), (021, 7), (022, 4), (022, 7),
(023, 2), (024, 2),
(025, 8), (026, 8),
(027, 9), (028, 9),
(029, 2), (030, 2), (031, 2), (031, 9),
(032, 2), (033, 2), (034, 2), (034, 9),
(035, 10), (036, 10),
(037, 3), (038, 3),
(039, 7), (039, 10), (040, 7), (040, 10),
(041, 2), (041, 4), (042, 2), (042, 4),
(043, 1), (043, 2), (044, 1), (044, 2), (045, 1), (045, 2),
(046, 6), (046, 1), (047, 6), (047, 1),
(048, 6), (048, 2), (049, 6), (049, 2),
(050, 9), (051, 9),
(052, 7), (053, 7),
(054, 5), (055, 5),
(056, 11), (057, 11),
(058, 3), (059, 3),
(060, 5), (061, 5), (062, 5), (062, 11),
(063, 12), (064, 12), (065, 12),
(066, 11), (067, 11), (068, 11),
(069, 1), (069, 2), (070, 1), (070, 2), (071, 1), (071, 2),
(072, 5), (072, 2), (073, 5), (073, 2),
(074, 13), (074, 9), (075, 13), (075, 9), (076, 13), (076, 9),
(077, 3), (078, 3),
(079, 5), (079, 12), (080, 5), (080, 12),
(081, 8), (081, 14), (082, 8), (082, 14),
(083, 7), (083, 4),
(084, 7), (084, 4), (085, 7), (085, 4),
(086, 5), (087, 5), (087, 15),
(088, 2), (089, 2),
(090, 5), (091, 5), (091, 15),
(092, 16), (092, 2), (093, 16), (093, 2), (094, 16), (094, 2),
(095, 13), (095, 9),
(096, 12), (097, 12),
(098, 5), (099, 5),
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

INSERT INTO `pokemons_abilities` (`no`, `id_ability`) VALUES
(001, 1), (001, 2), (002, 1), (002, 2), (003, 1), (003, 2),
(004, 3), (004, 4), (005, 3), (005, 4), (006, 3), (006, 4),
(007, 5), (007, 6), (008, 5), (008, 6), (009, 5), (009, 6),
(010, 7), (010, 8), (011, 9), (012, 10), (012, 11),
(013, 7), (013, 8), (014, 9), (015, 12), (015, 13),
(016, 14), (016, 15), (016, 16), (017, 14), (017, 15), (017, 16), (018, 14), (018, 15), (018, 16),
(019, 8), (019, 17), (019, 18), (020, 8), (020, 17), (020, 18),
(021, 14), (021, 13), (022, 14), (022, 13),
(023, 19), (023, 9), (023, 20), (024, 19), (024, 9), (024, 20),
(025, 21), (025, 22), (026, 21), (026, 22),
(027, 23), (027, 24), (028, 23), (028, 24),
(029, 27), (029, 25), (029, 18), (030, 27), (030, 25), (030, 18), (031, 27), (031, 25), (031, 26),
(032, 27), (032, 25), (032, 18), (033, 27), (033, 25), (033, 18), (034, 27), (034, 25), (034, 26),
(035, 28), (035, 29), (035, 30), (036, 28), (036, 29), (036, 31),
(037, 32), (037, 33), (038, 32), (038, 33),
(039, 28), (039, 34), (039, 30), (040, 28), (040, 34), (040, 35),
(041, 36), (041, 37), (042, 36), (042, 37),
(043, 2), (043, 8), (044, 2), (044, 38), (045, 2), (045, 39),
(046, 39), (046, 40), (046, 41), (047, 39), (047, 40), (047, 41),
(048, 10), (048, 11), (048, 8), (049, 7), (049, 11), (049, 42),
(050, 23), (050, 43), (050, 44), (051, 23), (051, 43), (051, 44),
(052, 45), (052, 46), (052, 20), (053, 47), (053, 46), (053, 20),
(054, 41), (054, 48), (054, 49), (055, 41), (055, 48), (055, 49),
(056, 50), (056, 51), (056, 52), (057, 50), (057, 51), (057, 52),
(058, 19), (058, 32), (058, 53), (059, 19), (059, 32), (059, 53),
(060, 54), (060, 41), (060, 49), (061, 54), (061, 41), (061, 49), (062, 54), (062, 41), (062, 49),
(063, 55), (063, 36), (063, 29), (064, 55), (064, 36), (064, 29), (065, 55), (065, 36), (065, 29),
(066, 17), (066, 56), (066, 57), (067, 17), (067, 56), (067, 57), (068, 17), (068, 56), (068, 57),
(069, 2), (069, 58), (070, 2), (070, 58), (071, 2), (071, 58),
(072, 59), (072, 60), (072, 6), (073, 59), (073, 60), (073, 6),
(074, 61), (074, 62), (074, 23), (075, 61), (075, 62), (075, 23), (076, 61), (076, 62), (076, 23),
(077, 8), (077, 32), (077, 63), (078, 8), (078, 32), (078, 63),
(079, 64), (079, 65), (079, 66), (080, 64), (080, 65), (080, 66),
(081, 67), (081, 62), (081, 68), (082, 67), (082, 62), (082, 68),
(083, 14), (083, 36), (083, 52),
(084, 8), (084, 69), (084, 15), (085, 8), (085, 69), (085, 15),
(086, 70), (086, 71), (086, 72), (087, 70), (087, 71), (087, 72),
(088, 38), (088, 73), (088, 74), (089, 38), (089, 73), (089, 74),
(090, 75), (090, 76), (090, 77), (091, 75), (091, 76), (091, 77),
(092, 78), (093, 78), (094, 79),
(095, 61), (095, 62), (095, 80),
(096, 81), (096, 82), (096, 36), (097, 81), (097, 82), (097, 36),
(098, 83), (098, 75), (098, 26), (099, 83), (099, 75), (099, 26),
(100, 84), (100, 21), (100, 85), (101, 84), (101, 21), (101, 85);