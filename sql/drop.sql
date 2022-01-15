# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases 12.4.2                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          rdpis.dez                                       #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database drop script                            #
# Created on:            2021-12-09 14:30                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Drop foreign key constraints                                           #
# ---------------------------------------------------------------------- #

ALTER TABLE `parents` DROP FOREIGN KEY `personnel_parents`;

ALTER TABLE `educ_record` DROP FOREIGN KEY `personnel_educ_record`;

ALTER TABLE `w_experience` DROP FOREIGN KEY `personnel_w_experience`;

ALTER TABLE `spouse` DROP FOREIGN KEY `personnel_spouse`;

# ---------------------------------------------------------------------- #
# Drop table "spouse"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `spouse` DROP PRIMARY KEY;

DROP TABLE `spouse`;

# ---------------------------------------------------------------------- #
# Drop table "w_experience"                                              #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `w_experience` DROP PRIMARY KEY;

DROP TABLE `w_experience`;

# ---------------------------------------------------------------------- #
# Drop table "educ_record"                                               #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `educ_record` DROP PRIMARY KEY;

DROP TABLE `educ_record`;

# ---------------------------------------------------------------------- #
# Drop table "parents"                                                   #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `parents` DROP PRIMARY KEY;

DROP TABLE `parents`;

# ---------------------------------------------------------------------- #
# Drop table "personnel"                                                 #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `personnel` DROP PRIMARY KEY;

DROP TABLE `personnel`;
