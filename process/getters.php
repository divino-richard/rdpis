<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/rdpis/process/dbh.php";

/**
 * GET ALL PERSONS FROM PERSONNEL TABLE
 * THIS METHOD RETURNS A MYSQLI RESULT (person_id, image_name, firstname and lastname) 
 */
function get_persons(){
    $sql = "SELECT person_id, image_name, firstname, lastname FROM personnel;";
    $result = mysqli_query(db_connect(), $sql);
    return $result;
}

/**
 * GET ALL PERSON'S DATA FROM OUR FIVE DEFFIRENT TABLES
 * THIS METHOD RETURNS ALL THE DATA OF A SPECIFIC PERSON
 */
function get_person_data(){
    # SAVE THE PERSON ID IN $person_id VARIABLE IF IT IS SET
    # OTHERWISE REDIRECT TO THE PERSONNEL PAGE THEN EXIT THE CODE
    if(isset($_GET["person_id"])){
        $person_id = $_GET["person_id"];
    }else{
        header("Location: ./personnel.php");
        exit(); 
    }

    $sql = "SELECT * FROM personnel, spouse, parents, educ_record, w_experience WHERE 
        spouse.person_id        = personnel.person_id &&
        parents.person_id       = personnel.person_id &&
        educ_record.person_id   = personnel.person_id &&
        w_experience.person_id  = personnel.person_id &&
        personnel.person_id     = '$person_id'
    ";
    $result = mysqli_query(db_connect(), $sql);
    if($person_data = mysqli_fetch_assoc($result)){
        return $person_data;
    }else{
        header("Location: ./personnel.php");
    }
}