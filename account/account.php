<?php
require('../model/database.php');
require('../model/quiztype_db.php');
require('../model/member_db.php');

$quizTypes = get_quiztypes();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}
//echo $action;
if ($action == 'add_member') {
    
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];
    $passwd = $_POST['passwd'];
//echo $email;
    // Validate the inputs
    if (empty($email) || empty($fname) || empty($lname) || empty($passwd)) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $row = add_member($email, $passwd, $fname, $lname, $phone, $addr);
        if($row <= 0){
           include('../errors/error.php');
        }
        // Display the Product List page for the current category
        //header("Location: ../index.php");
    }
}
?>

  <?php include("../view/header.php") ?> 

   <div data-role="main" class="ui-content" style="clear: both">
    <h3>Select Type of Quiz</h3>
  	<ul data-role="listview" data-inset="true" data-theme="d">
            <?php foreach ($quizTypes as $quizType) : ?>
            <li><a href="/pearl/account/quiz_main.php?code=<?php echo $quizType['quizCode']?>"><img src="/pearl/images/<?php echo $quizType['quizCode']?>.jpeg"/>
                    <h3><?php echo $quizType['quizName']?></h3></a></li>
            <?php endforeach; ?>
        </ul>
  </div>
  
  <?php include("../view/footer.php") ?> 