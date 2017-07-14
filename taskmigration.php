<?php
if(!defined('sugarEntry'))
 define('sugarEntry',true);
 include_once('include/entryPoint.php');
 include_once('data/BeanFactory.php');
 global $db;

 
 
$fileds="SELECT tsk.id,tsk.parent_type,tsk.parent_id,tsk.name,bt.bhea_investors_tasks_1bhea_investors_ida
from temp_tasks as tsk 
join temp_tasks_cstm as tsk_cstm 
on tsk.id=tsk_cstm.id_c 
join temp_bhea_investors_tasks_1_c as bt
on bt.bhea_investors_tasks_1tasks_idb=tsk.id
where tsk.id='81c4c1c8-ed45-11e6-870c-060c6f621ec1' AND tsk.deleted=0 AND bt.deleted=0";

//join temp_accounts_tasks_1_c at 
//on at.accounts_tasks_1tasks_idb = tsk.id   company_id of Task
$out=$db->query($fileds);
while($res=$db->fetchByAssoc($out)){

echo nl2br("\n");
echo "Tasks".$res['id'];
echo nl2br("\n");
echo "Tasks Name".$res['name'];
echo nl2br("\n");
if($res['parent_type']=='Bhea_Investors')
{
	if($res['bhea_investors_tasks_1bhea_investors_ida'] == $res['parent_id']) //Checking the Task investor is equal or not with flex relate
	
	{
		echo "Yum";
		
	}
	else {
		
		echo "No Yum";
	}
	} else{
	
	echo "Not PASS";
}
echo nl2br("\n");
$inv=$res['bhea_investors_tasks_1bhea_investors_ida'];
echo "Investor id".$inv;

}
?>

