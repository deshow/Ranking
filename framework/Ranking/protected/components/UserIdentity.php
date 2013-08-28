<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public $ldap;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$condition = 'id=:u and pwd=:p';
		$params = array(':u'=>$this->username,':p'=>$this->password);
		$model = User::model()->find($condition,$params);
		if(isset($model))
		{
			$this->errorCode=self::ERROR_NONE;
			Yii::app()->user->setRole($model->plg);
		}
		return !$this->errorCode;
	}
}