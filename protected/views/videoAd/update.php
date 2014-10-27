<?php echo TbHtml::breadcrumbs(array(
    '頻道設定'=>array('channel/index'),
    '頻道 - '.Channel::model()->findByPk($model->channel_id)->name=>array('channel/view','id'=>$model->channel_id),
    '影片設定'=>array('video/index','channel_id'=>$model->channel_id),
    '影片 - '.Video::model()->findByPk($model->video_id)->name=>array('video/view','id'=>$model->video_id),
    '廣告設定'=>array('index','video_id'=>$model->video_id,'channel_id'=>$model->channel_id),
    '詳細資料 - '.$model->name =>array('view','id'=>$model->id),
    '更新 - '.$model->name
)); ?>


<?php echo TbHtml::linkButton('回列表', 
                                                        array(
                                                            'icon'=>'th-list',
                                                            'url'=>Yii::app()->createUrl('videoAd/index',array('video_id'=>$model->video_id,'channel_id'=>$model->channel_id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('videoAd/create',array('video_id'=>$model->video_id,'channel_id'=>$model->channel_id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('詳細資料', 
                                                        array(
                                                            'icon'=>'file',
                                                            'color' => TbHtml::BUTTON_COLOR_INVERSE,
                                                            'url'=>Yii::app()->createUrl('videoAd/view',array( 'id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('videoAd/admin',array('video_id'=>$model->video_id,'channel_id'=>$model->channel_id))
                                                       )); ?>

<?php $this->renderPartial('_form', array('model'=>$model,'video_id'=>$model->video_id,'channel_id'=>$model->channel_id)); ?>