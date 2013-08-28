<?php
// this file must be stored in:
// protected/components/WebUser.php
class WebUser extends CWebUser {
	
	protected $role = 0;
	protected $group = '';
	
	public function setRole($value){
		Yii::app()->user->setState('role', $value);
	}
	
	public function getRole(){
		$role = Yii::app()->user->getState('role');
		return (null!==$role)?$role:$this->role;
	}
	
	public function setGroup($value){
		Yii::app()->user->setState('group', $value);
	}
	
	public function getGroup(){
		$grp = Yii::app()->user->getState('group');
		return (null!==$grp)?$grp:$this->group;
	}
}
?>