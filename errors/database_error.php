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
    	<h1>Database Error</h1>
            <p>There was an error connecting to the database.</p>
            <p>The database must be installed as described in the appendix.</p>
            <p>MySQL must be running as described in chapter 1.</p>
            <p>Error message: <?php echo $error_message; ?></p>
            <p>&nbsp;</p>
  </div>
  
  <div data-role="footer" >
    <h1>&copy; Copyright  by youngjin & hyunju</h1>
  </div>
</div>

</body>
</html>
