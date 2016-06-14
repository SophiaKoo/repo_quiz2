<?php
    require('model/database.php');
    require('model/quiztype_db.php');
    require('model/member_db.php');
    
    $quizTypes = get_quiztypes();
    
    if(isset($_POST['action'])){
        $action = $_POST['action'];
    
        if($action == "get_member"){
            //echo "in get member";
            $member = get_member($_POST['email'], $_POST['passwd']);
            //echo $member[memberID];

            if (! $member){ //FAIL
                //echo "not member";
                $errmsg = "The email and password you entered did not match our records.";
            }else{
                session_start();
                $_SESSION['fname'] = $member['firstName'];
                $_SESSION['memberid'] = $member['memberID'];
                header("Location: account/account.php");
                //echo "is member";
                //exit();
                //echo "<script>window.location.replace(account/account.php);</script>";
            }
        }
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
        
        if($action == "logout"){
            session_start();
            // remove all session variables
            session_unset(); 

            // destroy the session 
            session_destroy(); 

        }
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Youngjin & Hyujun's Quiz</title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <link rel="stylesheet" href="styles/main.css">
        
    </head>
    <body>
        
        <div data-role="page">
	<header data-role="header" class="index-header" ></header>
	<section data-role="content">
        <section class="ui-grid-a">
            <div class="ui-block-a" style="width:38%;margin-right: 2%">
            	<h1>Youngjin & Hyunju's Quiz Place</h1>
                <p>MAD3134 and MAD3144 Assignment</p>
                <p class="intro"><strong style="color: #56A00E">Welcome.</strong> You can take tests</p>

                <ul data-role="listview" data-inset="true" data-theme="a">
                        <li data-role="list-divider" class="list-divider">Overview</li>
                        <?php foreach ($quizTypes as $quizType) : ?>
                        <li><?php echo $quizType['quizName']?></li>
                        <?php endforeach; ?>
                </ul>	           			
            </div>
            <div class="ui-block-b" style="width:60%">
                <div data-role="fieldcontain" class="ui-hide-label"	>
                    <form action="" method="post" name="login_form" id="login_form">
                        <input type="hidden" name="action" value="get_member" />
                        <fieldset data-role="controlgroup" style="padding: 10px; border: 3px solid #75AE18; border-radius:15px">
                            <input type="text" name="email" id="email" value="" placeholder="Email" required/>
                            <input type="password" name="passwd" id="passwd" placeholder="Password" required/>
                            <?php if(isset($errmsg)){?>
                            <span style="color: blue; padding-left: 10px "><?php echo $errmsg ?></span>
                            <?php } ?>
                            <button name="login" value="Log In" style="background-color: #cc0000;color:#FFFFFF;">Log In</button>
                        </fieldset>
                    </form>
                </div>
                <div data-role="fieldcontain" class="ui-hide-label"	>
                    <form action="account/account.php" method="post" name="signup_form" id="signup_form">
                        <input type="hidden" name="action" value="add_member" />
                        <fieldset data-role="controlgroup" style="padding: 10px; border: 3px solid #75AE18; border-radius:15px">
                            <input type="text" style="margin-bottom: 5px" name="fname" id="fname" value="" placeholder="First Name" required/>
                            <input type="text" style="margin-bottom: 5px" name="lname" id="lname" value="" placeholder="Last Name" required/>
                            <input type="text" style="margin-bottom: 5px" name="email" id="email" value="" placeholder="Email" required/>
                            <input type="text" style="margin-bottom: 5px" name="phone" id="phone" value="" placeholder="Phone"/>
                            <input type="text" style="margin-bottom: 5px" name="addr" id="addr" value="" placeholder="Address"/>
                            <input type="password" style="margin-bottom: 5px" name="passwd" id="passwd" value="" placeholder="Password" required/>
                            <input type="password" style="margin-bottom: 5px" name="cfmpasswd" id="cfmpasswd" value="" placeholder="Confirm Password" required/>

                            <!--input type="submit" name="submit" value="Sign Up" data-theme="f"  class="ui-corner-all"/-->
                            <button value="Sign Up" style="background-color: #f69c55">Sign Up</button>

                        </fieldset>
                    </form>
                </div>              
            </div>
        </section>
    </section>
    
	<div data-role="footer" data-theme="a" style="text-align: center">
			<p>&copy; Copyright  by youngjin & hyunju</p>
	</div>

</div>
    </body>
</html>
