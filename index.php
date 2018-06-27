<!DOCTYPE html>
<html lang="en">
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

<head>
    <meta charset="UTF-8">
    <title>Restoran Salt & Pepper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Alex+Brush|Playfair+Display|Allura|Lora|Cormorant+Upright|Parisienne" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#" data-toggle="modal" data-target="#myModal" id="reserve">REZERVACIJA</a></li>
                    <li><a href="index.php">JELOVNIK</a></li>
                    <li><a href="o%20nama.html">O NAMA</a></li>
                    <li><a href="contact.html">KONTAKT</a></li>
                    <li><p onmouseover="myNumber(this)" onmouseout="myNumberOut(this)">024 / 567-849</p></li>
                    <script>
                        function myNumber(x) {
                            x.style.color= "red";
                            x.style.fontSize = "26pt";
                            x.style.fontWeight="bold";
                        }

                        function myNumberOut(x) {
                            x.style.color= "white";
                            x.style.fontSize= "20pt";
                        }
                    </script>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="carousel-menu">
      <div class="page-header" align="center">
        <h1 align="left">Dobrodošli na sajt...</h1>
        <img src="images/salt_and_pepper.png" style=" width:35%; height:40%; display: inline" >
      </div>


    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" align="center">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
            <img src="images/1.jpg" alt="picture">
            <div class="carousel-caption">
                Najbolji kuvari u gradu
            </div>
            </div>
        <div class="item">
            <img src="images/2.jpg" alt="picture">
            <div class="carousel-caption">
                Uvek sveža hrana
            </div>
        </div>
        <div class="item">
            <img src="images/3.jpg" alt="picture">
            <div class="carousel-caption">
                Prijatni ambijent
            </div>
         </div>

        <div class="item">
            <img src="images/4.jpg" alt="picture">
            <div class="carousel-caption">
                Caffe Bar
            </div>
        </div>


    <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
        <br/><br/>
        <div class="all_together">
    <div class="left_menu" onload="function(){this.style.height=document.getElementById('db').style.height}"><br/>
           <p>PREDJELA</p>
        <?php
        require("db_config.php");
        $sql = "SELECT id,subcategory FROM menu_subcategory WHERE section_id=1";
        $query = mysqli_query($connection,$sql);
        while($result = mysqli_fetch_array($query)){  ?>
            <a href="#" id="<?php echo $result['id']; ?>" class="food"><?php echo $result['subcategory'];?></a><br/>
        <?php
        } ?>
        <br><br>
        <p>GLAVNA JELA</p>
        <?php
        $sql = "SELECT id,subcategory FROM menu_subcategory WHERE section_id=2";
        $query = mysqli_query($connection,$sql);
        while($result = mysqli_fetch_array($query)){  ?>
            <a href="#" id="<?php echo $result['id']; ?>" class="food"><?php echo $result['subcategory'];?></a><br/>
            <?php
        } ?>
        <br><br>
        <p>DESERTI</p>
        <?php
        $sql = "SELECT id,subcategory FROM menu_subcategory WHERE section_id=3";
        $query = mysqli_query($connection,$sql);
        while($result = mysqli_fetch_array($query)){  ?>
            <a href="#" id="<?php echo $result['id']; ?>" class="food"><?php echo $result['subcategory'];?></a><br/>
            <?php
        } ?>
    </div>

    <div class="row-eq-height" id="db">
        <?php
        $i=0;
        $sql = "SELECT name,description,image FROM menu_dish";
        $query = mysqli_query($connection,$sql);
        while ($result = mysqli_fetch_array($query) AND $i<6){ ?>

            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="<?php echo $result['image'];?>" alt="picture" height="300px" width="400px">
                    <h3><?php echo $result['name']; ?></h3>
                    <p style="font-size:16px;"><?php echo $result['description']; ?></p>
                </div>
            </div>
<?php
        $i++;}
?>

    </div>
        </div>
    <br/>
    <div class="jumbotron">
        <div class="container quick_contact">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <p align="center"><span class="glyphicon glyphicon-earphone"></span></p>
                <h3 align="center">Telefon</h3><br/>
                <p align="center">+381 011/ 55 11 11</p>
                <p align="center">+381 063/ 15 66 223</p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <p align="center"><span class="glyphicon glyphicon-map-marker"></span></p>
                <h3 align="center">Lokacija</h3><br/>
                <p align="center">19, Beograd 11070, Srbija</p>
                <p align="center">Beograd, Republika Srbija</p>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <p align="center"><span class="glyphicon glyphicon-envelope"></span></p>
                <h3 align="center">Email/Fax</h3><br/>
                <p align="center">info@salt-and-pepper.com</p>
                <p align="center">CALL centar: 011/55 44 11</p>
            </div>
        </div>

        <p align="center"><br/>Dostava i poručivanje: 011/ 55 11 11<br/>Info i rezervacija: 065 / 655 11 11<br/><br/>
            <a href="https://www.facebook.com/saltnpepabeograd/" target='_blank'><img src="images/facebook.png" width="60px" height="60px"/></a>
            <a href="https://twitter.com/saltnpepabgd" target='_blank'><img src="images/twitter.png" width="60px" height="60px" align="center"/></a><br/>
        </p>
    </div>

</div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Napravite rezervaciju</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>