<?php

class VideoAdController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
                   public $pageTitle = "影片廣告";
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
	public function actionCreate($video_id,$channel_id="")
	{
		$model=new VideoAd;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['VideoAd']))
		{
			$model->attributes=$_POST['VideoAd'];
                                                          $uploadedFile = CUploadedFile::getInstance($model,'photo');
                        
			if($model->save()){
                                                                             $this->handlePhoto($model,$uploadedFile);
				$this->redirect(array('view','id'=>$model->id));
                                                          }
		}

		$this->render('create',array(
			'model'=>$model,
                                                          'video_id'=>$video_id,
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

		if(isset($_POST['VideoAd']))
		{                   
                                                          $old_photo = $model->photo;
			$model->attributes=$_POST['VideoAd'];
                                                          $uploadedFile = CUploadedFile::getInstance($model,'photo');
                                                          
			if($model->save()){
                                                                             $this->handlePhoto($model,$uploadedFile,$old_photo);
				$this->redirect(array('view','id'=>$model->id));
                                                             }
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
		$model = $this->loadModel($id);
                                       $channel_id = $model->channel_id;
                                       $video_id = $model->video_id;
		 $model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin','video_id'=>$video_id,'channel_id'=>$channel_id));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($video_id,$channel_id="")
	{
                                      $this->requireColumn($video_id);
		$dataProvider=new CActiveDataProvider('VideoAd',
                                                                                                                   array(
                                                                                                                        'criteria'=>array(
                                                                                                                        'condition'=>'video_id='.$video_id
                                                                                                                  )));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
                                                          'video_id'=>$video_id,
                                                          'channel_id'=>$channel_id,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($video_id,$channel_id="")
	{
		$model=new VideoAd('search');
		$model->unsetAttributes();  // clear any default values
                                      $model->channel_id = $channel_id;
                                      $model->video_id = $video_id;
		if(isset($_GET['VideoAd']))
			$model->attributes=$_GET['VideoAd'];

		$this->render('admin',array(
			'model'=>$model,
                                                          'video_id'=>$video_id,
                                                          'channel_id'=>$channel_id,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return VideoAd the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=VideoAd::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param VideoAd $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='video-ad-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
                   protected function requireColumn($video_id){
      
                                      if(!empty($video_id))
                                           $video_id = (int) $video_id;
                                       else
                                            throw new CHttpException(404,'invalid request');
                    }
                    
                     protected function handlePhoto($model, $uploadedFile,$old_photo=""){
                                    $upload_path = Yii::app()->basePath.VideoAd::$base_upload_photo_dir.$model->video_id.'/';
                                    $new_filename = "video-".$model->video_id.'-id-'.$model->id.'-'.uniqid(rand(), false);
                                    $this->uploadPhoto($model, $uploadedFile,"photo", $upload_path, $old_photo,$new_filename);
                    }
}
