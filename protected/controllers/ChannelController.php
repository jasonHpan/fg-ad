<?php

class ChannelController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
                   public $pageTitle = "頻道設定";
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
				'actions'=>array('index','view','create','update'),
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
	public function actionCreate()
	{
		$model=new Channel;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Channel']))
		{
			$model->attributes=$_POST['Channel'];
			if($model->save()){
                                                                             $this->updateVideoCode($model->id);
				$this->redirect(array('view','id'=>$model->id));
                                                            }
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

		if(isset($_POST['Channel']))
		{
			  $model->attributes=$_POST['Channel'];
                                                            if($model->save()){
                                                                $this->updateVideoCode($model->id);
                                                                $this->redirect(array('view','id'=>$model->id));
                                                            }
				
                                                         
		}
                                      
                                       
                                       
		$this->render('update',array(
			'model'=>$model,
		));
	}
        
                   protected  function updateVideoCode($id){
                       
                       $model = Channel::model()->findByPk($id);
                       
                       $rcv = $this->get_video_id($model->youtube_channel);
                       
                       $model->photo = $rcv['photo'];
                       $model->first_video = $rcv['video_code'];
                       
                       $model->save();
                       
                   }
                   
                   /*抓取youtube頻道目前撥放之影片*/
                   function get_video_id($channel_url){

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_URL, $channel_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$content = curl_exec($ch);
		curl_close($ch);
		
		preg_match_all('/<div id="upsell-video" class="c4-flexible-player-box" data-video-id="(.+?)"/',$content,$video_info);
                                        
                                       $output['video_code'] = $video_info[1][0];
                                       $output['photo'] = "https://i.ytimg.com/vi/".$output['video_code']."/hqdefault.jpg";
                                       
                                       if( $output['video_code'] == ""){

                                           $channel_id = explode("/",$channel_url);
                                           
                                           if($channel_id[3] == "user"){
                                                $rcv = $this->get_channel_id($channel_id[4],1);
                                           }else{
                                                $rcv = $this->get_video_list_api($channel_id[4],1);
                                           }
                                           $video_id = explode("/",$rcv[0]->snippet->thumbnails->high->url);
                                           $output['video_code'] = $video_id[4];
                                           $output['photo'] = $rcv[0]->snippet->thumbnails->high->url;
                                       }
                                       
                                       
		return $output;
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
		$dataProvider=new CActiveDataProvider('Channel');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Channel('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Channel']))
			$model->attributes=$_GET['Channel'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Channel the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Channel::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Channel $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='channel-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
                    
}
