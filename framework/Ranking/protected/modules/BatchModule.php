<?php
class BatchModule extends CWebModule{
	
	public function run($mode)
	{
		$list = Mf0101z2::model()->searchAllByStatus("1");
		if(count($list)>0){
			$results = array();
			foreach ($list as $target){
				$an8 = $target->SZAN8;
				$f0101ed = $target->SZEDTN; 
				$f0111ed = $target->mf0111z1->BWEDTN;
				$f03012ed = $target->mf03012z1->VOEDTN;
				$f0401ed = $target->mf0401z1->VOEDTN;
				$f0115ed = $target->mf0115TEL->PIEDTN;
				$f01151ed = $target->mf01151z1->EBEDTN;
				$f01161ed = $target->mf01161z1->LBEDTN;
				
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
				while($row = oci_fetch_assoc($stid)){
					$edsp = trim($row['EDSP']);
					if($edsp == "Y"){
						$target->status = OK_STATUS;
						if(!isset($results[$an8]) || $results[$an8] != 'N'){
							$results[$an8] = array("msg"=>$target->SZALPH." OK","ST"=>OK_STATUS);
						}
					}else if($edsp == "N"){
						$target->status = ERR_STATUS;
						$msg = $row['TB']." EDTN=".$row['EDTN'].$row['OPT']." ERROR ".date('Y-m-d H:i:s');
						$results[$an8] = array("msg"=>$target->SZALPH." ERROR","ST"=>ERR_STATUS);
						Mslog::model()->write($msg);
					}
				}
				if(isset($results[$an8]['ST'])){
					$target->status = $results[$an8]['ST'];
					$target->save();
				}
			}
			if(count($results) > 0){
				$str = "";
				foreach($results as $key=>$value){
					$str = $str.$key." ".$value['msg'].'<br/>';
				}
				//Yii::app()->mailler->sendMail($target->id_user, $str);
			}
		}
	}
}