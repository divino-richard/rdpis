<?php
    # EXPLODE THE PATH
    # [0] is empty, [1] is rootfolder, [2] is filename
    $doc_file = explode('/', $_SERVER['PHP_SELF']);
?>

<div class="sidebar">
    <img class="logo" src="./images/rdpis_logo.png" alt="logo">
    <div class="sidebar_menus">
        <a href="./" class="sidebar_menu <?php echo $doc_file[2] == 'index.php' ? "active" : ''?>">
            <span>
                <img class="side_menu_icon" src="./images/homepage.png" alt=""/>
            </span>
            Home
            <img class="menu_arrow_icon" src="./images/arrow-left.png" alt="">
        </a>

        <a href="./personnel.php" class="sidebar_menu <?php echo $doc_file[2] == 'personnel.php' ? "active" : ''?>">
            <span>
                <img src="./images/group.png" alt=""/>
            </span>
            Personnel
            <img class="menu_arrow_icon" src="./images/arrow-left.png" alt="">
        </a>

        <a href="./person_form.php" class="sidebar_menu <?php echo $doc_file[2] == 'person_form.php' ? "active" : ''?>">
            <span>
                <img src="./images/add_person.png" alt=""/>
            </span>
            Add Person
            <img class="menu_arrow_icon" src="./images/arrow-left.png" alt="">
        </a>
    </div>
</div>
