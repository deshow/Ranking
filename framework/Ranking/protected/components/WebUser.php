<?php
// this file must be stored in:
// protected/components/WebUser.php
class WebUser extends CWebUser {
	protected $role = 0;
	public function setRole($value){
		Yii::app()->user->setState('role', $value);
	}
	public function getRole(){
		$role = Yii::app()->user->getState('role');
		return (null!==$role)?$role:$this->role;
	}
}
?>