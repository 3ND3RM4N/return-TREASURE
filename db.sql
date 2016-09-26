#
#    |----------------------------------------------------------------------------------------------------------|
#    |                                                                                                          |
#    |        This is database for developement of project:::::::                                               |        
#    |                                                                                                          |
#    |        Import this to your mysql server and you ll have                                                  |                      
#    |                                                                                                          |
#    |        fake teams with other information                                                                 |           
#    |                                                                                                          |
#    |                                                                                                          |
#    |                                                                                                          |
#    |                                             developed to make developement easier                        |            
#    |                                                                                                          |
#    |                                                                                                          |
#    |__________________________________________________________________________________________________________|







drop DATABASE if EXISTS `return_treasure`;

#creating db

CREATE DATABASE IF NOT EXISTS `return_treasure`;

#creating teams table

CREATE TABLE IF NOT EXISTS `return_treasure`.`div1teams` ( `id` INT(150) UNSIGNED NOT NULL AUTO_INCREMENT , `team_name` VARCHAR(40) NOT NULL , `mem1_name` VARCHAR(50) NOT NULL , `mem2_name` VARCHAR(50) NOT NULL , `mem3_name` VARCHAR(50) NOT NULL , `mem1_adm` VARCHAR(30) NOT NULL , `mem2_adm` VARCHAR(30) NOT NULL , `mem3_adm` VARCHAR(30) NOT NULL , `password` VARCHAR(80) NOT NULL , `phon_no` INT(20) NOT NULL , `division` ENUM('1','2') NOT NULL , `cookie` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `return_treasure`.`div2teams` ( `id` INT(150) UNSIGNED NOT NULL AUTO_INCREMENT , `team_name` VARCHAR(40) NOT NULL , `mem1_name` VARCHAR(50) NOT NULL , `mem2_name` VARCHAR(50) NOT NULL , `mem3_name` VARCHAR(50) NOT NULL , `mem1_adm` VARCHAR(30) NOT NULL , `mem2_adm` VARCHAR(30) NOT NULL , `mem3_adm` VARCHAR(30) NOT NULL , `password` VARCHAR(80) NOT NULL , `phon_no` INT(20) NOT NULL , `division` ENUM('1','2') NOT NULL , `cookie` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

#creating points table

CREATE TABLE `return_treasure`.`div1points` ( `id` INT(150) UNSIGNED NOT NULL AUTO_INCREMENT , `team_name` VARCHAR(40) NOT NULL , `team_points` INT(20) NOT NULL , `treasure` INT(10) NOT NULL , `pass_id` INT(10) NOT NULL , `achieved_t` INT(10) NOT NULL, `cookie` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `return_treasure`.`div2points` ( `id` INT(150) UNSIGNED NOT NULL AUTO_INCREMENT , `team_name` VARCHAR(40) NOT NULL , `team_points` INT(20) NOT NULL , `treasure` INT(10) NOT NULL , `pass_id` INT(10) NOT NULL , `achieved_t` INT(10) NOT NULL, `cookie` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

#creating questions and locations tables

CREATE TABLE `return_treasure`.`questions` ( `id` INT(100) UNSIGNED NOT NULL AUTO_INCREMENT , `title` VARCHAR(10) NOT NULL , `description` VARCHAR(100) NOT NULL , `marks` INT(20) NOT NULL , `answers` VARCHAR(60) NOT NULL , `level_id_3` INT(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `return_treasure`.`locations` ( `id` INT(100) UNSIGNED NOT NULL AUTO_INCREMENT , `title` VARCHAR(10) NOT NULL , `description` VARCHAR(100) NOT NULL , `marks` INT(20) NOT NULL , `answers` VARCHAR(60) NOT NULL , `level_id_3` INT(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

#creating bonus_loc table

CREATE TABLE `return_treasure`.`bonus_loc` ( `id` INT(100) UNSIGNED NOT NULL AUTO_INCREMENT , `title` VARCHAR(10) NOT NULL , `description` VARCHAR(100) NOT NULL , `marks` INT(20) NOT NULL , `answers` VARCHAR(60) NOT NULL , `level_id_2` INT(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

#creating trackking  table

CREATE TABLE IF NOT EXISTS `return_treasure`.`curr_pos` ( `team_name` VARCHAR(40) NOT NULL, `round1` INT(10) NOT NULL, `round2` INT(10) NOT NULL, `round3` INT(10) NOT NULL )ENGINE=InnoDB;

#done done done


/*inserting some raw values in teams tables*/

INSERT INTO return_treasure.div1teams (id,team_name,mem1_name,mem2_name,mem3_name,mem1_adm,mem2_adm,mem3_adm,password,phon_no,division,cookie)
VALUES (1,'hackstreet boys','aarush','sangamo','harman',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_1'),
(12,'hackstreet boys','aarush','sangamo','harman',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_12'),
(2,'team_coder','aarush','sangamo','harman',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_2'),
(3,'codeforce1','abhinav','mukesh','harman',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_3'),
(4,'codeforce2','peter parker','parker','peter',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_4'),
(5,'codeforce3','steve','steve2','steve3',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_5'),
(6,'codeforce4','bob','will','george',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_6'),
(7,'hackers','pratyush','rituraj','shobhit',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_7'),
(8,'hunters','pranay_bhai','pranay','pannu',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_8'),
(9,'team_mario','bikram','naruto','rochak',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_9'),
(10,'bonaza','ron','harrry','emma',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_10'),
(11,'perverts','jenifer','mia','lokesh',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div1_11');

INSERT INTO return_treasure.div2teams (id,team_name,mem1_name,mem2_name,mem3_name,mem1_adm,mem2_adm,mem3_adm,password,phon_no,division,cookie)
VALUES (1,'hackstreet boys','aarush','sangamo','harman',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_1'),
(12,'hackstreet boys','aarush','sangamo','harman',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_12'),
(2,'team_coder','aarush','sangamo','harman',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_2'),
(3,'codeforce1','abhinav','mukesh','harman',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_3'),
(4,'codeforce2','peter parker','parker','peter',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_4'),
(5,'codeforce3','steve','steve2','steve3',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_5'),
(6,'codeforce4','bob','will','george',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_6'),
(7,'hackers','pratyush','rituraj','shobhit',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_7'),
(8,'hunters','pranay_bhai','pranay','pannu',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_8'),
(9,'team_mario','bikram','naruto','rochak',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_9'),
(10,'bonaza','ron','harrry','emma',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_10'),
(11,'perverts','jenifer','mia','lokesh',1424,1427,1300,'098f6bcd4621d373cade4e832627b4f6',123456789,1,'div2_11');

INSERT INTO return_treasure.div1points
(id,team_name,team_points,treasure,pass_id,achieved_t,cookie)
VALUES (1,'hackstreet boys',0,6,0,0,'div1_1'),
(12,'hackstreet boys',0,6,0,0,'div1_12'),
(2,'team_coder',0,6,0,0,'div1_2'),
(3,'codeforce1',0,6,0,0,'div1_3'),
(4,'codeforce2',0,6,0,0,'div1_4'),
(5,'codeforce3',0,6,0,0,'div1_5'),
(6,'codeforce4',0,6,0,0,'div1_6'),
(7,'hackers',0,6,0,0,'div1_7'),
(8,'hunters',0,6,0,0,'div1_8'),
(9,'team_mario',0,6,0,0,'div1_9'),
(10,'bonaza',0,6,0,0,'div1_10'),
(11,'perverts',0,6,0,0,'div1_11');

INSERT INTO return_treasure.div2points
(id,team_name,team_points,treasure,pass_id,achieved_t,cookie)
VALUES (1,'hackstreet boys',0,6,0,0,'div2_1'),
(12,'hackstreet boys',0,6,0,0,'div2_12'),
(2,'team_coder',0,6,0,0,'div2_2'),
(3,'codeforce1',0,6,0,0,'div2_3'),
(4,'codeforce2',0,6,0,0,'div2_4'),
(5,'codeforce3',0,6,0,0,'div2_5'),
(6,'codeforce4',0,6,0,0,'div2_6'),
(7,'hackers',0,6,0,0,'div2_7'),
(8,'hunters',0,6,0,0,'div2_8'),
(9,'team_mario',0,6,0,0,'div2_9'),
(10,'bonaza',0,6,0,0,'div2_10'),
(11,'perverts',0,6,0,0,'div2_11');
# Hurrey done up wit inserting false names
# 
