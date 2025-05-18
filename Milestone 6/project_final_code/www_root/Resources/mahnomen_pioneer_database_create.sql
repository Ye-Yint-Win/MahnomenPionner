
create table event_type(
id int not null auto_increment,
event_type VARCHAR (200) not null
);

create table video (
id int not null auto_increment,
link VARCHAR (200) not null,
title VARCHAR (100) not null,
description VARCHAR (2000) not null,
event_type int,
date_entered DATETIME NOT Null,
Primary Key (id)
);

INSERT INTO `mahnomen_pioneer`.`event_type` (`event_type`) VALUES ('Sports');
INSERT INTO `mahnomen_pioneer`.`event_type` (`event_type`) VALUES ('Local News');
INSERT INTO `mahnomen_pioneer`.`event_type` (`event_type`) VALUES ('Events');

INSERT INTO `video`(`link`, `title`, `description`, `event_type`)
VALUES ('https://youtube.com/embed/vgTK2uo6DVk','Naytahwaush Pow Wow','The Naytahwaush Harvest Festival was held on September 9, 2023. The Pow Wow held its Grand Entry in the afternoon. The emcee gave an explanation of the different types of dancers as they entered the circle. The dancers wore regalia that was vibrant with colors.','3'),
('https://www.youtube.com/embed/dxi2NbQfnso','Thunderbirds Two Point Conversion','During the last regular season game of the year, two point conversion play in the second half of the game raises the score for the Mahnomen-Waubun Thunderbirds. A pass from Blake McMullen, #12, to Tanner Stech, #4, who caught it in the endzone for the two point conversion.','1'),
('https://www.youtube.com/embed/VEicgtOB8N4','Cheer 1 Thunderbirds Cheerleaders','Thunderbirds Fall Cheer Team with “Go, Fight, Win” at the Waubun Home Game played in late October vs. the Menahga Braves. The Thunderbirds won 27-0 and ended their regular season 8-0.','1'),
('https://www.youtube.com/embed/94fAvAiVyH4','Cheer 2 Thunderbirds Cheerleaders','Thunderbirds Cheer Team doing a second cheer at the Waubun Home Game played in late October vs. Menahga Braves.','1'),
('https://www.youtube.com/embed/IvPlb1yEaGE','Naytahwaush Parade 1','Middle part of the parade for the Naytahwaush Harvest Festival held on September 9, 2023.','3'),
('https://www.youtube.com/embed/aNXy904MNt4','Naytahwaush Parade 2','End of the parade for the Naytahwaush Harvest Festival held on September 9, 2023.','3'),
('https://www.youtube.com/embed/HTxrxJ3-xIU','MHS Band performs','The Mahnomen High School Band plays at the Fall Concert held on Monday, October 16, 2023, in the high school gymnasium.','2'),
('https://www.youtube.com/embed/6txaqs9Jaw0','MHS Choir performs','The Mahnomen High School Choir sings at the Fall Concert held on Monday, October 16, 2023, in the high school gymnasium.','2');

 drop table video