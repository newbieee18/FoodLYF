<?php
session_start();
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
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
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="css/bootstrap.rtl.css" rel="stylesheet" type="text/css" />
  <link href="css/bootstrap-grid.css" rel="stylesheet" type="text/css" />
  <link href="css/bootstrap-grid.rtl.css" rel="stylesheet" type="text/css" />
  <link href="css/bootstrap-utilities.css" rel="stylesheet" type="text/css" />
  <link href="css/bootstrap-utilities.rtl.css" rel="stylesheet" type="text/css" />
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>



  <style>
    body {
      width: 100%;
      height: auto;
      font-family: Cooper Black;
    }

    table {
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

    .mycontainer {
      overflow: auto;
      box-shadow: 0 0 20px rgba(1, 1, 1, 0.1);
      border-radius: 10px;
      border: 1px solid black;
    }

    .mycontainer::-webkit-scrollbar {
      height: 10px;
      border-radius: 10px;
    }

    .mycontainer::-webkit-scrollbar-track {
      border-radius: 10px;
      webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    .mycontainer::-webkit-scrollbar-thumb {
      border-radius: 10px;
      background-color: #E05D5D;
      webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }


    tr:nth-child(even) {
      background-color: #64C9CF;
    }

    .modal label {
      color: #FB8C00;
    }

    .modal input[type=text] {
      font-family: Arial;
    }
  </style>


</head>

<body>

  <header class="mt-0 pt-0">
    <div class="bg-cover clearfix pt-3">
      <a href="adminDashboard.php"><img src="img/logo.png" width="150px" height="150px" style="border-radius: 50%;"></a><br>
      <h2><a href="adminDashboard.php" class="logoo" style="text-decoration: none; font-size: 75px; font-family: chosen_font; color: #FB8C00; overflow: hidden;"><b>FoodLYF</b></a></h2>

      <div class="ml-0 mr-0 pb-1">
        <nav class="navbar navbar-expand-md">
          <button class="navbar-toggler ml-auto" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" onclick="myFunction(this)" aria-label="Toggle navigation" style="width: 100%; float: none; margin-right: 0; outline: none; box-shadow: none;">
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
              if (isset($_SESSION['id']) != "") {

                echo  "<li class='nav-item'>
                                <a class='nav-link' href='#' style='background: #64C9CF;'>HELLO " . $_SESSION['id'] . "</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='logout.php' style='background: #FB8C00;'>LOGOUT</a>
                            </li>";
              } else {
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

  <div class="row" style="max-width: 100%;">

    <div class="offset-3 col-md-9" style="">
      <div class="row">
        <div class="col-10 d-flex align-items-center">
          <h2 style="font-family: Arial;">Announcements</h2>
        </div>
        <div class="col-2">
          <button type="button" onclick="addAnnouncement()" class="btn btn-default btn-lg border fs-3">+</button>
        </div>
      </div>
      <?php

      $conn = new mysqli('localhost', 'root', '', 'fad_db');
      if ($conn->connect_error) {
        echo 'Connection Failed: ' . $conn->connect_error;
      }
      $sql = "select * from announcements";
      if ($res = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($res) > 0) {

      ?>

          <form method="POST">
            <div class="mycontainer">
              <table id="tb">
                <tr>
                  <th>ANNOUNCEMENTS</th>
                  <th>ACTION</th>
                </tr>
                <tr>
                  <?php while ($row = mysqli_fetch_assoc($res)) {
                    echo
                    "
          <td><input type='text' name='announcement' value='" . $row['announcement'] . "' style='text-align: center; background: transparent; border: none; width: 100%;' disabled></td>
          <td><center>          
          <a href='javascript:;' class='editAttr' data-toggle='modal' data-target='#edit_announcement' data-id='" . $row['id'] . "' data-announcement='" . $row['announcement'] . "' style='background-color: #24a0ed; border-radius: 5px; text-decoration: none; font-family: Times New Roman; font-weight: bold; color: white; text-align: center; width: 90px; display: block;'>EDIT</a>
          <a href='?delete=" . $row['id'] . "' style='background-color: #C70000; border-radius: 5px; text-decoration: none; font-family: Times New Roman; font-weight: bold; color: white; text-align: center; width: 90px; display: block;' role='button'>DELETE</a></center>
          </td>";
                  ?>
                </tr>

          <?php }
                  echo "</table>
          </div>";
                } else {
                  echo "<h2>No Record Found</h2>";
                }
              }
          ?>
          </form>

    </div>
  </div>

  <script>
    $('.editAttr').click(function() {
      var id = $(this).data('id');
      var announcement = $(this).data('announcement');

      $('#id').val(id);
      $('#announcement').val(announcement);
    });
  </script>

  <div id="edit_announcement" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Announcement</h4>
          <button type="button" class="close" data-dismiss="modal" style="border: none;">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post">
            <label>Announcement</label>
            <input type="text" name="announcement" value='' id="announcement" class="form-control" /> <br />
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

  $db = mysqli_connect("localhost", "root", "", "fad_db");

  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $announcement = $_POST['announcement'];

    $sql = mysqli_query($db, "update announcements set announcement='$announcement' where id='$id'");

    if ($sql) {
      mysqli_close($db); // Close connection
      echo '<script type = "text/javascript">';
      echo 'alert("Updated Successfully!");';
      echo 'window.location.href = "announcements.php";';
      echo '</script>';
      exit;
    } else {
      echo mysqli_error();
    }
  }

  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    //$announcement = $_POST['announcement'];

    $sql = mysqli_query($db, "DELETE FROM announcements WHERE id='$id'");

    if ($sql) {
      mysqli_close($db); // Close connection
      echo '<script type = "text/javascript">';
      echo 'alert("Updated Successfully!");';
      echo 'window.location.href = "announcements.php";';
      echo '</script>';
      exit;
    } else {
      echo mysqli_error();
    }
  }

  ?>


</body>

<div class="modal fade" id="addAnnouncement">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Announcement</h4>
        <button type="button" class="close" data-dismiss="modal" style="border: none;">&times;</button>
      </div>
      <div class="modal-body">
        <label for="announcement">Announcement</label>
        <textarea name="_announcement" id="_announcement" class="form-control w-100" rows="5"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" name="addAnnouncement" id="btnAdd" class="btn" style="background-color: #FB8C00; color: white;">Save</button>
      </div>
    </div>
  </div>
</div>


<?php

// if(isset($_POST['addAnnouncement']))
// {
//   $content = htmlspecialchars($_POST['_announcement']);
//   $add_sql = "INSERT INTO announcements (announcement) VALUES ('$content')" or die(mysqli_error());

//   $add_query = $db->query($add_sql);

//   if(!$add_query)
//   {
//     echo $db->error;
//   }
//   else
//   {
//     $id = mysqli_insert_id($db);
//     echo "<p class='text-center position-absolute top-0 start-0 end-0 alert alert-success'>Successfully added an announcement</p>";

//     echo
//                   "
//         <td><input type='text' name='announcement' value='" . $content . "' style='text-align: center; background: transparent; border: none; width: 100%;' disabled></td>
//         <td><center>          
//         <a href='javascript:;' class='editAttr' data-toggle='modal' data-target='#edit_announcement' data-id='" . $id . "' data-announcement='" . $content . "' style='background-color: #24a0ed; border-radius: 5px; text-decoration: none; font-family: Times New Roman; font-weight: bold; color: white; text-align: center; width: 90px; display: block;'>EDIT</a>
//         <a href='?delete=" . $id . "' style='background-color: #C70000; border-radius: 5px; text-decoration: none; font-family: Times New Roman; font-weight: bold; color: white; text-align: center; width: 90px; display: block;' role='button'>DELETE</a></center>
//         </td>";
//   }

// }

?>

<script>
  const addAnnouncement = () => {
    $("#addAnnouncement").modal('show');
  }

  $(() => {
    setTimeout(() => {
      $(".alert").fadeOut("slow");
    }, 5000);

    $("#btnAdd").click(() => {
      var announcement = $("#_announcement").val();

      if (announcement == "") {
        alert("Please input an announcement");
      } else {
        var td = $("#tbody");
        $.ajax({
          url: 'add_announcement.php',
          type: 'post',
          data: {
            announcement:announcement
          },
          dataType:'json',
          success: (data) => {
            if(data != 0)
            {
              var html = "<tr><td><input type='text' name='announcement' value='" +data.content+ "' style='text-align: center;"+ "background: transparent; border: none; width: 100%;' disabled></td>"+
          "<td><center>"+          
          "<a href='javascript:;' class='editAttr' data-toggle='modal' data-target='#edit_announcement' data-id='" + data.id + "'"+"data-announcement='" +data.content+ "' style='background-color: #24a0ed; border-radius: 5px; text-decoration: "+"none; font-family: Times New Roman; font-weight: bold; color: white; text-align: center; width: 90px; display: block;"+"'>EDIT</a>"+
          "<a href='?delete=" +data.id+ "' style='background-color: #C70000; border-radius: 5px; text-decoration: none; "+"font-family: Times New Roman; font-weight: bold; color: white; text-align: center; width: 90px; display: block;' "+"role='button'>DELETE</a></center>"+
          "</td></tr>";
            $("#tb").append(html).fadeIn();

            $("#_announcement").val("");
            $("#addAnnouncement").modal('hide');
            }
            else
            {
              alert("Unexpected error occurred");
            }
          }
        });
      }

    });


  })
</script>


</html>