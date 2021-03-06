<?php

class RankingController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		$denyOrAllow = Yii::app()->user->getRole();
		if($denyOrAllow > 1){
			return array();
		}
		return array('deny',  // deny all users
				'users'=>array('*'));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ranking;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ranking']))
		{
			$model->attributes=$_POST['Ranking'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ranking']))
		{
			$model->attributes=$_POST['Ranking'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Ranking');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		$string = '{
				  "cols": [
				        {"id":"","label":"Topping","pattern":"","type":"string"},
				        {"id":"","label":"Slices","pattern":"","type":"number"}
				      ],
				  "rows": [
				        {"c":
				        	[{"v":"Mushrooms","f":null},{"v":3,"f":null}]},
				        {"c":[{"v":"Onions","f":null},{"v":1,"f":null}]},
				        {"c":[{"v":"Olives","f":null},{"v":1,"f":null}]},
				        {"c":[{"v":"Zucchini","f":null},{"v":1,"f":null}]},
				        {"c":[{"v":"Pepperoni","f":null},{"v":2,"f":null}]}
				      ]
				}';
		$arr = CJSON::decode($string);
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ranking('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ranking']))
			$model->attributes=$_GET['Ranking'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Ranking::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ranking-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
