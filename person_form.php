<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/rdpis/process/getters.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/rdpis/process/setters.php";

    if(isset($_POST["submit_info"])){
        if(isset($_GET["person_id"])){
           update_person(); # FROM THE SETTER FILE
        }else{
            add_person(); # FROM THE SETTER FILE
        }
    }

    # SHOW PERSON'S DATA IN THE INPUT FIELD IF PERSON ID IS SET
    # FOR THE UPDATE FUNCTIONALITY
    if(isset($_GET["person_id"])){  
        $person_data = get_person_data(); # FROM THE GETTER FILE
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/rdpis_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/person_form.css">
    <title>Person Form | RD-PIS</title>
</head>
<body>
    <div class="main_container">
        <!------------------------------------------------------->
        <!--           SIDE BAR NAVIGATION INCLUDED            -->
        <!------------------------------------------------------->
        <?php include "./includes/sidebar.inc.php"; ?>

        <div class="container">
            <!------------------------------------------------------------->
            <!--                       THE FORM                          -->
            <!------------------------------------------------------------->
            <form action="" method="POST" class="add_person_form" enctype="multipart/form-data">
                <!------------------------------------------------------------->
                <!--                     FORM TITTLE                         -->
                <!------------------------------------------------------------->
                <h2>Personal Information Form</h2>
                <p><i>(Please don't leave the required field. Put N/A if not applicable)</i></p>
                <p>(<span>*</span>) means it is a required field</p>
                
                <h3>Personal Info</h3>
                <!------------------------------------------------------------->
                <!--                     PROFILE IMAGE                       -->
                <!------------------------------------------------------------->
                <div class="profile_container">
                    <?php 
                        if(isset($person_data)){
                            echo '<img src="./uploads/profileImages/'. $person_data["image_name"] .'" alt="picture" id="image_viewer"/>';
                        }else{
                            echo '<img src="./images/user_placeholder.png" alt="picture" id="image_viewer">';
                        }
                        echo isset($_GET["file_error"]) ? '<p style="text-align:right; margin-right:1.5rem; color:red;">'. $_GET["file_error"] .'</p>': "";
                    ?>
                    <p>Profile picture<span>*</span></p>
                    <input type="file" name="profile_image" accept="image/*" id="profile_image">
                </div>
                
                <!------------------------------------------------------------->
                <!--                       FULL NAME                         -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">Full Name<span>*</span>:</label>
                    <div class="input_wrapper">
                        <input type="text" placeholder="First name" name="firstname" value="<?php echo isset($person_data) ? $person_data["firstname"] : ""; ?>" required> 
                        <input type="text" placeholder="Middle name(N/A if none)" name="middlename" value="<?php echo isset($person_data) ? $person_data["middlename"] : ""; ?>" required>
                        <div>
                            <input type="text" placeholder="Last name" name="lastname" style="width:80%;" value="<?php echo isset($person_data) ? $person_data["lastname"] : ""; ?>"required>
                            <input type="checkbox" value="Jr." name="extension" <?php echo !empty($person_data["extension"]) ? "checked" : ""; ?> >Jr.
                        </div>
                    </div>
                </div>

                <!------------------------------------------------------------->
                <!--                        GENDER                           -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label>Gender<span>*</span>:</label>
                    <div>
                        <?php
                            if(isset($person_data)){
                                ?>
                                    <input type="radio" name="gender" value="male" <?php echo $person_data["gender"] == "male" ? "checked" : "" ?> >Male
                                    <input type="radio" name="gender" value="female" <?php echo $person_data["gender"] == "female" ? "checked" : "" ?> >Female
                                <?php
                            }else{
                                ?>
                                    <input type="radio" name="gender" value="male" checked>Male
                                    <input type="radio" name="gender" value="female">Female
                                <?php
                            }
                        ?>
                    </div>
                </div>

                <!------------------------------------------------------------->
                <!--                      PLACE OF BIRTH                     -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">Place of birth<span>*</span>: </label>
                    <div class="input_wrapper">
                        <input type="text" placeholder="City/Municipality" name="city_mun_pob" value="<?php echo isset($person_data) ? $person_data["city_mun_pob"] : ""; ?>"required>
                        <input type="text" placeholder="Province" name="province_pob" value="<?php echo isset($person_data) ? $person_data["province_pob"] : ""; ?>"required>
                    </div>
                </div>

                <!------------------------------------------------------------->
                <!--                      BIRTH DATE                         -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">Date of birth<span>*</span>:</label>
                    <input type="date" name="date_of_birth" id="birth_date" value="<?php echo isset($person_data) ? $person_data["date_of_birth"] : ""; ?>"required>
                </div>

                <!------------------------------------------------------------->
                <!--                           AGE                           -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="age">Age<span>*</span>:</label>
                    <input type="number" readonly placeholder="generated by birthdate" name="age" id="age_input" value="<?php echo isset($person_data) ? $person_data["age"] : ""; ?>" required>
                </div>

                <!------------------------------------------------------------->
                <!--                      CIVIL STATUS                       -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="civil_status">Civil status<span>*</span>:</label>
                    <select name="civil_status" id="civil_status" value="single">
                        <option value="single" <?php echo isset($person_data) && $person_data["civil_status"] == "single" ? "selected" : "";?>>Single</option>
                        <option value="married" <?php echo isset($person_data) && $person_data["civil_status"] == "married" ? "selected" : "";?>>Married</option>
                        <option value="widowed" <?php echo isset($person_data) && $person_data["civil_status"] == "widowed" ? "selected" : "";?>>Widowed</option>
                        <option value="separated" <?php echo isset($person_data) && $person_data["civil_status"] == "separated" ? "selected" : "";?>>Separated</option>
                        <option value="divorced" <?php echo isset($person_data) && $person_data["civil_status"] == "divorced" ? "selected" : "";?>>Divorced</option>
                    </select>
                </div>

                <!------------------------------------------------------------->
                <!--                      SPOUSE NAME                        -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con" id="spouse_name">
                    <label for="">Spouse name:</label>
                    <div class="input_wrapper">
                        <input type="text" placeholder="First name" name="spouse_fname" value="<?php echo isset($person_data) ? $person_data["spouse_fname"] : ""; ?>" id="spouse_fname">
                        <input type="text" placeholder="Middle name" name="spouse_mname" value="<?php echo isset($person_data) ? $person_data["spouse_mname"] : ""; ?>" id="spouse_mname">
                        <input type="text" placeholder="Last name" name="spouse_lname" value="<?php echo isset($person_data) ? $person_data["spouse_lname"] : ""; ?>" id="spouse_lname">
                    </div>
                </div>

                <!------------------------------------------------------------->
                <!--                     FAVORITE COLOR                      -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="fav_color">Favorite color<span>*</span>:</label>
                    <input type="color" name="favorite_color" value="<?php 
                        echo isset($person_data) ? $person_data["favorite_color"] : "#328678";
                    ?>">
                </div>

                <!------------------------------------------------------------->
                <!--                         HEIGHT                          -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">Height<span>*</span>:</label>
                    <input type="number" placeholder="centimeter (cm)" name="height" value="<?php echo isset($person_data) ? $person_data["height"] : ""; ?>"required>
                </div>

                <!------------------------------------------------------------->
                <!--                         WEIGHT                          -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="weight">Weight<span>*</span>:</label>
                    <input type="number" placeholder="kilogram (kg)" name="weight" value="<?php echo isset($person_data) ? $person_data["weight"] : ""; ?>"required>
                </div>
                
                <!------------------------------------------------------------->
                <!--                    CURRENT ADDRRESS                     -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label>Current Address<span>*</span>:</label>
                    <div class="input_wrapper">
                        <input type="text" placeholder="City/Municipality" name="city_mun_address" value="<?php echo isset($person_data) ? $person_data["city_mun_address"] : ""; ?>"required>
                        <input type="text" placeholder="Province" name="province_address" value="<?php echo isset($person_data) ? $person_data["province_address"] : ""; ?>"required>
                    </div>
                </div>
                
                <!------------------------------------------------------------->
                <!--                         CONTACT                         -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label>Contact<span>*</span>:</label>
                    <div class="input_wrapper">
                        <input type="number" placeholder="Phone number" name="phone_number" value="<?php echo isset($person_data) ? $person_data["phone_number"] : ""; ?>"required>
                        <input type="email" placeholder="E-mail" name="email" value="<?php echo isset($person_data) ? $person_data["email"] : ""; ?>"required>
                    </div>
                </div>
                
                <!------------------------------------------------------------->
                <!--                         RELIGION                        -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="religion">Religion<span>*</span>:</label>
                    <input type="text" placeholder="ex. Catholic, Born again" name="religion" value="<?php echo isset($person_data) ? $person_data["religion"] : ""; ?>"required>
                </div>

                <!------------------------------------------------------------->
                <!--                         CITIZENSHIP                     -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label>Citizenship<span>*</span>:</label>
                    <input type="text" placeholder="ex. Filipino" name="citizenship" value="<?php echo isset($person_data) ? $person_data["citizenship"] : ""; ?>"required>
                </div>
                
                <!------------------------------------------------------------->
                <!--                      LANGUAGE SPOKEN                    -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label>Language spoken<span>*</span>:</label>
                    <input type="text" placeholder="ex. Tagalog, bisaya" name="language_spoken" value="<?php echo isset($person_data) ? $person_data["language_spoken"] : ""; ?>"required>
                </div>

                <h3>Parents Info</h3>
                <!------------------------------------------------------------->
                <!--                      FATHER'S NAME                      -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">Father's Name<span>*</span>:</label>
                    <div class="input_wrapper">
                        <input type="text" placeholder="First name" name="father_fname" value="<?php echo isset($person_data) ? $person_data["father_fname"] : ""; ?>"required>
                        <input type="text" placeholder="Middle name(N/A if none)" name="father_mname" value="<?php echo isset($person_data) ? $person_data["father_mname"] : ""; ?>"required>
                        <input type="text" placeholder="Last name" name="father_lname" value="<?php echo isset($person_data) ? $person_data["father_lname"] : ""; ?>"required>
                    </div>
                </div>
                
                <!------------------------------------------------------------->
                <!--                      MOTHER'S NAME                      -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">Mother's Name<span>*</span>:</label>
                    <div class="input_wrapper">
                        <input type="text" placeholder="First name" name="mother_fname" value="<?php echo isset($person_data) ? $person_data["mother_fname"] : ""; ?>"required>
                        <input type="text" placeholder="Middle name" name="mother_mname" value="<?php echo isset($person_data) ? $person_data["mother_mname"] : ""; ?>"required>
                        <input type="text" placeholder="Last name" name="mother_lname" value="<?php echo isset($person_data) ? $person_data["mother_lname"] : ""; ?>"required>
                    </div>
                </div>

                <!------------------------------------------------------------->
                <!--                      PARENTS ADDRESS                    -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label>Parent's Address<span>*</span>:</label>
                    <div class="input_wrapper">
                        <input type="text" placeholder="City/Municipality" name="parent_city_mun_address" value="<?php echo isset($person_data) ? $person_data["parent_city_mun_address"] : ""; ?>"required>
                        <input type="text" placeholder="Province" name="parent_province_address" value="<?php echo isset($person_data) ? $person_data["parent_province_address"] : ""; ?>"required>
                    </div>
                </div>

                <h3>Educational Record</h3>
                <!------------------------------------------------------------->
                <!--                   ELEMENTARY SCHOOL                     -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">Elementatry<span>*</span>:</label>
                    <div class="input_wrapper">
                        <input type="text" name="elem_school_name" value="<?php echo isset($person_data) ? $person_data["elem_school_name"] : ""; ?>" placeholder="Name of school" required>
                        <input type="text" name="elem_grad_sy" value="<?php echo isset($person_data) ? $person_data["elem_grad_sy"] : ""; ?>" placeholder="Year graduated" required>
                    </div>
                </div>

                <!------------------------------------------------------------->
                <!--                       HIGH SCHOOL                       -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">High school<span>*</span>:</label>
                    <div class="input_wrapper">
                        <input type="text" name="high_school_name" value="<?php echo isset($person_data) ? $person_data["high_school_name"] : ""; ?>" placeholder="Name of school" required>
                        <input type="text" name="high_grad_sy" value="<?php echo isset($person_data) ? $person_data["high_grad_sy"] : ""; ?>" placeholder="Year graduated" required>
                    </div>
                </div>

                <!------------------------------------------------------------->
                <!--                      COLLEGE                            -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">College<span>*</span>:</label>
                    <div class="input_wrapper">
                        <input type="text" name="coll_school_name" value="<?php echo isset($person_data) ? $person_data["coll_school_name"] : ""; ?>" placeholder="Name of school" required>
                        <input type="text" name="coll_grad_sy" value="<?php echo isset($person_data) ? $person_data["coll_grad_sy"] : ""; ?>" placeholder="Year graduated" required>
                    </div>
                </div>

                <h3>Work Experience</h3>
                <!------------------------------------------------------------->
                <!--                        COMPANY NAME                     -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">Company name<span>*</span>:</label>
                    <input type="text" name="company_name" value="<?php echo isset($person_data) ? $person_data["company_name"] : ""; ?>" placeholder="ex. Google" required>
                </div>

                <!------------------------------------------------------------->
                <!--                        POSITION                         -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">Position<span>*</span>:</label>
                    <input type="text" name="position" value="<?php echo isset($person_data) ? $person_data["position"] : ""; ?>" placeholder="ex. Software engineer" required>
                </div>

                <!------------------------------------------------------------->
                <!--                  YEARS EXPERIENCE                       -->
                <!------------------------------------------------------------->
                <div class="addperson_input_con">
                    <label for="">Years Experience<span>*</span>:</label>
                    <input type="number" name="years_experience" value="<?php echo isset($person_data) ? $person_data["years_experience"] : ""; ?>" placeholder="how many years you are in that company" required>
                </div>

                <input type="submit" name="submit_info" value="Submit">
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="./js/form_handler.js"></script>
</body>
</html>