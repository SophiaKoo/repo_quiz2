<?php include("../view/header.php") ?> 
<?php
    require('../model/database.php');
    require('../model/member_db.php');
    
    session_start();
    $member = get_member_by_id($_SESSION['memberid']);
    
    if(isset($_POST['submit'])){
        //echo 'submit_form";
        $passwd = $_POST['confirm'];
           
        $rows = update_member_pswd($_SESSION['memberid'], $passwd);
        
        if($rows){
            echo '<script>alert("saved successfully");</script>';
            //$member = get_member_by_id($_SESSION['memberid']);
        }else{
            include("../errors/error.php");
        }
    }
?>

<script>
    $('#btnSubmit').click(function(){
        if($('#oldpass').val() != ''){
        if($('#oldpass').val() != '<?php echo $member['passwd'] ?>'){
            alert("Your old password is not match.");
            return;
        }
        
        if($('#newpass').val() != $('#confirm').val()){
            alert("Make sure your new password.");
            return;
        }
        }
        //$('#frm').submit();
    });
</script>

   <div data-role="main" class="ui-content" style="clear: both">
    <h3>Password Change</h3>
  	<div data-role="fieldcontain" class="ui-hide-label"	>
            <form method="post" action="" id="frm" name="frm" >
            <fieldset data-role="controlgroup" style="padding: 10px; border: 3px solid #75AE18; border-radius:15px" >
                <input type="text" style="margin-bottom: 5px" name="oldpass" id="oldpass" placeholder="Old Password" required/>
                <input type="text" style="margin-bottom: 5px" name="newpass" id="newpass" placeholder="New Password" required/>
                <input type="text" style="margin-bottom: 5px" name="confirm" id="confirm" placeholder="Confirm Password" required/>
					
		<input type="submit" id="btnSubmit" name="submit" value="Submit" data-theme="b" class="ui-corner-all"/>
            </fieldset>
            </form>
	</div>
  </div>
  
<?php include("../view/footer.php") ?> 