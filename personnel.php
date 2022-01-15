<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/rdpis/process/getters.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/rdpis_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/personnel.css">
    <title>Personnel | RD-PIS</title>
</head>
<body>
    <div class="main_container">
        <!-- SIDE BAR NAVIGATION -->
        <?php include "./includes/sidebar.inc.php"; ?>

        <div class="container">
            <div class="persons_container">

                <!-- POP UP MESSEGES HERE -->
                <?php
                    if(isset($_GET["add_person_msg"])){
                        echo '<div class="pop_up_msg" id="add_person_popup">'. $_GET["add_person_msg"] .'</div>';
                    }

                    if(isset($_GET["delete_msg"])){
                        echo '<div class="pop_up_msg" id="delete_popup">'. $_GET["delete_msg"] .'</div>';
                    }
                ?>

                <?php
                    $persons = get_persons(); # CALLING THE get_persons() FUNCTION FROM THE GETTERS
                    if (mysqli_num_rows($persons) > 0) {
                        while($person = mysqli_fetch_assoc($persons)) {
                            echo '
                                <div class="person_container">
                                    <a class="person" href="./person_viewer.php?person_id='.$person["person_id"].'">
                                        <img class="profile_image" src="./uploads/profileImages/'. $person["image_name"] .'" alt="">
                                        <span>'. $person["firstname"] .'</span>
                                        <span>'. $person["lastname"]. '</span>
                                    </a>

                                    <div class="person_action" id="'.$person["person_id"].'">
                                        <a class="update_btn" href="./person_form.php?person_id='.$person["person_id"].'">
                                            <img src="./images/edit.png" >
                                        </a> <br>
                                        <img src="./images/bin.png" class="delete_btn" onclick="confirmDelete(`'.$person["person_id"].'`, `'.$person["firstname"].'`);" />
                                    </div>
                                </div>
                            ';
                        }
                    } else {
                        # THIS WILL SHOW IF THERE IS NO PERSON YET IN THE DATABASE 
                        ?>
                            <div style="width:100%;
                                        padding:25px 0;
                                        text-align:center;
                                        color:orange;
                                        background-color:#505050;">
                                There's no person yet!
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        
        <!-- DELETE MODAL -->
        <div class="modal_container">
            <div class="modal">
                <p class="comfirm_delete_msg"></p>
                <a class="confirm_delete_btn" id="confirm_delete">Confirm Delete</a>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="./js/delete.js"></script>
</body>
</html>