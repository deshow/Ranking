<?php
class Park extends CWidget
{
	protected function registerClientScript()
	{
		/*
		$cs=Yii::app()->clientScript;
		$cssfile=dirname(__FILE__).DIRECTORY_SEPARATOR.'park.css';
		$jsfile=dirname(__FILE__).DIRECTORY_SEPARATOR.'park.js';
		$cs->registerCssFile($cssfile);
		$cs->registerScriptFile($jsfile);
		*/
	}
	public function run()
	{
		echo '<div id="chart_div" style="width:400; height:300"></div>';	
	}
}