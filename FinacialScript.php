<?php
if(!defined('sugarEntry'))
 define('sugarEntry',true);
 include_once('include/entryPoint.php');
 include_once('data/BeanFactory.php');
 global $db;
 echo "test";
 
$fileds="SELECT acc.id,acc.name,acc_cstm.base_rate,acc_cstm.financials_updated_on_c,acc_cstm.year_for_revenue_c,acc_cstm.capex_lfy1_c,acc_cstm.capex_lfy_c,acc_cstm.cash_c,acc_cstm.cash_conversion_lfy1_c,acc_cstm.cash_conversion_lfy_c,acc_cstm.cfo_lfy1_c,acc_cstm.cfo_lfy2_c,acc_cstm.currency_id,acc_cstm.ebitda_c,acc_cstm.ebitda_fy1_c,acc_cstm.ebitda_fy2_c,acc_cstm.ebitda_lfy1_c,acc_cstm.ebitda_lfy_c,acc_cstm.ebitda_ltm_c,acc_cstm.ebitda_margin_fy1_c,acc_cstm.ebitda_margin_fy2_c,acc_cstm.ebitda_margin_fy3_c,acc_cstm.enterprise_value_c,acc_cstm.ev_ebitda_fy1_c,acc_cstm.ev_ebitda_fy2_c,acc_cstm.ev_ebitda_ltm_c,acc_cstm.ev_revenue_fy1_c,acc_cstm.ev_revenue_fy2_c,acc_cstm.ev_revenue_ltm_c,acc_cstm.grossprofit__c,acc_cstm.mkt_cap_c,acc_cstm.netprofit_c,acc_cstm.net_debt_c,acc_cstm.net_income_fy1_c,acc_cstm.net_income_fy2_c,acc_cstm.net_income_ltm_c,acc_cstm.net_worth_c,acc_cstm.other_details_c,acc_cstm.pat_margin_fy1_c,acc_cstm.pat_margin_fy2_c,acc_cstm.pat_margin_ltm_c,acc_cstm.pe_fy1_c,acc_cstm.pe_fy2_c,acc_cstm.pe_ltm_c,acc_cstm.revenue_fy1_c,acc_cstm.revenue_fy2_c,acc_cstm.revenue__c,acc_cstm.revenue_lfy_c,acc_cstm.revenue_ltm_c,acc_cstm.ttm_date_c,acc_cstm.year_ending_c,acc_cstm.year_ending_c,acc_cstm.financials_source_c,acc_cstm.ciq_name_c from temp_accounts as acc join temp_accounts_cstm as acc_cstm on acc.id=acc_cstm.id_c";
$output12=$db->query($fileds);
//$row=$db->fetchByAssoc($output12);
//~ echo $output12;
  while($row=$db->fetchByAssoc($output12)){
echo nl2br("\n");

$financialBean=BeanFactory::newBean('avds1_Financial');
//~ print_r ($financialBean);
 //~ 
//~ $now = new DateTime();
//~ $year = $now->format("Y");
$financialBean->name=$row['name']."_".$row['year_for_revenue_c'];
$financialBean->base_rate=$row['base_rate'];
$financialBean->capex_lfy1_c=$row['capex_lfy1_c'];
$financialBean->capex_lfy_c=$row['capex_lfy_c'];
$financialBean->cash_c=$row['cash_c'];
$financialBean->cash_conversion_lfy1_c=$row['cash_conversion_lfy1_c'];
$financialBean->cash_conversion_lfy_c=$row['cash_conversion_lfy_c'];
$financialBean->cfo_lfy1_c=$row['cfo_lfy1_c'];
$financialBean->cfo_lfy2_c=$row['cfo_lfy2_c'];
$financialBean->currency_id=$row['currency_id'];
$financialBean->ebitda_c=$row['ebitda_c'];
$financialBean->ebitda_fy1_c=$row['ebitda_fy1_c'];
$financialBean->ebitda_fy2_c=$row['ebitda_fy2_c'];
$financialBean->ebitda_lfy1_c=$row['ebitda_lfy1_c'];
$financialBean->ebitda_lfy_c=$row['ebitda_lfy_c'];
$financialBean->ebitda_ltm_c=$row['ebitda_ltm_c'];
$financialBean->ebitda_margin_fy1_c=$row['ebitda_margin_fy1_c'];
$financialBean->ebitda_margin_fy2_c=$row['ebitda_margin_fy2_c'];
$financialBean->ebitda_margin_fy3_c=$row['ebitda_margin_fy3_c'];
$financialBean->enterprise_value_c=$row['enterprise_value_c'];
$financialBean->ev_ebitda_fy1_c=$row['ev_ebitda_fy1_c'];
$financialBean->ev_ebitda_fy2_c=$row['ev_ebitda_fy2_c'];
$financialBean->ev_ebitda_ltm_c=$row['ev_ebitda_ltm_c'];
$financialBean->ev_revenue_fy1_c=$row['ev_revenue_fy1_c'];
$financialBean->ev_revenue_fy2_c=$row['ev_revenue_fy2_c'];
$financialBean->ev_revenue_ltm_c=$row['ev_revenue_ltm_c'];
$financialBean->grossprofit_c=$row['grossprofit__c'];
$financialBean->mkt_cap_c=$row['mkt_cap_c'];
$financialBean->netprofit_c=$row['netprofit_c'];
$financialBean->net_debt_c=$row['net_debt_c'];
$financialBean->net_income_fy1_c=$row['net_income_fy1_c'];
$financialBean->net_income_fy2_c=$row['net_income_fy2_c'];
$financialBean->net_income_ltm_c=$row['net_income_ltm_c'];
$financialBean->net_worth_c=$row['net_worth_c'];
$financialBean->other_details_c=$row['other_details_c'];
$financialBean->pat_margin_fy1_c=$row['pat_margin_fy1_c'];
$financialBean->pat_margin_fy2_c=$row['pat_margin_fy2_c'];
$financialBean->pat_margin_ltm_c=$row['pat_margin_ltm_c'];
$financialBean->pe_fy1_c=$row['pe_fy1_c'];
$financialBean->pe_fy2_c=$row['pe_fy2_c'];
$financialBean->pe_ltm_c=$row['pe_ltm_c'];
$financialBean->revenue_fy1_c=$row['revenue_fy1_c'];
$financialBean->revenue_fy2_c=$row['revenue_fy2_c'];
$financialBean->revenue_in_million_c=$row['revenue__c'];
$financialBean->revenue_lfy_c=$row['revenue_lfy_c'];
$financialBean->revenue_ltm_c=$row['revenue_ltm_c'];
$financialBean->ttm_date_c=$row['ttm_date_c'];
$financialBean->year_ending_c=$row['year_ending_c'];
$financialBean->year_for_revenue_c=$row['year_for_revenue_c'];
$financialBean->financials_source_c=$row['financials_source_c'];
$financialBean->ciq_name_c=$row['ciq_name_c'];
$financialBean->team_id='10a9aba8-95fb-11e6-a7c0-0250d4f82a21';
$financialBean->team_set_id='10a9aba8-95fb-11e6-a7c0-0250d4f82a21';
$financialBean->assigned_user_id='1';
$financialBean->accounts_avds1_financial_1accounts_ida=$row['id'];

if(($row['financials_updated_on_c'] != "NULL" ) && ($row['financials_updated_on_c'] != "")){
	$date = date("Y-m-d H:m:s", strtotime($row['financials_updated_on_c']));
	echo $date;
	$financialBean->date_entered=$date;
	}else {
		echo "Sorry";
		}

$financialBean->save();
echo $financialBean->id;

}

?>

