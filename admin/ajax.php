<?php
require("../db_config.php");

$action="";
$category="";
if(isset($_POST['action'])){
    $action = $_POST['action'];
}
if(isset($_POST['category'])){
    $category = $_POST['category'];
}


function select_query($sql,$field){
    global $connection;
    $query = mysqli_query($connection,$sql);
    while($result = mysqli_fetch_array($query)){
        echo '<option value="'.$result["id"].'">'.$result[$field].'</option>';
    }
}

if($category == "menu"){
    if($action == "list"){
        echo '<div id="list-by">';
        echo '<select name="type" id="type">';
        echo '<option value="default">- Category -</option>';

        $sql = "SELECT id,category FROM menu_category";
        select_query($sql,"category");

        echo '</select>';
        echo '<select name="section" id="section" disabled>';
        echo '<option value="default">- Section -</option>';
        echo '</select>';
        echo '<select name="subcategory" id="subcategory" disabled>';
        echo '<option value="default">- Subcategory -</option>';
        echo '</select>';
        echo '<button type="button" class="btn" id="generate">Get List</button>';
        echo '</div>';
        echo '<script src="js/select-type.js"></script>';
        echo '<div id="list-content">';
        echo '</div>';
    }
    if($action == "add"){
        ?>

    <form action="menu-insert.php" method="post" id="forma">
        <?php
        echo '<select name="type" id="type">';
            echo '<option value="default">- Category -</option>';

            $sql = "SELECT id,category FROM menu_category";
            select_query($sql,"category");

            echo '</select>';
        echo '<select name="section" id="section">';
        echo '<option value="default">- Section -</option>';

        $sql = "SELECT s.id,section FROM menu_section s INNER JOIN menu_category c ON s.category_id=c.id";
        select_query($sql,"section");
        echo '</select>';
        echo '<select name="subcategory" id="subcategory">';
        echo '<option value="default">- Subcategory -</option>';
        $sql = "SELECT sub.id,subcategory FROM menu_subcategory sub INNER JOIN menu_section s ON sub.section_id=s.id";
        select_query($sql,"subcategory");
        echo '</select>';
        ?>
        <br>
        <label for="name">Name: </label><input type="text" name="name" id="name"><br>
        <label for="description">Description: </label><input type="text" name="description" id="description"><br>
        <label for="image">Image: </label><input type="file" name="image" id="image">
        <input type="submit" name="submit" value="Submit" id="submit">
        <input type="reset" name="reset" value="Cancel">
        </form>
        <?php
    }
}

if($category == "section"){
    echo '<option value="default">- Section -</option>';
    $sql = "SELECT s.id,section FROM menu_section s INNER JOIN menu_category c ON s.category_id=c.id WHERE s.category_id=".$action;
    select_query($sql,"section");
    echo '</select>';
}

if($category == "subcategory"){
    echo '<option value="default">- Subcategory -</option>';
    $sql = "SELECT sub.id,subcategory FROM menu_subcategory sub INNER JOIN menu_section s ON sub.section_id=s.id WHERE sub.section_id=".$action;
    select_query($sql,"subcategory");
    echo '</select>';
}

$categ="";
$sect="";
$subsect="";

if(isset($_POST['categ'])){
    $categ=$_POST['categ'];
}

if(isset($_POST['sect'])){
    $sect=$_POST['sect'];
}

if(isset($_POST['subsect'])){
    $subsect=$_POST['subsect'];
}

if(!empty($categ) and $categ!="default" and $sect=="default" and $subsect=="default"){
    $sql = "SELECT d.id,name,description,date_added FROM menu_dish d INNER JOIN menu_subcategory sub ON d.subcategory_id=sub.id INNER JOIN menu_section s ON sub.section_id=s.id INNER JOIN menu_category c ON s.category_id=c.id WHERE c.id=".$categ;
    $query = mysqli_query($connection,$sql);
    while($result = mysqli_fetch_array($query)){
        echo '<div>';
        echo '<div data-id="' . $result["name"] .'"><b>Name:</b> '.$result["name"].'</div><div data-id="'.$result["description"].'"><b>Description:</b> '.$result["description"].'</div><div><b>Datetime added:</b> '.$result["date_added"].'</div>';
        echo '</div><button class="update" data-id="'.$result["id"].'">Update</button><button class="delete" data-id="'.$result["id"].'">Delete</button><hr>';

    }
    echo '<script src="js/update-delete.js"></script>';
}

if(!empty($categ) and $categ!="default" and $sect!="default" and $subsect=="default"){
    $sql = "SELECT d.id,name,description,date_added FROM menu_dish d INNER JOIN menu_subcategory sub ON d.subcategory_id=sub.id INNER JOIN menu_section s ON sub.section_id=s.id INNER JOIN menu_category c ON s.category_id=c.id WHERE c.id=".$categ." AND s.id=".$sect;
    $query = mysqli_query($connection,$sql);
    while($result = mysqli_fetch_array($query)){
        echo '<div>';
        echo '<div data-id="' . $result["name"] .'"><b>Name:</b> '.$result["name"].'</div><div data-id="'.$result["description"].'"><b>Description:</b> '.$result["description"].'</div><div><b>Datetime added:</b> '.$result["date_added"].'</div>';
        echo '</div><button class="update" data-id="'.$result["id"].'">Update</button><button class="delete" data-id="'.$result["id"].'">Delete</button><hr>';

    }
    echo '<script src="js/update-delete.js"></script>';
}

if(!empty($categ) and $categ!="default" and $sect!="default" and $subsect!="default"){
    $sql = "SELECT d.id,name,description,date_added FROM menu_dish d INNER JOIN menu_subcategory sub ON d.subcategory_id=sub.id INNER JOIN menu_section s ON sub.section_id=s.id INNER JOIN menu_category c ON s.category_id=c.id WHERE c.id=".$categ." AND s.id=".$sect." AND sub.id=".$subsect;
    $query = mysqli_query($connection,$sql);
    while($result = mysqli_fetch_array($query)){
        echo '<div>';
        echo '<div data-id="' . $result["name"] .'"><b>Name:</b> '.$result["name"].'</div><div data-id="'.$result["description"].'"><b>Description:</b> '.$result["description"].'</div><div><b>Datetime added:</b> '.$result["date_added"].'</div>';
        echo '</div><button class="update" data-id="'.$result["id"].'">Update</button><button class="delete" data-id="'.$result["id"].'">Delete</button><hr>';

    }
    echo '<script src="js/update-delete.js"></script>';
}

if($category == "reservations") {
    if ($action == "list") {
        $sql = "SELECT r.id,name,table_id,start_time,end_time,date,contact_phone,contact_email FROM reservation r INNER JOIN termin t ON r.time_slot_id=t.id ORDER BY r.id DESC";
        $query = mysqli_query($connection, $sql);
        while ($result = mysqli_fetch_array($query)) {
            echo '<div>';
            echo '<div><b>Name:</b> ' . $result["name"] . '</div><div><b>Table no:</b> ' . $result["table_id"] . '</div><div><b>Time starting:</b> ' . $result["start_time"] . '</div><div><b>Time finishing:</b> ' . $result["end_time"] . '</div><div><b>Date:</b> ' . $result["date"] . '</div><div><b>Phone:</b> ' . $result["contact_phone"] . '</div><div><b>Email:</b> ' . $result["contact_email"] . '</div>';
            echo '</div><button class="del-res" name="del-res" data-id="'.$result["id"].'">Delete</button><hr>';
        }
    echo '<script src="js/del-res.js"></script>';
    }

        if ($action == "add") {

            ?>
            <form action="reservation-insert.php" method="post" id="reserv">

                <br>
                <p id="name_error" style="display:none;color:#f00;">Please leave a name with reservation</p>
                <label for="name">Name:</label><input type="text" name="name" id="name"><br>
                <p id="date_error" style="display:none;color:#f00;">Please write a date in format YYYY-MM-DD</p>
                <p id="date_error2" style="display:none;color:#f00;">Format should be YYYY-MM-DD</p>
                <label for="date">Date:</label><input type="text" name="date" id="date"><br>
                <p id="table_error" style="display:none;color:#f00;">Please pick a table</p>
                <label for="table">Table:</label><select name="table" id="table">
                    <option value="default">- Table -</option>
                    <?php
                    $sql = "SELECT id,seats FROM stol";
                    $query = mysqli_query($connection, $sql);
                    while ($result = mysqli_fetch_array($query)) {
                        echo '<option value="' . $result["id"] . '">Sto ' . $result["id"] . ' (za ' . $result["seats"] . ' osobe)</option>';
                    }
                    ?>
                </select><br>
                <p id="time_error" style="display:none;color:#f00;">Please pick a time</p>
                <label for="time">Time:</label><select name="time" id="time" disabled>
                    <option value="default">- Reserv. Time -</option>
                </select><br>
                <p id="contact_phone_error" style="display:none;color:#f00;">Phone number is required</p>
                <p id="contact_phone_error2" style="display:none;color:#f00;">Please enter a valid Serbian phone number</p>
                <label for="contact_phone">Phone num:</label><input type="text" name="contact_phone" id="contact_phone"><br>
                <p id="contact_email_error" style="display:none;color:#f00;">Email field is required</p>
                <p id="contact_email_error2" style="display:none;color:#f00;">Please enter a valid email address</p>
                <label for="contact_email">Email:</label><input type="text" name="contact_email" id="contact_email"><br>
                <input type="submit" name="submit" value="Submit" id="submit">
                <input type="reset" name="reset" value="Cancel">
            </form>

            <?php
            echo '<script src="js/reserv-script.js"></script>';
        }

}

if($category == "time"){
    $date = $_POST['date'];
    echo '<option value="default">- Reserv. Time -</option>';
    $sql = "SELECT id,start_time FROM termin t WHERE id NOT IN (SELECT time_slot_id FROM reservation WHERE table_id=".$action.' AND date='.'"'.$date.'")';
    select_query($sql,"start_time");
    echo '</select>';
}