<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/rdpis/process/getters.php";
    $person_data = get_person_data();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/rdpis_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/person_viewer.css">
    <title><?php echo ucwords($person_data["firstname"]); ?>'s Information | RD-PIS</title>
</head>
<body>
    <div class="main_container">
        <!-- SIDE BAR NAVIGATION -->
        <?php include "./includes/sidebar.inc.php"; ?>

        <div class="container">
            <ul class="info_container">
                <h2><?php echo $person_data["firstname"]; ?>'s Personal Information</h2>

                <!-- POP UP MESSEGES HERE -->
                <?php
                    if(isset($_GET["update_msg"])){
                        echo '<div class="pop_up_msg" id="update_popup">'. $person_data["firstname"].'\'s '.$_GET["update_msg"] .'</div>';
                    }
                ?>

                <!------------------------------------------------------------->
                <!--                      PERSONAL INFO                      -->
                <!------------------------------------------------------------->
                <h3>Personal Info</h3>

                <!-- PROFILE IMAGE -->
                <?php
                    echo $person_data["image_name"] ? 
                        '<img id="profile_image" onClick="showProfileImage(`'.$person_data["image_name"].'`)" src="./uploads/profileImages/'. $person_data["image_name"] .'" alt="profile">' 
                        :'<img src="./images/user_placeholder.png" alt="profile">
                    ';
                ?>
                <!-- PROFILE IMAGE MODAL VIEWER -->
                <div class="modal_container">
                    <img id="image_viewer" src="" alt="">
                </div>


                <li>
                    <b>Full Name: </b>
                    <?php 
                        echo $person_data["firstname"] .'
                        '. ($person_data["middlename"] == "N/A" ? "" : $person_data["middlename"]) .'
                        '. $person_data["lastname"] .' '. $person_data["extension"];
                    ?>
                </li>
                <li>
                    <b>Gender: </b> <?php echo ucwords($person_data["gender"]); ?> 
                </li>
                <li>
                    <b>Civil status:</b> <?php echo $person_data["civil_status"]; ?>
                </li>
                
                <?php
                    if($person_data["civil_status"] == "married"){
                        ?>
                            <li>
                                <b>Spouse Name:</b>
                                <?php echo $person_data["spouse_fname"].' 
                                    '. $person_data["spouse_mname"].' 
                                    '.$person_data["spouse_lname"]; 
                                ?>
                            </li>
                        <?php
                    }
                ?>

                <li>
                    <b>Favorite color:</b>
                    <div style="background-color: <?php echo $person_data["favorite_color"]; ?> ; padding:7px 25px; width:fit-content; border-radius:5px;">
                        <?php echo $person_data["favorite_color"]; ?>
                    </div>
                </li>

                <li>
                    <b>Height:</b> <?php echo $person_data["height"] . ' cm'; ?>
                </li>
                <li>
                    <b>Weight:</b> <?php echo $person_data["weight"] . ' kg'; ?>
                </li>
                <li>
                    <b>Date of birth:</b> <?php echo $person_data["date_of_birth"]; ?>
                </li>
                <li>
                    <b>Age:</b> <?php echo $person_data["age"] . ' years old'; ?>
                </li>
                <li>
                    <b>Place of birth:</b> 
                    <?php 
                        echo $person_data["city_mun_pob"] . ', 
                        ' . $person_data["province_pob"]; 
                    ?>
                </li>
                <li>
                    <b>Current Address:</b> 
                    <?php 
                        echo $person_data["city_mun_address"] . ', 
                        ' . $person_data["province_address"]; 
                    ?>
                </li>
                <li>
                    <b>Contact:</b>
                    <?php 
                        echo 'cell#('. $person_data["phone_number"] .') 
                        - email('. $person_data["email"] .')'; 
                    ?> 
                </li>
                <li>
                    <b>Citizenship:</b> <?php echo $person_data["citizenship"]; ?>
                </li>
                <li>
                    <b>Religion:</b> <?php echo $person_data["religion"]; ?>
                </li>
                <li>
                    <b>Language Spoken:</b> <?php echo $person_data["language_spoken"]; ?>
                </li>


                <!------------------------------------------------------------->
                <!--                      PARENTS INFO                       -->
                <!------------------------------------------------------------->
                <h3>Parents Info</h3>
                <li>
                    <b>Father's Name:</b> 
                    <?php
                        echo $person_data["father_fname"] .' 
                        '. ($person_data["father_mname"] == "N/A" ? "" : $person_data["father_mname"]) .' 
                        '. $person_data["father_lname"];
                    ?>
                </li>
                <li>
                    <b>Mother's Name:</b> 
                    <?php 
                        echo $person_data["mother_fname"] .' 
                        '. ($person_data["mother_mname"] == "N/A" ? "" : $person_data["mother_mname"]) .' 
                        '. $person_data["mother_lname"];
                    ?>
                </li>
                <li>
                    <b>Parent's Address:</b> 
                    <?php 
                        echo $person_data["parent_city_mun_address"] . ', 
                        ' . $person_data["parent_province_address"]; 
                    ?>
                </li>
                
                <!------------------------------------------------------------->
                <!--                   EDUCATIONAL RECORD                    -->
                <!------------------------------------------------------------->
                <h3>Educational Record</h3>
                <li>
                    <b>Elementary:</b> 
                    <?php 
                        echo $person_data["elem_school_name"] .' - 
                        '.$person_data["elem_grad_sy"]; 
                    ?>
                </li>
                <li>
                    <b>High School:</b>
                    <?php 
                        echo $person_data["high_school_name"] .' - 
                        '.$person_data["high_grad_sy"]; 
                    ?>
                </li>
                <li>
                    <b>College:</b>
                    <?php 
                        echo $person_data["coll_school_name"] .' - 
                        '.$person_data["coll_grad_sy"]; 
                    ?>
                </li>

                <!------------------------------------------------------------->
                <!--                     WORK EXPERIENCE                     -->
                <!------------------------------------------------------------->
                <h3>Work Experience</h3>
                <li>
                    <b>Company name:</b> <?php echo $person_data["company_name"]; ?>
                </li>
                <li>
                    <b>Position:</b> <?php echo $person_data["position"]; ?>
                </li>
                <li>
                    <b>Years experience:</b> <?php echo $person_data["years_experience"] . ' years experience'; ?>
                </li>

                <a href="./person_form.php?person_id=<?php echo $person_data["person_id"]; ?>">Update Info</a>
            </ul>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="./js/person_viewer.js"></script>
</body>
</html>