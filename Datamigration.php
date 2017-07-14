<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'password';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
    mysql_select_db('backup');
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = "SELECT tsk.name,bt.bhea_investors_tasks_1bhea_investors_ida from tasks as tsk 
join tasks_cstm as tsk_cstm 
on tsk.id=tsk_cstm.id_c 
join bhea_investors_tasks_1_c as bt
on bt.bhea_investors_tasks_1tasks_idb=tsk.id";
  
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' .mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      echo "EMP ID :{$row['name']}  <br> ".
         "EMP NAME : {$row['bhea_investors_tasks_1bhea_investors_ida']} <br> ";
   }
   
   echo "Fetched data successfully\n";
   
   
   mysql_close($conn);
?>
