<?php
class MaintainCommand extends CConsoleCommand{
	
	public function run($args)
	{
		$receiver=$args[0];
		$md = Yii::app()->getModule($receiver);
		$md->run($receiver);
	}
}