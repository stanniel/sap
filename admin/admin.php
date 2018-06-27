<!DOCTYPE html>
<html lang="en">
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
      integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<link href="js/bootstrap.js" rel="js" type="text/js">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css.css" rel="stylesheet">


    <meta charset="UTF-8">
    <title>Restoran Salt & Pepper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Alex+Brush|Playfair+Display|Allura|Lora|Cormorant+Upright|Parisienne" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="js/admin-script.js"></script>
</head>

<body>
    <div class="left_menu"><br/>
        <p>MENU</p>
        <button type="button" class="btn-block" id="m-list">LIST</button>
        <br/>
        <button type="button" class="btn-block" id="m-add">ADD</button>
        <br/><br/><br/>
        <p>RESERVATIONS</p>
        <button type="button" class="btn-block" id="r-list">LIST</button><br/>
        <button type="button" class="btn-block" id="r-add">ADD</button><br/><br/><br/>
    </div>

    <div class="container" id="content">
        <span>Welcome to the admin section<br>
            Choose an option to the left</span>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update</h4>
                </div>
                <div class="modal-body">
                    <form action="menu-update.php" method="post" enctype="multipart/form-data" id="update-form">
                        <label for="name">Name: </label><input type="text" name="name" id="name"><br>
                        <label for="description">Description: </label><textarea name="description" id="description" rows="5" cols="30"></textarea><br>
                        <label for="image">Image: </label><input type="text" name="image" id="image">
                        <input type="hidden" id="id" name="id">
                        <input type="submit" name="submit" value="Submit" id="submit">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</body>
</html>