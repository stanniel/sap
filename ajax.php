<?php
require("db_config.php");

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
if($category == "reservations") {

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
        <script src="js/reserv-script.js"></script>
        <?php
    }
}

if($category == "time"){
    $date = $_POST['date'];
    echo '<option value="default">- Reserv. Time -</option>';
    $sql = "SELECT id,start_time FROM termin t WHERE id NOT IN (SELECT time_slot_id FROM reservation WHERE table_id=".$action.' AND date='.'"'.$date.'")';
    select_query($sql,"start_time");
    echo '</select>';
}


if($category == "db"){
        $sql = "SELECT name,description,image FROM menu_dish WHERE subcategory_id=".$action;
        $query = mysqli_query($connection,$sql);
        while ($result = mysqli_fetch_array($query)){ ?>

            <div class="col-sm-4">
                <a href="#" class="thumbnail">
                    <img src="<?php echo $result['image']; ?>" alt="picture">
                    <h3><?php echo $result['name']; ?></h3>
                    <p><?php echo $result['description']; ?></p>
                </a>
            </div>
            <?php
        }
}