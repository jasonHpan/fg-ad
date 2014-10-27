<?php

class VideoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
                   public $pageTitle = "影片設定";
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
				'actions'=>array('index','view','create','update','autoCreate'),
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
                                       if(isset($channel_id))
                                           $channel_id = (int) $channel_id;
                                       else
                                            throw new CHttpException(404,'invalid request');
                                       
		$model=new Video;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Video']))
		{
			$model->attributes=$_POST['Video'];
			if($model->save()){
                                                                             $this->updateVideo($model->id);
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

		if(isset($_POST['Video']))
		{
			$model->attributes=$_POST['Video'];
			if($model->save()){
                                                                             $this->updateVideo($model->id);
				$this->redirect(array('view','id'=>$model->id));
                                                          }   
		}

		$this->render('update',array(
			'model'=>$model,
                                                          'channel_id'=>$model->channel_id,
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
                                       if(isset($channel_id))
                                           $channel_id = (int) $channel_id;
                                       else
                                            throw new CHttpException(404,'invalid request');
                                       
		$dataProvider=new CActiveDataProvider('Video',
                                                                                                              array(
                                                                                                                  'criteria'=>array(
                                                                                                                      'condition'=>'channel_id='.$channel_id
                                                                                                                  )
                                                                                                            ));
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
                                       if(isset($channel_id))
                                           $channel_id = (int) $channel_id;
                                       else
                                            throw new CHttpException(404,'invalid request');
                                       
		$model=new Video('search');
		$model->unsetAttributes();  // clear any default values
                                       $model->channel_id = $channel_id;
		if(isset($_GET['Video']))
			$model->attributes=$_GET['Video'];
                                        
		$this->render('admin',array(
			'model'=>$model,
                                                          'channel_id'=>$channel_id,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Video the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Video::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Video $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='video-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
                    public function actionAutoCreate($channel_id){
                        
                        if(isset($channel_id))
                                           $channel_id = (int) $channel_id;
                                       else
                                            throw new CHttpException(404,'invalid request');
                                       
                        $oChannel = Channel::model()->findByPk($channel_id);
                        $channel_code = explode("/",$oChannel->youtube_channel);

                        if($channel_code[3] == "user"){
                            $rcv = $this->get_channel_id($channel_code[4]) ;
                        }else{
                            $rcv = $this->get_video_list_api($channel_code[4]);
                        }
                        
                        $model=new Video;
                        $model->unsetAttributes();  // clear any default values
                        foreach($rcv as $key=>$val){
                            $model->vw = 1;
                            $model->channel_id = $channel_id;
                            $model->name = $val->snippet->title;
                            $model->photo = $val->snippet->thumbnails->high->url;
                            $video_id = explode("/",$val->snippet->thumbnails->high->url);
                            $model->video_code = $video_id[4];
                            $model->isNewRecord = true;
                            
                            $criteria = new CDbCriteria;
                            $criteria->addCondition("t.video_code = '".$model->video_code."'");
                            $rows = Video::model()->count($criteria);
                            
                            if($rows == 0){
                                $model->save();
                            }
                                $model->unsetAttributes(); 
                        }
                        
                            $this->redirect(array('index','channel_id'=>$oChannel->id));
                    }
                   
                    //網址非channel 而是user時需做查詢動作
//                   protected function get_channel_id($user){
//                        $api_key = Yii::app()->params->youtubeApiKey;
//                        $main_api = "https://www.googleapis.com/youtube/v3/channels?part=id&forUsername=".$user."&key=".$api_key;
//                        $ch = curl_init();
//                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//                        curl_setopt($ch, CURLOPT_URL, $main_api);
//                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//                        $content = curl_exec($ch);
//                        curl_close($ch);
//                       $getArray = json_decode($content);
//
//                       return $this->get_video_list_api($getArray->items[0]->id);
//                   }
                    
//                   protected function get_video_list_api($channel_id,$video_count=12){
//		$pagesize=$video_count;
//		$api_key = Yii::app()->params->youtubeApiKey;
//		$main_video_api = "https://www.googleapis.com/youtube/v3/activities?part=snippet&channelId=".$channel_id."&maxResults=".$pagesize."&fields=items%2Fsnippet&key=".$api_key;
//		$ch = curl_init();
//		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//		curl_setopt($ch, CURLOPT_URL, $main_video_api);
//		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//		$content = curl_exec($ch);
//		curl_close($ch);
//		$getArray = json_decode($content);
//
//		return $getArray->items;	
//	}
                    
                   protected function updateVideo($id){
                       
                       $model = Video::model()->findByPk($id);
                       
                       $rcv = $this->get_video_info_api($model->video_code);
                       
                       if(empty($model->name))
                            $model->name =  $rcv ['title'];
                       $model->photo = $rcv ['photo'];
                       
                       $model->save();
                       
                   }
                    /*抓取youtube頻道目前撥放之圖片*/
	protected function get_video_info_api($video_id){
                                       $output = array();
		$api_key = Yii::app()->params->youtubeApiKey;
		$getArray = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=".$video_id."&fields=items%2Fsnippet&key=".$api_key;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_URL, $getArray);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$content = curl_exec($ch);
		curl_close($ch);
   
		$getData= json_decode($content);
                                      $output['title'] = $getData->items[0]->snippet->title;
                                      $output['photo'] = $getData->items[0]->snippet->thumbnails->high->url; 

		return $output;
	}
}
