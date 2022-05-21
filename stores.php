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
  overflow: auto;
}

table{
  width: 100%;
}

th,
td {
  text-align: center;
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
  background-color: #F0CD35;
  webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
}


tr:nth-child(even) {background-color: #32E6C2;}

.modal label{
  color: #FB8C00;
}

.modal input[type=text]{
  font-family: Arial;
}

.gallery_pics_holder {
  border: 2px solid black;
  width: 100%;
  text-align: center;
  height: 350px;
  display: table;
  overflow-y: scroll !important;
}
.gallery_pics {
  display: inline-block;
  width: 100px;
  height: 100px;
  text-align: center;
  background-color: #3C0;
}
.gallery_pics img {
  width: 100%;
  height: auto;
}
.gallery_pics:hover {
  cursor: pointer;
  opacity: 0.7;
}
.gallery_pics.fullscreen img {
  width: 100%;
  height: auto;
  overflow-y: scroll !important;
}
.gallery_pics.fullscreen {
  z-index: 9999;
  position: absolute;
  margin: 0 auto;
  width: 90%;
  height: auto;
  top: 5%;
  left: 5%;
  background-color: #0FF;
  border-radius: 10px;
  opacity: 1;
  overflow-y: scroll !important;
}

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
                                    <a href="outletss.php">Outlets</a>                             
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="announcements.php">ANNOUNCEMENTS</a>
                            </li>

                            <?php
                            if(isset($_SESSION['id']) !="") {
 
                             echo  "<li class='nav-item'>
                                <a class='nav-link' href='#' style='background: #32E6C2;'>HELLO ". $_SESSION['id']."</a>
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

<div class="row" style ="max-width: 100%;">
        <div class="col-sm-3 menu" style ="text-align: center;">
            <ul>
               <a href="customers.php" style="text-decoration: none; font-family: Cooper Black;"><li>Customers</li></a>
                <a href="riders.php" style="text-decoration: none; font-family: Cooper Black;"><li>Riders</li></a>
                <a href="stores.php" style="text-decoration: none; font-family: Cooper Black;"><li style="background-color: #32E6C2;">Stores</li></a>
                <a href="outletss.php" style="text-decoration: none; font-family: Cooper Black;"><li>Outlets</li></a>
            </ul>
        </div>

<div class="col-md-9">
<h2 style="font-family: Arial;">Verified Stores</h2>

<?php

    $conn = new mysqli('localhost', 'root', '', 'fad_db');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from business where status='Verified'";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

?>

<form method="POST">
<div class="mycontainer">
  <table>
    <tr>
      <th>Phone</th>
      <th>Business Name</th>
      <th>Store Name</th>
      <th>Merchant Address</th>
      <th>City</th>
      <th>Outlets</th>
      <th>Name</th>
      <th>Email</th>
      <th>DTI Certificate</th>
      <th>Business Permit</th>
      <th>Form 9</th>
      <th>Form 13</th>
      <th>Form 49</th>
      <th>Valid ID</th>
      <th>Halal Certificate</th>
      <th>Status</th>
      <th>ACTION</th>
    </tr>
    <tr>
      <?php while($row = mysqli_fetch_assoc($res)){
        echo 
        "
          <td><input type='text' name='phone' value='".$row['phone']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['business_name']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['store_name']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['merchant_address']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['city']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['outlets']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['name']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['email']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><img src='data:image/gif;base64," . $row['dti_certificate'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['business_permit'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['form9'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['form13'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['form49'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['valid_id'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['halal_certificate'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><input type='text' value='".$row['status']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td>
          <a href='javascript:;' class='editAttr' data-toggle='modal' data-target='#edit_store' data-id='".$row['id']."' data-phone='".$row['phone']."' data-business_name='".$row['business_name']."' data-store_name='".$row['store_name']."' data-merchant_address='".$row['merchant_address']."' data-city='".$row['city']."' data-outlets='".$row['outlets']."' data-name='".$row['name']."' data-email='".$row['email']."' data-dti_certificate='".$row['dti_certificate']."' data-business_permit='".$row['business_permit']."' data-form9='".$row['form9']."' data-form13='".$row['form13']."' data-form49='".$row['form49']."' data-valid_id='".$row['valid_id']."' data-halal_certificate='".$row['halal_certificate']."' data-status='".$row['status']."' style='background-color: #24a0ed; border-radius: 5px; text-decoration: none; font-family: Times New Roman; font-weight: bold; color: white; text-align: center; width: 90px; display: block;'>EDIT</a>
          <a href='delete_users.php?delete2=".$row['id']."' style='background-color: #C70000; border-radius: 5px; text-decoration: none; font-family: Times New Roman; font-weight: bold; color: white; text-align: center; width: 90px; display: block;' role='button'>DELETE</a>
          </td>"; 
      ?>
    </tr>
    
<?php }echo "</table>
          </div>"; 
      }else{
        echo "<h2>No Record Found</h2>";
      }}
?>
</form>

<br>
<h2 style="font-family: Arial;">Not Verified Stores</h2>

<?php

    $conn = new mysqli('localhost', 'root', '', 'fad_db');
    if($conn->connect_error){
      echo 'Connection Failed: '.$conn->connect_error;
      }
    $sql="select * from business where status='Not Verified'";
    if($res = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($res) > 0){

?>

<form method="POST">
<div class="mycontainer">
  <table>
    <tr>
      <th>Phone</th>
      <th>Business Name</th>
      <th>Store Name</th>
      <th>Merchant Address</th>
      <th>City</th>
      <th>Outlets</th>
      <th>Name</th>
      <th>Email</th>
      <th>DTI Certificate</th>
      <th>Business Permit</th>
      <th>Form 9</th>
      <th>Form 13</th>
      <th>Form 49</th>
      <th>Valid ID</th>
      <th>Halal Certificate</th>
      <th>Status</th>
      <th>ACTION</th>
    </tr>
    <tr>
      <?php while($row = mysqli_fetch_assoc($res)){
        echo 
        "
          <td><input type='text' name='phone' value='".$row['phone']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['business_name']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['store_name']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['merchant_address']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['city']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['outlets']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['name']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><input type='text' value='".$row['email']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td><img src='data:image/gif;base64," . $row['dti_certificate'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['business_permit'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['form9'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['form13'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['form49'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['valid_id'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><img src='data:image/gif;base64," . $row['halal_certificate'] . "' width='100' height='110' class='gallery_pics'/></td>
          <td><input type='text' value='".$row['status']."' style='text-align: center; background: transparent; border: none;' disabled></td>
          <td>
          <a href='accept_applicants.php?acceptStore=".$row['id']."' style='background-color: #24ec93; border-radius: 5px; text-decoration: none; font-family: Times New Roman; font-weight: bold; color: white; text-align: center; width: 90px; display: block;' role='button'>ACCEPT</a>
          </td>"; 
      ?>
    </tr>
    
<?php }echo "</table>
          </div>"; 
      }else{
        echo "<h2>No Record Found</h2>";
      }}
?>
</form>
    </div>
    </div>

<script>
$(document).ready(function() {
  $('.gallery_pics').click(function(e) {
    // Change Selector Here
    $(this).toggleClass('fullscreen');
  });
});
</script>


<script>
    $('.editAttr').click(function() {
    var id = $(this).data('id');    
    var phone = $(this).data('phone');  
    var business_name = $(this).data('business_name');  
    var store_name = $(this).data('store_name');
    var merchant_address = $(this).data('merchant_address');
    var city = $(this).data('city');     
    var outlets = $(this).data('outlets');
    var name = $(this).data('name');
    var email = $(this).data('email');
    var dti_certificate = $(this).data('dti_certificate');
    var business_permit = $(this).data('business_permit');
    var form9 = $(this).data('form9');
    var form13 = $(this).data('form13');
    var form49 = $(this).data('form49');
    var valid_id = $(this).data('valid_id');
    var halal_certificate = $(this).data('halal_certificate');
    var status = $(this).data('status');

    $('#id').val(id);
    $('#phone').val(phone);    
    $('#business_name').val(business_name);  
    $('#store_name').val(store_name); 
    $('#merchant_address').val(merchant_address); 
    $('#city').val(city); 
    $('#outlets').val(outlets);
    $('#name').val(name); 
    $('#email').val(email);   
    $('#dti_certificate').val(dti_certificate);
    $('#business_permit').val(business_permit);  
    $('#form9').val(form9); 
    $('#from13').val(form13); 
    $('#form49').val(form49); 
    $('#valid_id').val(valid_id);
    $('#halal_certificate').val(halal_certificate);
    $('#status').val(status);

    } );
 </script>

<div id="edit_store" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title">Edit Store Information</h4>
                     <button type="button" class="close" data-dismiss="modal" style="border: none;">&times;</button>
                </div>  
                <div class="modal-body">  
                     <form method="post">  
                      <label>Phone Number</label>  
                      <input type="text" name="phone" value='' id="phone" class="form-control" /> <br />   
                      <label>Business Name</label>  
                      <input type="text" name="business_name" value='' id="business_name" class="form-control" />  <br /> 
                      <label>Store Name</label>  
                      <input type="text" name="store_name" value='' id="store_name" class="form-control" /> <br />
                      <label>Merchant Address</label>  
                      <input type="text" name="merchant_address" value='' id="merchant_address" class="form-control" /> <br />
                      <label>City</label>  
                      <input type="text" name="city" value='' id="city" class="form-control" /> <br />
                      <label>Outlets</label> 
                      <input type="text" name="outlets" value='' id="outlets" class="form-control" /> <br />
                      <label>Name</label> 
                      <input type="text" name="name" value='' id="name" class="form-control" /> <br />
                      <label>Email</label> 
                      <input type="text" name="email" value='' id="email" class="form-control" /> <br />
                      <label>DTI Certificate</label> 
                      <input type="text" name="dti_certificate" value='' id="dti_certificate" class="form-control" /> <br />
                      <label>Business Permit</label> 
                      <input type="text" name="business_permit" value='' id="business_permit" class="form-control" /> <br />
                      <label>Form 9</label> 
                      <input type="text" name="form9" value='' id="form9" class="form-control" /> <br />
                      <label>Form13</label> 
                      <input type="text" name="form13" value='' id="form13" class="form-control" /> <br />
                      <label>Form49</label> 
                      <input type="text" name="form49" value='' id="form49" class="form-control" /> <br />
                      <label>Valid ID</label> 
                      <input type="text" name="valid_id" value='' id="valid_id" class="form-control" /> <br />
                      <label>Halal Certificate</label> 
                      <input type="text" name="halal_certificate" value='' id="halal_certificate" class="form-control" /> <br />
                      <label>Status</label> 
                      <input type="text" name="status" value='' id="status" class="form-control" /> <br />
                      <input type="hidden" name="id" id="id" />
                      <div style="float: right;">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" name="submit" id="submit" class="btn" style="background-color: #FB8C00; color: white;">Save</button>
                      </div>  
                     </form>  
                </div>        
           </div>  
      </div>  
 </div>

<?php 

$db = mysqli_connect("localhost","root","","fad_db");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) 
{   
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $business_name = $_POST['business_name'];
    $store_name = $_POST['store_name'];
    $merchant_address = $_POST['merchant_address'];
    $city = $_POST['city'];
    $outlets = $_POST['outlets'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dti_certificate = $_POST['dti_certificate'];
    $business_permit = $_POST['business_permit'];
    $form9 = $_POST['form9'];
    $form13 = $_POST['form13'];
    $form49 = $_POST['form49'];
    $valid_id = $_POST['valid_id'];
    $halal_certificate = $_POST['halal_certificate'];
    $status = $_POST['status'];
  
    $sql = mysqli_query($db,"update business set phone='$phone', business_name='$business_name', store_name='$store_name', merchant_address='$merchant_address', city='$city', outlets='$outlets', name='$name', email='$email', dti_certificate='$dti_certificate', business_permit='$business_permit', form9='$form9', form13='$form13', form49='$form49', valid_id='$valid_id', halal_certificate='$halal_certificate', status='$status' where id='$id'");
  
    if($sql)
    {
        mysqli_close($db); // Close connection
        echo '<script type = "text/javascript">';
                echo 'alert("Updated Successfully!");'; 
                echo 'window.location.href = "stores.php";';
                echo '</script>';
        exit;
    }
    else
    {
        echo mysqli_error();
    }     
}

?>


</body>

</html>