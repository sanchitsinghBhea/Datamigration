<?php
if(!defined('sugarEntry'))
 define('sugarEntry',true);
 include_once('include/entryPoint.php');
 include_once('data/BeanFactory.php');
 global $db;
 echo "test";
 
$fileds="SELECT tsk.id,bt.bhea_investors_tasks_1bhea_investors_ida,tsk.name,tsk.contact_id,tsk_cstm.choose_module_c,at.accounts_tasks_1accounts_ida ,kt.bhea_investors_contacts_1bhea_investors_ida	
from temp_tasks as tsk 
join temp_tasks_cstm as tsk_cstm 
on tsk.id=tsk_cstm.id_c 
join temp_accounts_tasks_1_c at 
on at.accounts_tasks_1tasks_idb = tsk.id 
left join temp_bhea_investors_contacts_1_c kt 
on kt.bhea_investors_contacts_1contacts_idb=tsk.contact_id 
left join temp_bhea_investors_tasks_1_c as bt
on bt.bhea_investors_tasks_1tasks_idb=tsk.id
where tsk.id='2e08e42a-0315-11e7-8ef9-060c6f621ec1'"; 

$out=$db->query($fileds);
while($res=$db->fetchByAssoc($out)){
	echo nl2br("\n");

$id= $res['id'];
echo "Task investor id:".$res['bhea_investors_tasks_1bhea_investors_ida'];  //Task investor id
echo nl2br("\n");

$compnyId = $res['accounts_tasks_1accounts_ida'];      //company_id of task
echo "Task Compnay id:".$compnyId;
echo nl2br("\n");


$investorId=$res['bhea_investors_contacts_1bhea_investors_ida'];  // investor_id of Contact 
echo "Contact investor id:".$investorId;
echo nl2br("\n");


echo "Contact id:".$res['contact_id'];
echo nl2br("\n");


$ContactBean=BeanFactory::getBean('Contacts','864e6d0e-0dfa-11e7-9291-060c6f621ec1');
$ru=$ContactBean->account_id;	  //company id of contact
echo "Contact company id:".$ru;

if($ru != $compnyId)
{
	echo "Yes true!";	 
}else{
echo "Hi asyan";
	//~ echo "Hi";
	 //~ $TasksBean=BeanFactory::newBean('Tasks');
	//~ $TasksBean->name=$res['name'];
	//~ $TasksBean->id=$res['id'];
	//~ $TasksBean->new_with_id = true;
    //~ $TasksBean->contact_id=$res['contact_id']; 
	//~ $TasksBean->parent_type='Accounts';
	//~ $TasksBean->parent_id=$ru;
	//~ echo $TasksBean->id;
	//~ echo nl2br("\n");
	//~ echo $res['id'];
	//~ echo nl2br("\n");
	//~ echo $TasksBean->save();
	
}
}

?>

