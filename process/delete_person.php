<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/rdpis/process/dbh.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/rdpis/process/getters.php";

# DELETING PERSON DATA
if(isset($_GET["person_id"])){
    $person_to_delete = $_GET["person_id"];

    if($person_data = get_person_data()){ # FROM THE GETTER FILE
        # GET PROFILE IMAGE NAME AS OUR REFERENCE 
        $image_name = $person_data["image_name"];

        $sql1 = "DELETE FROM spouse WHERE person_id = '$person_to_delete' ";
        
        $sql2 = "DELETE FROM parents WHERE person_id = '$person_to_delete' ";
        
        $sql3 = "DELETE FROM educ_record WHERE person_id = '$person_to_delete' ";
        
        $sql4 = "DELETE FROM w_experience WHERE person_id = '$person_to_delete' ";
        
        $sql5 = "DELETE FROM personnel WHERE person_id = '$person_to_delete' ";

        # IF THE DATA IS SUCCESSFULLY DELETED FROM THE TABLES THEN PROCED DELETING THE PROFILE IMAGE PATH 
        if( mysqli_query(db_connect(), $sql1) && mysqli_query(db_connect(), $sql2) &&
            mysqli_query(db_connect(), $sql3) && mysqli_query(db_connect(), $sql4) &&
            mysqli_query(db_connect(), $sql5) ) {
            
            # DELETE THE PATH OF THE PERSON'S PROFILE IMAGE
            if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/rdpis/uploads/profileImages/". $image_name)){
                unlink($_SERVER['DOCUMENT_ROOT'] . "/rdpis/uploads/profileImages/". $image_name);
                header("Location: ../personnel.php?delete_msg=Person was deleted");
            }
        } else {
            echo "Error deleting person: " . mysqli_error($conn);
        }
    }
}
