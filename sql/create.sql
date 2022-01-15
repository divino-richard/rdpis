# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases 12.4.2                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          rdpis.dez                                       #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2021-12-09 14:30                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Add tables                                                             #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "personnel"                                                  #
# ---------------------------------------------------------------------- #



CREATE TABLE `personnel` (
    `person_id` VARCHAR(40) NOT NULL,
    `image_name` VARCHAR(40) NOT NULL,
    `firstname` VARCHAR(40) NOT NULL,
    `middlename` VARCHAR(40) NOT NULL,
    `lastname` VARCHAR(40) NOT NULL,
    `extension` VARCHAR(5) NOT NULL,
    `gender` VARCHAR(10) NOT NULL,
    `civil_status` VARCHAR(15) NOT NULL,
    `favorite_color` VARCHAR(10) NOT NULL,
    `height` INTEGER(5) NOT NULL,
    `weight` INTEGER(5) NOT NULL,
    `date_of_birth` VARCHAR(10) NOT NULL,
    `age` INTEGER(5) NOT NULL,
    `city_mun_pob` VARCHAR(40) NOT NULL,
    `province_pob` VARCHAR(40) NOT NULL,
    `city_mun_address` VARCHAR(40) NOT NULL,
    `province_address` VARCHAR(40) NOT NULL,
    `phone_number` BIGINT(20) NOT NULL,
    `email` VARCHAR(40) NOT NULL,
    `citizenship` VARCHAR(40) NOT NULL,
    `religion` VARCHAR(40) NOT NULL,
    `language_spoken` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_personnel` PRIMARY KEY (`person_id`)
);



# ---------------------------------------------------------------------- #
# Add table "parents"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE `parents` (
    `person_id` VARCHAR(40) NOT NULL,
    `father_fname` VARCHAR(40) NOT NULL,
    `father_mname` VARCHAR(40) NOT NULL,
    `father_lname` VARCHAR(40) NOT NULL,
    `mother_fname` VARCHAR(40) NOT NULL,
    `mother_mname` VARCHAR(40) NOT NULL,
    `mother_lname` VARCHAR(40) NOT NULL,
    `parent_city_mun_address` VARCHAR(40) NOT NULL,
    `parent_province_address` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_parents` PRIMARY KEY (`person_id`)
);

# ---------------------------------------------------------------------- #
# Add table "educ_record"                                                #
# ---------------------------------------------------------------------- #



CREATE TABLE `educ_record` (
    `person_id` VARCHAR(40) NOT NULL,
    `elem_school_name` VARCHAR(40) NOT NULL,
    `elem_grad_sy` VARCHAR(20) NOT NULL,
    `high_school_name` VARCHAR(40) NOT NULL,
    `high_grad_sy` VARCHAR(20) NOT NULL,
    `coll_school_name` VARCHAR(40) NOT NULL,
    `coll_grad_sy` VARCHAR(20) NOT NULL,
    CONSTRAINT `PK_educ_record` PRIMARY KEY (`person_id`)
);



# ---------------------------------------------------------------------- #
# Add table "w_experience"                                               #
# ---------------------------------------------------------------------- #



CREATE TABLE `w_experience` (
    `person_id` VARCHAR(40) NOT NULL,
    `company_name` VARCHAR(40) NOT NULL,
    `position` VARCHAR(40) NOT NULL,
    `years_experience` INTEGER(10) NOT NULL,
    CONSTRAINT `PK_w_experience` PRIMARY KEY (`person_id`)
);



# ---------------------------------------------------------------------- #
# Add table "spouse"                                                     #
# ---------------------------------------------------------------------- #

CREATE TABLE `spouse` (
    `person_id` VARCHAR(40) NOT NULL,
    `spouse_fname` VARCHAR(40) NOT NULL,
    `spouse_mname` VARCHAR(40) NOT NULL,
    `spouse_lname` VARCHAR(40) NOT NULL,
    CONSTRAINT `PK_spouse` PRIMARY KEY (`person_id`)
);

# ---------------------------------------------------------------------- #
# Add foreign key constraints                                            #
# ---------------------------------------------------------------------- #

ALTER TABLE `parents` ADD CONSTRAINT `personnel_parents` 
    FOREIGN KEY (`person_id`) REFERENCES `personnel` (`person_id`);

ALTER TABLE `educ_record` ADD CONSTRAINT `personnel_educ_record` 
    FOREIGN KEY (`person_id`) REFERENCES `personnel` (`person_id`);

ALTER TABLE `w_experience` ADD CONSTRAINT `personnel_w_experience` 
    FOREIGN KEY (`person_id`) REFERENCES `personnel` (`person_id`);

ALTER TABLE `spouse` ADD CONSTRAINT `personnel_spouse` 
    FOREIGN KEY (`person_id`) REFERENCES `personnel` (`person_id`);
