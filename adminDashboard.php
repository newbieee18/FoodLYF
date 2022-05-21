<?php
session_start();
if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
    header('location:loginpage.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

<link rel="icon" type="image/png" href="img/logo.png">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.rtl.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-grid.rtl.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-utilities.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap-utilities.rtl.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>



<style>

body{
  width: 100%;
  height: auto;
  font-family: Cooper Black;
}

table{
  width: 100%;
}

th,
td {
  padding: 5px;
  color: #fff;
  font-family: Times New Roman;
  font-size: 17px;
}

th {
  text-align: center;
  background-color: #FB8C00;
}

.mycontainer{
  overflow: auto;
  box-shadow: 0 0 20px rgba(1,1,1,0.1);
  border-radius: 10px;
  border: 1px solid black;
}

.mycontainer::-webkit-scrollbar
{
  height:10px;
  border-radius: 10px;
}
.mycontainer::-webkit-scrollbar-track
{
  border-radius: 10px;
  webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
.mycontainer::-webkit-scrollbar-thumb
{
  border-radius: 10px;
  background-color: #E05D5D;
  webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
}


tr:nth-child(even) {background-color: #64C9CF;}

</style>


</head>

<body>

<header class="mt-0 pt-0">
        <div class="bg-cover clearfix pt-3">
            <a href="adminDashboard.php"><img src="img/logo.png" width= "150px" height="150px" style="border-radius: 50%;"></a><br>
            <h2><a href="adminDashboard.php" class="logoo" style="text-decoration: none; font-size: 75px; font-family: chosen_font; color: #FB8C00; overflow: hidden;"><b>FoodLYF</b></a></h2>

            <div class="ml-0 mr-0 pb-1">
                <nav class="navbar navbar-expand-md">
                    <button class="navbar-toggler ml-auto" data-target="#my-nav" data-toggle="collapse"
                        aria-controls="my-nav" aria-expanded="false" onclick="myFunction(this)"
                        aria-label="Toggle navigation" style="width: 100%; float: none; margin-right: 0; outline: none; box-shadow: none;">
                        <center><span class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span></center>
                    </button>
                    <div id="my-nav" class="collapse navbar-collapse">
                        <ul class="navbar-nav mx-auto">
                           <li class="drp">
                                <center><a href="customers.php" class="drpbtn" style="height: 42px; text-align: center; width: 50px; vertical-align: middle; display: table-cell">USERS</a>
                                    <div class="drp-content">
                                    <a href="customers.php">Customers</a>
                                    <a href="riders.php">Riders</a>
                                    <a href="stores.php">Stores</a>                              
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="announcements.php">ANNOUNCEMENTS</a>
                            </li>

                            <?php
                            if(isset($_SESSION['id']) !="") {
 
                             echo  "<li class='nav-item'>
                                <a class='nav-link' href='#' style='background: #64C9CF;'>HELLO ". $_SESSION['id']."</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='logout.php' style='background: #FB8C00;'>LOGOUT</a>
                            </li>";
                            }
                            else{
                                echo  "<li class='nav-item'>
                                <a class='nav-link' href='loginpage.php'>LOGIN</a>
                            </li>";
                            }
                        
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
</header>




</body>

</html>