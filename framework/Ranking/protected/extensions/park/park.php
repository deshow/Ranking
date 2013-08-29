<?php
class Park extends CTabView
{
	public function init()
	{
		$assetsDir=dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
		$assetsDir=Yii::app()->getAssetManager()->publish($assetsDir);
		$cs = Yii::app()->clientScript;
		$cs->registerScriptFile($assetsDir.'/js/park.js',CClientScript::POS_END);
		return parent::init();
	}
	public function run()
	{
		echo '<div id="chart_div" style="width:400; height:300"></div>';	
	}
}