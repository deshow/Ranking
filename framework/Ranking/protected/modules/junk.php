<?php
/*
 $sql = "select 'f0101z2' tb,szedtn edtn,szedsp edsp,null opt  from f0101z2 where szan8 = '".$an8."' and szedtn = '".$f0101ed."'
union all
select 'f0111z1' ,bwedtn,bwedsp,null from f0111z1 where bwan8 = '".$an8."' and bwedtn = '".$f0111ed."'
union all
select 'f0115z1',piedtn,piedsp,piphtp from f0115z1 where pian8 = '".$an8."' and piedtn = '".$f0115ed."'
union all
select 'f03012z1',voedtn,voedsp,voco from f03012z1 where voan8 = '".$an8."' and voedtn = '".$f03012ed."'
union all
select 'f0401z1',voedtn,voedsp,null from f0401z1 where voan8 = '".$an8."' and voedtn = '".$f0401ed."'
union all
select 'f01161z1',lbedtn,lbedsp,null from f01161z1 where lban8 = '".$an8."' and lbedtn='".$f01161ed."'";
$stid = oci_parse (Yii::app()->oci->connection , $sql );
oci_execute($stid);
$arr = array();
oci_fetch_all($stid,$arr,0,OCI_FETCHSTATEMENT_BY_COLUMN);
foreach($arr as $row){
$msg = $row['TB']." EDTN=".$row['EDTN']." PENDING ".date('Y-m-d H:i:s');
Mslog::model()->write($msg);
$edsp = trim($row['EDSP']);
if($edsp == "Y"){
$target->status = OK_STATUS;
$msg = $row['TB']." EDTN=".$row['EDTN']." OK ".date('Y-m-d H:i:s');
array_push($logs, $msg);
if($results[$an8] != 'N'){
$results[$an8] = $target->SZALPH." OK";
}
}else if($edsp == "N"){
$target->status = ERR_STATUS;
$msg = $row['TB']." EDTN=".$row['EDTN']." ERROR ".date('Y-m-d H:i:s');
array_push($logs, $msg);
$results[$an8] = $target->SZALPH." ERROR";
}
}
*/


/*
$con = "trim(SZEDTN) = :p";
$param = array(":p"=>$f0101ed);
$model = F0101z2::model()->find($con,$param);
if(($rs += $this->checkEDSP('SZ', $model,$target)) > 0) continue;
$model =  F0111z1::model()->findByAttributes('BWEDTN',$f0111ed);
if(($rs += $this->checkEDSP('BW', $model,$target)) > 0) continue;
$model = F03012Z1::model()->findByAttributes('VOEDTN',$f03012ed);
if(($rs += $this->checkEDSP('VO', $model,$target)) > 0) continue;
$model = F0401z1::model()->findByAttributes('VOEDTN',$f0401ed);
if(($rs += $this->checkEDSP('VO', $model,$target)) > 0) continue;
$model = F0115z1::model()->findByAttributes('PIEDTN',$f0115ed);
if(($rs += $this->checkEDSP('PI', $model,$target)) > 0) continue;
$model = F01151z1::model()->findByAttributes('EBEDTN',$f01151ed);
if(($rs += $this->checkEDSP('EB', $model,$target)) > 0) continue;
$model = F01161z1::model()->findByAttributes('LBEDTN',$f01161ed);
if(($rs += $this->checkEDSP('LB', $model,$target)) > 0) continue;
if($rs == 0){
	$results[$target->SZAN8] = $target->SZAN8." ".$target->SZALPH." OK";
	$target->status = OK_STATUS;
}

private function checkEDSP($prefix,$model,$body){
	$val = $model->getAttribute($prefix.'EDSP');
	switch (trim($val)){
		case "Y":
			$msg = "OK ".$model->getTableName()." ".$model->getAttribute($prefix.'EDTN')." ".$model->getAttribute($prefix.'AN8');
			Mslog::model()->write($msg);
			return 0;
		case "N":
			$msg = "ERROR ".$model->getTableName()." ".$model->getAttribute($prefix.'EDTN')." ".$model->getAttribute($prefix.'AN8');
			Mslog::model()->write($msg);
			$str = "ERROR ".$body->SZAN8." ".$body->SZALPH;
			$body->status = ERR_STATUS;
			$body->save();
			Yii::app()->mailler->sendMail($target->id_user, $str);
			Yii::app()->end();
	}
	return 1;
}
*/