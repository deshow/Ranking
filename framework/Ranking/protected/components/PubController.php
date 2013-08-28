<?php
class PubController extends CApplicationComponent
{
	private $connection;
	function __construct(){
		if(!isset($this->connection)){
			$this->connection = oci_pconnect(PUB_USER, PUB_PASS, PUB_HOST.":1521/".PUB_SERVICE, "UTF8", 0);
		}
	}
	function __destruct(){
		oci_close($this->connection);
	}
	
	public function loadSE_TM030($val){
		$sql = "select * from se_tm030 where td_insert >'".$val."' or td_update > '".$val."'";
		$stid = oci_parse ($this->connection , $sql );
		oci_execute($stid);
		$arr = array();
		$nrow = oci_fetch_all($stid,$arr,0,0,OCI_FETCHSTATEMENT_BY_ROW);
		return $arr;
	} 
}