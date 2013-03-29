<?php

class SpaceController extends Controller
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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('loic'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
			
		$dataProvider=new CActiveDataProvider('Page', array(

				'criteria'=>array(
					'condition'=>"space=$id",
					'order'=>'creationdate DESC',		
					'with'=>'author0',
				),
				'pagination'=>array(
						'pageSize'=>5,
				),

		));
		
		$index=new CActiveDataProvider('Page', array(
				'criteria'=>array(
					'condition'=>"space=$id and  name='index'",
				),
		));
		//var_dump($dataProvider->getData());
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'pages'=>$dataProvider,
			'index'=>Space::getIndexPage($id),
			'childs'=>Space::getChildSpace($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Space;

		
			
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Space']))
		{
			$model->attributes=$_POST['Space'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idspace));
		}
		$model->unsetAttributes();

		$this->render('create',array(
			'model'=>$model,'parents'=>Space::getParents()
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

		if(isset($_POST['Space']))
		{
			$model->attributes=$_POST['Space'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idspace));
		}

		$this->render('update',array(
			'model'=>$model,
			'parents'=>Space::getParents(),
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
		//die(var_dump($search->search()));
		
		$dataProvider=new CActiveDataProvider('Space',array(
		'criteria'=>array('with'=>'creator'),
        'pagination'=>array(
                'pageSize'=>5,
        ),));
		
		$model=new Space('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Space']))
			$model->attributes=$_GET['Space'];
			
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model
			
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Space('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Space']))
			$model->attributes=$_GET['Space'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Space the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Space::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Space $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='space-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


}
