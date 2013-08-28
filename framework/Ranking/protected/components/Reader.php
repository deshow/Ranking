<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Tokyo');

class Reader extends CApplicationComponent
{
	public $excel;
	
	function __construct()
	{
		$this->excel = new PHPExcel();
	}
	
	function identify($path)
	{
		return PHPExcel_IOFactory::identify($path);
	}
	
	function load($type,$path,$task,$skipHead)
	{
		$this->unload();
		$fileList = array();
		//CSV
		if($type == "CSV"){
			setlocale(LC_ALL, 'ja_JP.Shift_JIS');
			$count = count(file($path));
			if($skipHead){
				$count--;
			}
			$i = 1;
			Yii::app()->session['max'] = $count;
			$buf = file($path);
			foreach($buf as $tmp) {
				$line = mb_convert_encoding($tmp, 'utf8', 'sjis-win');
				$data = explode(',', $line);
				if($skipHead){
					$skipHead = false;
					continue;
				}
				$fileList[$i] = $data;
				$i++;
			}
		}
		//Excel
		if(substr($type,0,5) == "Excel"){
			$objReader = PHPExcel_IOFactory::createReader($type);
			$objPHPExcel = $objReader->load($path);
			switch($task){
				case "tester":
					$fileList = $this->loadTester($objPHPExcel,4);
					break;
				case "survey":
					$fileList = $this->loadSurvey($objPHPExcel,1);
					break;
				case "work":
					$fileList = $this->loadWork($objPHPExcel,1);
					break;
							
			}
		}
		Yii::app()->session['file'] = $fileList;
	}
	
	function unload()
	{
		unset(Yii::app()->session['file']);
		unset(Yii::app()->session['rec']);
		unset(Yii::app()->session['max']);
	}
	
	function loadTester($objPHPExcel,$skipHeader){
		$i = 0;
		$sht = array();
		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
			$sht[$i] = array();
			$sheetName = $worksheet->getTitle();
			foreach ($worksheet->getRowIterator() as $row) {
				$line = array();
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
				foreach ($cellIterator as $cell) {
					if($cell->getRow() > $skipHeader){
						$val = $cell->getValue();
						array_push($line,$val);
					}
				}
				if(count($line)>0){
					array_push($sht[$i], $line);
				}
			}
			$i++;
		}
		$sht;
		$fileList = array();
		$i = 0;
		foreach($sht[0] as $row){
			$line = array();
			$key = $row[8];
			$line[$key] = array();
			$line[$key]['id'] = $key;
			$line[$key]['nm'] = $row[9];
			$line[$key]['nm_kana'] = $row[10];
			$line[$key]['dt_in'] = $this->toDate($row[11]);
			$line[$key]['rmk'] = $row[13];
			$line[$key]['nm_en'] = $sht[1][$i][3];
			$line[$key]['sx'] = $sht[1][$i][6];
			$bir = $this->toDate($sht[1][$i][7]);
			$tarDate = datetime::createfromformat('Y-m-d',$bir);
			$tarDate = date_format($tarDate,'Y');
			$ag = date('Y')-$tarDate;
			$line[$key]['ag'] = $ag;
			$line[$key]['dt_bir'] = $bir;
			$line[$key]['mail'] = $sht[1][$i][8];
			$line[$key]['mail_m'] = $sht[1][$i][9];
			$line[$key]['adr_pst'] = $sht[2][$i][5]; 
			$line[$key]['adr_all'] = $sht[2][$i][6];
			$line[$key]['tel'] = $sht[2][$i][8];
			$line[$key]['tel_m'] = $sht[2][$i][9];
			$i++;
			$fileList[$i] = $line[$key];
		}
		Yii::app()->session['max'] = count($fileList);
		return $fileList;
	}
	function loadSurvey($objPHPExcel,$skipHeader)
	{
		$fileList = array();
		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
			$i = 1;
			foreach ($worksheet->getRowIterator() as $row) {
				$line = array();
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
				foreach ($cellIterator as $cell) {
					if($cell->getRow() > $skipHeader){
						$val = $cell->getValue();
						array_push($line, $val);
					}
				}
				$fileList[$i] = $line;
				$i++;
			}
		}
		Yii::app()->session['max'] = count($fileList);
		return $fileList;
	}
	
	function loadWork($objPHPExcel,$skipHeader)
	{
		date_default_timezone_set('Asia/Tokyo');
		$fileList = array();
		$i = 1;
		$worksheet = $objPHPExcel->getSheet(0);
		$shtName = $worksheet->getTitle();
		$arr = explode('.', $shtName);
		$baseDate = mktime(0,0,0,$arr[1],1,$arr[0]);
		foreach ($worksheet->getRowIterator() as $row) {
			$line = array();
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
			$rowNum = 0;
			foreach ($cellIterator as $cell) {
				$rowNum = $cell->getRow(); 
				if($rowNum > $skipHeader){
					$val = $cell->getValue();
					array_push($line, $val);
				}
			}
			if($rowNum > $skipHeader){
				//check dt_start and dt_end
				if($this->isLegal($baseDate,$line[10]) == 0 || $this->isLegal($baseDate,$line[17]) == 0 ){
					$line[10] = $this->toDate($line[10]); 
					$line[11] = $this->toDate($line[11]); 
					$line[17] = $this->toDate($line[17]); 
					$fileList[$i] = $line;
					$i++;
				}
			}
		}
		Yii::app()->session['max'] = count($fileList);
		return $fileList;
	}
	function isLegal($base,$str){
		if($str != "" && $str != null && $str != 0){
			$date = date('Y-m',$base);
			$tarDate = $this->toDate($str);
			$tarDate = datetime::createfromformat('Y-m-d',$tarDate);
			$tarDate = date_format($tarDate,'Y-m');
			if($date == $tarDate){
				return 0;				
			}
		}
		return -1;
	}
	
	function toDate($date){
		return PHPExcel_Style_NumberFormat::toFormattedString($date,'YYYY-MM-DD' );
	}
	
	
	function hasCompleted()
	{
		$file = Yii::app()->session['file'];
		$rec = Yii::app()->session['rec'];
		$max = Yii::app()->session['max'];
		if($file != null && $rec !=null && $max < $rec){
			$this->unload();
			return true;
		}
		return false;
	}
	
	function readLine()
	{
		$file = Yii::app()->session['file'];
		if($file == null){
			throw new CHttpException('You did not import the proper file!');
		}
		$rec = Yii::app()->session['rec'];
		if($rec == null){
			$rec = 1;
		}
		$max = Yii::app()->session['max'];
		$data = $file[$rec];
		echo $max.'|'.$rec;
		$rec++;
		Yii::app()->session['rec'] = $rec;
		return $data;
	}
	function __destruct()
	{
		$this->unload();
	}	
}