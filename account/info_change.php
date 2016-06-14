<?php
    require('../model/database.php');
    require('../model/member_db.php');
    
    session_start();
    $member = get_member_by_id($_SESSION['memberid']);
    
    if(isset($_POST['submit'])){
        //echo "submit_form";
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $addr = $_POST['addr'];
           
        $rows = update_member_info($_SESSION['memberid'], $email, $fname, $lname, $phone, $addr);
        
        if($rows){
            $msg = "saved successfully";
            $member = get_member_by_id($_SESSION['memberid']);
        }else{
            include("../errors/error.php");
        }
    }
?>

<?php include("../view/header.php") ?> 

<div data-role="main" class="ui-content" style="clear: both">
    <h3>Information Change</h3>
    <div data-role="fieldcontain" class="ui-hide-label"	>
        <form action="" method="post" name="submit_form" id="submit_form">
            <fieldset data-role="controlgroup" style="padding: 10px; border: 3px solid #75AE18; border-radius:15px">
                <input type="text" name="fname" id="fname" value="<?php echo $member['firstName']?>" placeholder="First Name" required/>
                <input type="text" name="lname" id="lname" value="<?php echo $member['lastName']?>" placeholder="Last Name" required/>
                <input type="text" name="email" id="email" value="<?php echo $member['email']?>" placeholder="Email" required/>
                <input type="text" name="phone" id="phone" value="<?php echo $member['phone']?>" placeholder="Phone"/>
                <input type="text" name="addr" id="addr" value="<?php echo $member['address']?>" placeholder="Address"/>
                <?php if(isset($msg)) { ?>
                <p style="color:red; text-align: center"><?php echo $msg ?></p>
                <?php } ?>
                <input type="submit" name="submit" value="Submit" data-theme="b" class="ui-corner-all"/>
            </fieldset>
        </form>
    </div>
</div>
  
<?php include("../view/footer.php") ?> 
