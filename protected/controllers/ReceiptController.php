<?php

class ReceiptController extends Controller
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
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','index','view','delete','export'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
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
		$model=new Receipt;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Receipt']))
		{
			
			$model->attributes=$_POST['Receipt'];
			if(!$model->getAttribute('companyid')){
				
				$company = new Company();
				$company->setAttribute('name', $_POST['Receipt']['companyname']);
				$company->setAttribute('userid', Yii::app()->user->id);
				$company->save();
				$model->setAttribute('companyid', $company->id);
			}	
			$model->setAttribute('userid', Yii::app()->user->id);
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
			
			return;
		}

		$this->renderView($model,'create');
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id)->with('company');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Receipt']))
		{
			$model->attributes=$_POST['Receipt'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		$this->renderView($model,'update');
	}
	
	private function renderView($model,$view)
	{
		YII::app()->clientscript->registerScriptFile('./js/recieptHelper.js');
		
		$this->render($view,array(
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Receipt',array('criteria'=>array('with'=>array('company'),'condition'=>'t.userid='.Yii::app()->user->id.'')));
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Export to csv
	 */
	
	public function actionExport()
	{
		Yii::import('ext.ECSVExport.ECSVExport');
		
		
		$dataProvider=new CActiveDataProvider('Receipt',array('criteria'=>array('with'=>array('company'),'condition'=>'t.userid='.Yii::app()->user->id.'')));
		
		/**
		 * Excel export has a problem with joins
		 */
		$firstItem = false;
		$headers = null;
		$csvLine = null;
		
		foreach($dataProvider->getData() as $receipt) {
			if(!$firstItem) {
				$headers = $receipt->attributeLabels();
				$firstItem = true;
			}
			foreach($receipt->getAttributes() as $attributeKey => $value) {
				$csvLine[$attributeKey] = $value;
			}
			
			$csvLine['CompanyName'] = $receipt->company->getAttribute('name');
			$csvLines[] = $csvLine;
		}
		
		$csv = new ECSVExport($csvLines);
		$csv->setHeaders($headers);
		$output = $csv->toCSV();
		
		header("Content-type: text/csv");
		header("Cache-Control: no-store, no-cache");
		header('Content-Disposition: attachment; filename="RecieptExport'.date('Y-m-d').'.csv"');
		
		echo $output;
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Receipt('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Receipt'])) {
			$model->attributes=$_GET['Receipt'];
			$model->user = Yii::app()->user->id;
		}

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
		$model=Receipt::model()->findByPk($id);
		
		if($model->userid !== Yii::app()->user->id){
			throw new CHttpException(500,'Unable to load this model.');
		}
		
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='receipt-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
