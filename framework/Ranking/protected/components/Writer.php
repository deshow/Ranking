<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Tokyo');
	
class Writer extends CApplicationComponent
{
	public $excel;
	
	function __construct()
	{
		$this->excel = new PHPExcel();
	}
	function outputToCSV($fileName,$head,$body)
	{
		ob_clean();
		$csv = Yii::app()->csvExport;
		$data = array(
				array('key1'=>'value1', 'key2'=>'value2')
		);
		$csv = new ECSVExport($data);
		$content = $csv->toCSV();
		Yii::app()->getRequest()->sendFile($filename, $content, "text/csv", false);
		Yii::app()->end();
	}
	function outputToExcel($fileName,$head,$body)
	{
		ob_clean();
		$objPHPExcel = new PHPExcel();
		$sheet = $objPHPExcel->setActiveSheetIndex(0);
		$y = 0;
		$x = 1;
		if(isset($head)){
			$x = 2;
			foreach ($head as $cell){
				$sheet->setCellValueExplicitByColumnAndRow($y,1,$cell);
				$y++;
			}
		}
		$y = 0;
		foreach($body as $record){
			foreach($record as $cell){
				$sheet->setCellValueExplicitByColumnAndRow($y,$x,$cell);
				$y++;
			}
			$y = 0;
			$x++;
		}
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename='.$fileName. '.xls');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		$objWriter->close();
	}
}