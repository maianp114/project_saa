<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

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
  <a class="navbar-brand" href="index.php"><img src="https://www.ecu-shop.com/wp-content/uploads/2019/02/ecu-logo-alt.png" style=" max-height: 50px; "></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
      </li>     
    </ul>
  </div>

    

  <ul class="nav navbar-nav navbar-right">
  <li class="">
      <?php if($objResult["c_level"] == "a") { echo '<a class="nav-link">',$objResult["c_name"],"</a>", 
	'<li><a class="nav-link" href="logout.php">&nbsp;&nbsp;    <i class="fas fa-sign-out-alt"></i> Logout</a></li>'; } else { ?>
      <li><a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
      <?php } ?>
      </ul>
      </li>

</nav>