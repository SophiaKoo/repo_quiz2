<?php
    require('../model/database.php');
    require('../model/record_db.php');
    
    session_start();
    $records = get_record($_SESSION['memberid']);
    
    
?>
<?php include("../view/header.php") ?> 

   <div data-role="main" class="ui-content" style="clear: both">
    	<h3><?php echo $_SESSION['fname']?>'s Record</h3>
        <table data-role="table" class="ui-responsive ui-shadow" id="myTable">
      <thead>
        <tr>
          <th>No.</th>
          <th>Time</th>
          <th>Quiz Type</th>
          <th>Score(/10)</th>
        </tr>
      </thead>
      <tbody>
          <?php if(!$records) {?>
          <tr><td colspan="4" style="text-align: center">NO RECORD</td></tr>
            <?php } ?>
        <?php foreach($records as $idx => $record) { ?>
        <tr>
          <td><?php echo $idx+1 ?></td>
          <td><?php echo $record['regDate']?></td>
          <td><?php echo $record['quizName'] ?></td>
          <td><?php echo $record['quizScore'] ?></td>
        </tr>
          <?php } ?>
      </tbody>
    </table>
  </div>
  
  <div data-role="footer" >
    <h1>&copy; Copyright  by youngjin & hyunju</h1>
  </div>
</div>
