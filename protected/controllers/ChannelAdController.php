<?php

class ChannelAdController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
                   public $pageTitle = "頻道廣告";
                   public $main_menu = "channel";
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
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
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
	public function actionCreate($channel_id)
	{
                                       $this->requireColumn($channel_id);
		$model=new ChannelAd;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ChannelAd']))
		{
			$model->attributes=$_POST['ChannelAd'];
                                                          $uploadedFile = CUploadedFile::getInstance($model,'photo');
			if($model->save()){
                                                                            $this->handlePhoto($model,$uploadedFile);
				$this->redirect(array('view','id'=>$model->id));
                                                         }
		}

		$this->render('create',array(
			'model'=>$model,
                                                          'channel_id'=>$channel_id,   
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

		if(isset($_POST['ChannelAd']))
		{
                                                          $old_photo = $model->photo;

			$model->attributes=$_POST['ChannelAd'];
                                                          $uploadedFile = CUploadedFile::getInstance($model,'photo');
                                                          
			if($model->save()){
                                                                                $this->handlePhoto($model,$uploadedFile,$old_photo);
                                                                                $this->redirect(array('view','id'=>$model->id));
                                                        }
		}

		$this->render('update',array(
			'model'=>$model,
                                                          'channel_id'=>$channel_id,   
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
                                       $model = $this->loadModel($id);
                                       $channel_id = $model->channel_id;
		 $model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin','channel_id'=>$channel_id));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($channel_id)
	{
                                      $this->requireColumn($channel_id);
		$dataProvider=new CActiveDataProvider('ChannelAd',
                                                                                                                   array(
                                                                                                                        'criteria'=>array(
                                                                                                                        'condition'=>'channel_id='.$channel_id
                                                                                                                  )));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
                                                          'channel_id'=>$channel_id,   
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($channel_id)
	{
                                       $this->requireColumn($channel_id);
		$model=new ChannelAd('search');
		$model->unsetAttributes();  // clear any default values
                                      $model->channel_id = $channel_id;
		if(isset($_GET['ChannelAd']))
			$model->attributes=$_GET['ChannelAd'];

		$this->render('admin',array(
			'model'=>$model,
                                                          'channel_id'=>$channel_id,   
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ChannelAd the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ChannelAd::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ChannelAd $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='channel-ad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
                    protected function requireColumn($channel_id){
      
                                      if(!empty($channel_id))
                                           $channel_id = (int) $channel_id;
                                       else
                                            throw new CHttpException(404,'invalid request');
                    }
                    
                    protected function handlePhoto($model, $uploadedFile,$old_photo=""){
                                    $upload_path = Yii::app()->basePath.ChannelAd::$base_upload_photo_dir.$model->channel_id.'/';
                                    $new_filename = "channel-".$model->channel_id.'-id-'.$model->id.'-'.uniqid(rand(), false);
                                    $this->uploadPhoto($model, $uploadedFile,"photo", $upload_path, $old_photo,$new_filename);
                    }

}
