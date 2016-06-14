<?php
    require('../model/database.php');
    require('../model/quiztype_db.php');
    require('../model/quizdetail_db.php');
    
    if(isset($_GET['code'])){
        /*if(isset($_POST['next'])){
        
            $num = $_POST['num']+1;
            session_start();
            $quizType = $_SESSION['quizType'];
            $quizDetail = $_SESSION['quizQuests'][$num];
            $selectAns = $_POST['quizopt'];
            echo $num;
            $_SESSION['selectAns'][$_POST['num']]= $selectAns;
            
        } else if(isset($_POST['prev'])){
            $num = $_POST['num']-1;
            session_start();
            $quizType = $_SESSION['quizType'];
            $quizDetail = $_SESSION['quizQuests'][$num];
            
            $checkedAns1 = "unchecked";
            $checkedAns2 = "unchecked";
            $checkedAns3 = "unchecked";
            $checkedAns4 = "unchecked";
            echo $num;
            //echo $_SESSION['selectAns'][$num];
            if($_SESSION['selectAns'][$num] == 1){
                $checkedAns1 = "checked";
            }else if($_SESSION['selectAns'][$num] == 2){
                $checkedAns2 = "checked";
            }else if($_SESSION['selectAns'][$num] == 3){
                $checkedAns3 = "checked";
            }else if($_SESSION['selectAns'][$num] == 4){
                $checkedAns4 = "checked";
            }
        }else{*/
            $quizCode = $_GET['code'];
            $quizType = get_quiztype($quizCode);
            $quizDetails = get_quizdetail($quizCode);
            
            //session_start();
            //$_SESSION['quizType'] = $quizType;
            //$_SESSION['quizQuests'] = $quizDetails;
            $num = 0;
            echo $num;
            //$quizDetail = $quizDetails[$num];
        //}
    }  
    
?>

<?php include("../view/header.php") ?> 

<script>
    var num = 0;
    $(document).ready(function() {
        $("#quiz_main_0").show();
        //for(i=1;i<10;i++)
        //    $("#quiz_main_"+i).hide();
        
    });
    //$("#nextBtn_"+num).click(function(){
      //  alert("xxx");
        //$("#controlgroup").trigger('create');
        //$("#quiz_main_"+num).hide();
        //num=num+1;
        //$("#quiz_main_"+num).show();
        
    //});
    $('input[name="next"]').click(function(){
        if($("#ans1_"+num).is(":checked")){
            $("#checkopt_"+num).val("1");
        }else if($("#ans2_"+num).is(":checked")){
            $("#checkopt_"+num).val("2");
        }else if($("#ans3_"+num).is(":checked")){
            $("#checkopt_"+num).val("3");
        }else if($("#ans4_"+num).is(":checked")){
            $("#checkopt_"+num).val("4");
        }else{
            alert("select answer");
            return;
        }
        //$("#radio_1").attr('checked', 'checked');
        
        $("#quiz_main_"+num).hide();
        num=num+1;
        $("#quiz_main_"+num).show();
        
        if($(this).val() == "Finish"){
           $("#frm_final").submit();
        }
    });
    
    $('input[name="prev"]').click(function(){
        
        $("#quiz_main_"+num).hide();
        num=num-1;
        $("#quiz_main_"+num).show();
        
        if($("#checkopt_"+num).val() == "1"){
            $("#ans1_"+num).attr('checked', 'checked');
        }else if($("#checkopt_"+num).val() == "2")
            $("#ans2_"+num).attr('checked', 'checked');
        else if($("#checkopt_"+num).val() == "3")
            $("#ans3_"+num).attr('checked', 'checked');
        else if($("#checkopt_"+num).val() == "4")
            $("#ans4_"+num).attr('checked', 'checked');
    });
</script>
<div data-role="main" name="ui-content" class="ui-content">
    	<h3><?php echo $quizType['quizName'] ?></h3>
        
        <form method="post" id="frm_final" action="quiz_final.php?code=<?php echo $quizCode ?>&name=<?php echo $quizType['quizName'] ?>">
        <?php foreach($quizDetails as $idx => $quizDetail) { ?>
            <div id="quiz_main_<?php echo $idx ?>" style="display:none">
            
            <input type="hidden" name="num" id="num_<?php echo $idx ?>" value="<?php echo $idx ?>">
            <input type="hidden" name="no" value="<?php echo $quizDetail['quizNo'] ?>">
            <input type="hidden" name="ans_<?php echo $idx ?>" value="<?php echo $quizDetail['quizAns'] ?>">
            <input type="hidden" name="checkopt_<?php echo $idx ?>" id="checkopt_<?php echo $idx ?>" value="0">
            
            <fieldset data-role="controlgroup">
                <legend><?php echo ($idx+1).'. '.$quizDetail['quizQuest'] ?></legend>
                <label for="ans1_<?php echo $idx ?>"><?php echo $quizDetail['quizOpt1'] ?></label>
                <input type="radio" name="quizopt_<?php echo $idx ?>" id="ans1_<?php echo $idx ?>" value="1">
                <label for="ans2_<?php echo $idx ?>"><?php echo $quizDetail['quizOpt2'] ?></label>
                <input type="radio" name="quizopt_<?php echo $idx ?>" id="ans2_<?php echo $idx ?>" value="2">
                <label for="ans3_<?php echo $idx ?>"><?php echo $quizDetail['quizOpt3'] ?></label>
                <input type="radio" name="quizopt_<?php echo $idx ?>" id="ans3_<?php echo $idx ?>" value="3">
                <label for="ans4_<?php echo $idx ?>"><?php echo $quizDetail['quizOpt4'] ?></label>
                <input type="radio" name="quizopt_<?php echo $idx ?>" id="ans4_<?php echo $idx ?>" value="4">	
            </fieldset>
            
            <?php if($idx > 0) { ?>
            <input type="button" data-inline="true" name="prev" value="Prev">
            <?php } ?>
            <?php if($idx == 1) { ?>
            <input type="button" data-inline="true" name ="next" value="Finish" data-theme="b">
            <?php }else{ ?>
            <input type="button" data-inline="true" name ="next" value="Next" data-theme="b">
            <?php } ?>
            </div>
        <?php } ?>
        </form>
        
  </div>
  
<?php include("../view/footer.php") ?> 


