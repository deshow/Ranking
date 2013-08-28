<?php
class OCIController extends CApplicationComponent
{
	public $connection;
	function __construct(){
		if(!isset($this->connection)){
			$this->connection = oci_pconnect(JDE_USER, JDE_PASS, JDE_HOST.":1521/".JDE_SERVICE, "UTF8", 0);
		}
	}
	function __destruct(){
		oci_close($this->connection);
	}
	public function load($model){
		$sql = "select * from ".$model->getTableName();
		$stid = oci_parse ($this->connection , $sql );
		oci_execute($stid);
		$result = array();
		while($row = oci_fetch_assoc($stid)){
			$f = new CFormModel();//need to arrange a new memory address for the varaible
			$f = clone $model;
			$f->setAttributes($row,false);
			array_push($result,$f);
		}
		return $result;
	}
	public function query($sql){
		$stid = oci_parse ($this->connection , $sql );
		oci_execute($stid);
		while($row = oci_fetch_assoc($stid)){
			return $row;
		}
	}
	public function queryWithParam($sql,$param){
		$stid = oci_parse ($this->connection , $sql );
		oci_bind_by_name($stid, ":p", $param);
		oci_execute($stid);
		while($row = oci_fetch_assoc($stid)){
			return $row;
		}
	}
	public function queryWithParams($sql,array $params){
		$stid = oci_parse ($this->connection , $sql );
		$i = 1;
		foreach($params as $p){
			oci_bind_by_name($stid, ":p".$i, $p);
			$i++;
		}
		oci_execute($stid);
		while($row = oci_fetch_assoc($stid)){
			return $row;
		}
	}
	
	public function clear(){
		$sql = "begin
				delete from f0101z2
				where SZEDUS = 'EXMASTER'
				and SZEDSP = ' ';
				
				delete from f0111z1
				where BWEDUS = 'EXMASTER'
				and BWEDSP = ' ';
				
				delete from f0115z1
				where PIEDUS = 'EXMASTER'
				and PIEDSP = ' ';
				
				delete from f01151z1
				where EBEDUS = 'EXMASTER'
				and EBEDSP = ' ';
				
				delete from f01161z1
				where LBEDUS = 'EXMASTER'
				and LBEDSP = ' ';
				
				delete from f03012z1
				where VOEDUS = 'EXMASTER'
				and VOEDSP = ' ';
				
				delete from f0401z1
				where VOEDUS = 'EXMASTER'
				and VOEDSP = ' ';
				end;";
		$stid = oci_parse ($this->connection , $sql );
		oci_execute($stid);
		oci_commit($this->connection);
	}
}