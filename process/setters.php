<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/rdpis/process/dbh.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/rdpis/process/getters.php";

/**
 * ADD PERSON DATA TO THE FIVE TABLES NAMELY 
 * (personnel, parents, spouse, educ_record, w_experience)
 */
function add_person(){
    # CHECK IF FILE IS EMPTY
    # IF EMPTY THEN EXIT THE PROCESS
    if(empty($_FILES["profile_image"]["name"])){
        header("Location: ./person_form.php?file_error=Profile is required*");
        exit();
    }
    
    # UPLOAD PROFILE IMAGE
    # IF SUCCESSFULLY UPLOADED THEN PASS THE DATA TO THE MODEL WITH THE NEW IMAGE NAME
    if($image_name = uplod_profile_image()){
        # GENERATE A PERSON ID USING uniqid() PHP FUNCTION
        $generated_person_id = uniqid("", true);
        
        # CHEKING THE PERSON EXTENSION
        $extension = "";
        if(isset($_POST["extension"])) $extension = $_POST["extension"];

        # INSERT SQL FOR PERSONNEL TABLE
        $sql1 = "INSERT INTO personnel(
            person_id, 
            image_name,     firstname,      middlename,         lastname,
            extension,      gender,         civil_status,       favorite_color,
            height,         weight,         date_of_birth,      age,                        
            city_mun_pob,   province_pob,   city_mun_address,   province_address,           
            phone_number,   email,          citizenship,        religion,
            language_spoken
        )VALUES (
            '$generated_person_id',
            '$image_name',                '{$_POST["firstname"]}',    '{$_POST["middlename"]}',        '{$_POST["lastname"]}',
            '$extension',                 '{$_POST["gender"]}',       '{$_POST["civil_status"]}',      '{$_POST["favorite_color"]}',
            '{$_POST["height"]}',         '{$_POST["weight"]}',       '{$_POST["date_of_birth"]}',     '{$_POST["age"]}',
            '{$_POST["city_mun_pob"]}',   '{$_POST["province_pob"]}', '{$_POST["city_mun_address"]}',  '{$_POST["province_address"]}',
            '{$_POST["phone_number"]}',   '{$_POST["email"]}',        '{$_POST["citizenship"]}',       '{$_POST["religion"]}',
            '{$_POST["language_spoken"]}'
        )";

        # INSERT SQL FOR SPOUSE TABLE
        $sql2 = "INSERT INTO spouse(
            person_id, spouse_fname, spouse_mname, spouse_lname
        )VALUES (
            '$generated_person_id', '{$_POST["spouse_fname"]}', '{$_POST["spouse_mname"]}', '{$_POST["spouse_lname"]}'
        )";

        # INSERT SQL FOR PARENTS TABLE
        $sql3 = "INSERT INTO parents(
            person_id, 
            father_fname,   father_mname,   father_lname,               mother_fname,
            mother_mname,   mother_lname,   parent_city_mun_address,    parent_province_address
        )VALUES (
            '$generated_person_id',
            '{$_POST["father_fname"]}',   '{$_POST["father_mname"]}',     '{$_POST["father_lname"]}',               '{$_POST["mother_fname"]}',
            '{$_POST["mother_mname"]}',   '{$_POST["mother_lname"]}',     '{$_POST["parent_city_mun_address"]}',    '{$_POST["parent_province_address"]}'
        )";

        # INSERT SQL FOR EDUCATIONAL RECORD TABLE
        $sql4 = "INSERT INTO educ_record(
            person_id, 
            elem_grad_sy,   elem_school_name,   high_grad_sy,   high_school_name,
            coll_grad_sy,   coll_school_name
        )VALUES (
            '$generated_person_id',
            '{$_POST["elem_grad_sy"]}',   '{$_POST["elem_school_name"]}',     '{$_POST["high_grad_sy"]}',      '{$_POST["high_school_name"]}',
            '{$_POST["coll_grad_sy"]}',   '{$_POST["coll_school_name"]}'
        )";

        # INSERT SQL FOR WORK EXPERIENCE TABLE
        $sql5 = "INSERT INTO w_experience(
            person_id, company_name,   position,   years_experience
        )VALUES (
            '$generated_person_id', '{$_POST["company_name"]}',   '{$_POST["position"]}',   '{$_POST["years_experience"]}'
        )";

        # INSERT THE DATA TO THE FIVE TABLES AND CHECK IF ALL OF THE INSERTION ARE SUCCESSFULL
        # IF IT IS SUCCESSFULL THEN REDIRECT TO PERSONNEL PAGE
        if( $result = mysqli_query(db_connect(), $sql1) && mysqli_query(db_connect(), $sql2) &&
            mysqli_query(db_connect(), $sql3) && mysqli_query(db_connect(), $sql4) &&
            mysqli_query(db_connect(), $sql5) ){
            
            header("Location: ./personnel.php?add_person_msg={$_POST["firstname"]} {$_POST["lastname"]} is added successfully");
        }else{
            echo "Error: ".$sql1."<br>".$sql2."<br>".$sql3."<br>".$sql4."<br>".$sql5."<br>".mysqli_error(db_connect());
        }
    }
}

/**
 * UPDATE PERSONS DATA TO OUR FIVE TABLES
 * THE CHANGES WILL HAPPENS TO ALL TABLES EVEN THOUGH THE VALUES ARE THE SAME TO PREVIOUS
 */
function update_person(){
    # CHECK IF PERSON IS IN THE RECORD
    # IT IS PRESENTIN THE RECORD THEN SAVE THE DATA TO THE VARIABLE
    if($person_data = get_person_data()){
        $image_name = '';

        # CHECK IF FILE IS NOT EMPTY THEN UPLOAD THE IMAGE TO THE UPLOADS PATH
        # OTHERWISE SET THE $image_name VARIABLE TO THE PREVIOUS IMAGE NAME
        if(!empty($_FILES["profile_image"]["name"])){
            # GET THE PREVIOUS IMAGE NAME
            $prev_image_name = $person_data["image_name"];

            # UPLOAD THE PROFILE IMAGE
            if($new_image_name = uplod_profile_image()){
                # DELETE THE CURRENT PATH OF AN IMAGE IF IT EXIST
                if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/rdpis/uploads/profileImages/". $prev_image_name)){
                    unlink($_SERVER['DOCUMENT_ROOT'] . "/rdpis/uploads/profileImages/". $prev_image_name);
                }
                # SET THE VALUE OF IMAGE NAME TO OUR NEW IMAGE NAME
                $image_name = $new_image_name;
            }
        }else{
            # SET THE IMAGE NAME TO BE INSERTED TO THE TABLE AS PREVIOUS IMAGE
            # TO AVOID THE image_name BECOME EMPTY
            $image_name = $person_data["image_name"];
        }

        # CHEKING THE PERSON EXTENSION
        $extension = "";
        if(isset($_POST["extension"])) $extension = $_POST["extension"];

        # UPDATE SQL FOR PERSONNEL TABLE 
        $sql1 = "UPDATE personnel SET 
            image_name        ='$image_name',                      firstname         ='{$_POST["firstname"]}', 
            middlename        ='{$_POST["middlename"]}',           lastname          ='{$_POST["lastname"]}',
            extension         ='$extension',                       gender            ='{$_POST["gender"]}', 
            civil_status      ='{$_POST["civil_status"]}',         favorite_color    ='{$_POST["favorite_color"]}',
            height            ='{$_POST["height"]}',               weight            ='{$_POST["weight"]}',
            date_of_birth     ='{$_POST["date_of_birth"]}',        age               ='{$_POST["age"]}',
            city_mun_pob      ='{$_POST["city_mun_pob"]}',         province_pob      ='{$_POST["province_pob"]}',
            city_mun_address  ='{$_POST["city_mun_address"]}',     province_address  ='{$_POST["province_address"]}',
            phone_number      ='{$_POST["phone_number"]}',         email             ='{$_POST["email"]}',
            citizenship       ='{$_POST["citizenship"]}',          religion          ='{$_POST["religion"]}',
            language_spoken   ='{$_POST["language_spoken"]}' 

            WHERE person_id = '{$person_data["person_id"]}'
        ";

        # UPDATE SQL FOR SPOUSE TABLE
        $sql2 = "UPDATE spouse SET 
            spouse_fname    = '{$_POST["spouse_fname"]}',
            spouse_mname    = '{$_POST["spouse_mname"]}',       
            spouse_lname    = '{$_POST["spouse_lname"]}'

            WHERE person_id = '{$person_data["person_id"]}'
        ";

        # UPDATE SQL FOR PARENTS TABLE
        $sql3 = "UPDATE parents SET 
            father_fname             = '{$_POST["father_fname"]}',             father_mname              = '{$_POST["father_mname"]}',       
            father_lname             = '{$_POST["father_lname"]}',             mother_fname              = '{$_POST["mother_fname"]}',
            mother_mname             = '{$_POST["mother_mname"]}',             mother_lname              = '{$_POST["mother_lname"]}',       
            parent_city_mun_address  = '{$_POST["parent_city_mun_address"]}',  parent_province_address   = '{$_POST["parent_province_address"]}'
            
            WHERE person_id = '{$person_data["person_id"]}'
        ";

        # UPDATE SQL FOR EDUCATIONAL RECORD TABLE
        $sql4 = "UPDATE educ_record SET 
            elem_grad_sy  = '{$_POST["elem_grad_sy"]}',    elem_school_name  = '{$_POST["elem_school_name"]}',
            high_grad_sy  = '{$_POST["high_grad_sy"]}',    high_school_name  = '{$_POST["high_school_name"]}',
            coll_grad_sy  = '{$_POST["coll_grad_sy"]}',    coll_school_name  = '{$_POST["coll_school_name"]}'            
            
            WHERE person_id = '{$person_data["person_id"]}'
        ";

        # UPDATE SQL FOR WORK EXPERIENCE TABLE
        $sql5 = "UPDATE w_experience SET 
            company_name      = '{$_POST["company_name"]}',        position = '{$_POST["position"]}',
            years_experience  = '{$_POST["years_experience"]}'

            WHERE person_id = '{$person_data["person_id"]}'
        ";

        # UPDATE THE DATA TO THE FIVE TABLES AND CHECK IF ALL OF THE UPDATE EVENTS ARE SUCCESSFULL
        # IF IT IS SUCCESSFULL THEN REDIRECT TO PERSON VIEWER PAGE
        if( mysqli_query(db_connect(), $sql1) && mysqli_query(db_connect(), $sql2) &&
            mysqli_query(db_connect(), $sql3) && mysqli_query(db_connect(), $sql4) &&
            mysqli_query(db_connect(), $sql5)){

            header('Location: ./person_viewer.php?person_id=' .$person_data["person_id"]. '&update_msg=data updated successfully');
        }else{
            echo "Error updating person: " . mysqli_error(db_connect());
        }
    }
}

/**
 * UPLOAD THE PROFILE IMAGE INTO THE UPLOADS FOLDER
 * THIS METHOD WILL RETURN AN GENERATED MAGE NAME
 */
function uplod_profile_image(){
    # RENAME THE IMAGE
    $exploded_name = explode(".", $_FILES["profile_image"]["name"]);
    $new_image_name = uniqid("profile_", true) . "." . strtolower(end($exploded_name));
    
    if(!empty($new_image_name)){
        # MOVE THE IMAGE TO assets/prodcts_uploads AND CHECK IF IT IS SUCCESSFULL
        if(move_uploaded_file($_FILES["profile_image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/rdpis/uploads/profileImages/" . $new_image_name)){
            return $new_image_name;
        }else{
            return;
        }
    }
}
