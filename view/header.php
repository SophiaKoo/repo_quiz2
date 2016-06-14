<?php
clearstatcache();
session_start();
$username = $_SESSION['fname'];
//echo $username;
if(!isset($username)){
    $error = "You need to login";
    include('../errors/error.php');
}   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        
	<title>Youngjin & Hyujun's Quiz</title>
	<!--link rel="stylesheet"  href="http://demos.jquerymobile.com/1.1.2/css/themes/default/jquery.mobile-1.1.2.css" />
	<link rel="stylesheet" href="http://demos.jquerymobile.com/1.1.2/docs/_assets/css/jqm-docs.css" />
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
	<script src="http://demos.jquerymobile.com/1.1.2/docs/_assets/js/jqm-docs.js"></script>
	<script src="http://demos.jquerymobile.com/1.1.2/js/jquery.mobile-1.1.2.js"></script-->
	
	<!--link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<!--script src="http://code.jquery.com/jquery-1.11.3.min.js"></script-->
	<!--script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script-->
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <link rel="stylesheet" href="../styles/main.css">
</head>
<body>

<div data-role="page">
  <div data-role="header" style="color:#ffffff;text-shadow:0 1px 1px #335413;font-weight:bold;border:1px solid #56A00E;background-color: #75AE18">
    <?php if(!strrpos($_SERVER["REQUEST_URI"],"account.php")) { ?>
      <a href="/pearl/account/account.php" data-role="button">Home</a>
    <?php } ?>  
    <h1>Youngjin & Hyujun's Quiz</h1>
    <!--<a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">Search</a>-->
    <div data-role="controlgroup" data-type="horizontal" class="ui-btn-right">
        <a href="#popupMenu" data-rel="popup" data-role="button" data-inline="true" data-transition="fade"><?php echo $username ?></a>
        <a href="/pearl/account/record.php" data-inline="true" data-role="button">Record</a>
        <a href="/pearl/index.php?action=logout" data-inline="true" data-role="button">Logout</a>
    </div>
    <div data-role="popup" id="popupMenu" data-overlay-theme="e">
        <ul data-role="listview" data-inset="true" style="width:250px;" data-theme="a">
            <li><a href="/pearl/account/info_change.php">Information Change</a></li>
            <li><a href="/pearl/account/passwd_change.php">Password Channge</a></li>
        </ul>
    </div>
  </div>