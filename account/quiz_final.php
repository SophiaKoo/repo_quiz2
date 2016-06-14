<?php
    require('../model/database.php');
    require('../model/record_db.php');
    
    if(isset($_GET['code'])){
        //echo $_GET['code'];
        $type = $_GET['code'];
        $typename = $_GET['name'];
        $score = 0;
        for($idx=0; $idx<2; $idx++){
            //echo "check = ".$_POST['checkopt_'.$idx];
            //echo "answer".$_POST['ans_'.$idx];
            if($_POST['checkopt_'.$idx] == $_POST['ans_'.$idx]){
                $score++;
            }
        }
        
        if($score < 8){
            $msg = "Unfortunately you did not pass the test. Please try again later!";
        }else {
            $msg = "You have successfully passes the test. You are now certified in ".$typename.".";
        }
        session_start();
        add_record($_SESSION['memberid'], $type, $score) ;
    }
    
?>
<?php include("../view/header.php") ?>

   <div data-role="main" class="ui-content" style="clear: both">
       <section data-role="content">
           <h3><?php echo $typename ?></h3>
           <section class="ui-grid-a">
               <div class="ui-block-a" style="width:40%;">

                   <img src="../images/<?php echo $type ?>.jpeg"/>	           			
               </div>
               <div class="ui-block-b" style="width:60%">
                   <h3 style="color:blue">Your score is <?php echo $score ?>/10</h3>
                   <p><?php echo $msg ?></p>
                   <?php if($score < 8) { ?>
                   <a href="quiz_main.php?code=<?php echo $type ?>" data-role="button" data-inline="true" data-theme="b">Retry</a>
                   <?php } ?>
                   <!--input type="submit" data-inline="true" value="Score Detail" data-theme="b"-->
                   
               </div>
               </div>
           </section>
       </section>

	    
  </div>
  
  <?php include("../view/footer.php") ?> 

