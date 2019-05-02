<?php
include('condb.php');

	session_start();
	$ccon = "SELECT * FROM ecu_member WHERE c_id = '".@$_SESSION['UserID']."'";
	$objQuery = mysqli_query($con,$ccon);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <title><i class="fas fa-cloud-moon"></i> ECU SHOP</title>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>     
    </ul>
  </div>

    

  <ul class="nav navbar-nav navbar-right">
  <li class="">
      <?php if($objResult["c_level"] == "a") { echo '<li><a href="">',$objResult["c_name"],"</a></li>", 
	'<li><a href="logout.php"> Logout</a></li>'; } else { ?>
      <li><a class="nav-link" href="login.php"> Login <span class="sr-only">(current)</span></a></li>
      <?php } ?>
      </ul>
      </li>

</nav>