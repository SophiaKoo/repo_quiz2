<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Youngjin & Hyujun's Quiz</title>
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <link rel="stylesheet" href="../styles/main.css">
</head>
<body>

<div data-role="page">
  <div data-role="header" class="main-header">
  	<h1>Youngjin & Hyujun's Quiz</h1>
  </div>

   <div data-role="main" class="ui-content" style="clear: both">
    	<h3>Error</h3>
        <p><?php echo $error; ?></p>
        <?php if(!isset($_SESSION['fname'])) {?>
        <a href="../index.php"> Log In</a>
        <?php } ?>
  </div>
  
  <div data-role="footer" >
    <h1>&copy; Copyright  by youngjin & hyunju</h1>
  </div>
</div>

</body>
</html>
