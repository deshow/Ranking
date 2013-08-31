<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		//$argv[0] = 'publish';
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$md = null;
		$url = null;
		if(isset($_GET['mode'])){
			$md = Yii::app()->getModule($_GET['mode']);
		}
		if(isset($_GET['back'])){
			$url = $_GET['back'];
		}
		if(isset($md)){
			$md->run($_GET['mode']);
			if(isset($url)){
				$this->redirect(array($url));				
			}	
			Yii::app()->end();
		}else{
			$this->render('index');
		}
	}
	
	public function actionChart(){
		$this->render('chart');
	}
	
	public function actionGetdata(){
		/*
			$string = '{
		"cols": [
		{"id":"","label":"Topping","pattern":"","type":"string"},
		{"id":"","label":"Slices","pattern":"","type":"number"}
		]
		,
		"rows": [
		{"c":
		[
		{"v":"Mushrooms",
		"f":null
		},
		{"v":3,
		"f":null
		}
		]
		},
	
	
		{"c":[{"v":"Onions","f":null},{"v":1,"f":null}]},
		{"c":[{"v":"Olives","f":null},{"v":1,"f":null}]},
		{"c":[{"v":"Zucchini","f":null},{"v":1,"f":null}]},
		{"c":[{"v":"Pepperoni","f":null},{"v":2,"f":null}]}
		]
		}';
		$arr = CJSON::decode($string);
		*/
		$arr['cols'] = array();
		array_push($arr['cols'],array('label'=>'Title','type'=>'string'));
		array_push($arr['cols'],array('label'=>'Rank','type'=>'number'));
		array_push($arr['cols'],array('label'=>'Price','type'=>'number'));
		//$arr['rows'] = array();
		$date = date('Y-m-d');
		$tr = explode('-', $date);
		$yy = (int)$tr[0];
		$mm = (int)$tr[1];
		$dd = (int)$tr[2];
		$rs = Ranking::model()->findAllByAttributes(array('yy'=>$yy,'mm'=>$mm,'dd'=>$dd,'dtr'=>1));
		$arr['rows'] = array();
		foreach($rs as $model){
			$title = $model->nm;
			$rank = (int)$model->rnk;
			$price = (int)$model->price;
			array_push($arr['rows'],array('c' => array(array('v' => $title), array('v' => $rank),array('v' => $price))));
		}
		/*
			array_push($arr['rows'],array('c' => array(array('v' => 'first'), array('v' => 444),array('v' => -33))));
		array_push($arr['rows'],array('c' => array(array('v' => 'second'), array('v' => 31),array('v' => 33))));
		*/
		$str = CJSON::encode($arr);
		echo $str;
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate()&&$model->login()){
				$this->redirect(array('ranking/index'));
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}