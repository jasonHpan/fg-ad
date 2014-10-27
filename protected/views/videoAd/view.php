<?php echo TbHtml::breadcrumbs(array(
    '頻道設定'=>array('channel/index'),
    '頻道 - '.Channel::model()->findByPk($model->channel_id)->name=>array('channel/view','id'=>$model->channel_id),
    '影片設定'=>array('video/index','channel_id'=>$model->channel_id),
    '影片 - '.Video::model()->findByPk($model->video_id)->name=>array('video/view','id'=>$model->video_id),
    '廣告設定'=>array('index','video_id'=>$model->video_id,'channel_id'=>$model->channel_id),
    $model->name
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
<?php echo TbHtml::linkButton('更新', 
                                                        array(
                                                            'icon'=>'pencil',
                                                            'color' => TbHtml::BUTTON_COLOR_WARNING,
                                                            'url'=>Yii::app()->createUrl('videoAd/update', array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::button('刪除', 
                                                        array(
                                                            'loading' => '處理中...',
                                                            'icon'=>'trash',
                                                            'color' => TbHtml::BUTTON_COLOR_DANGER,
                                                            'onclick'=>'deleteAjax("'.Yii::app()->createUrl('videoAd/delete',array('id'=>$model->id,'ajax'=>1)).'","'.$model->id.'","'.Yii::app()->createUrl('videoAd/admin',array('video_id'=>$model->video_id,'channel_id'=>$model->channel_id)).'");',
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('videoAd/admin',array('video_id'=>$model->video_id,'channel_id'=>$model->channel_id))
                                                       )); ?>
<br><br>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                                       array(
                                         'name'=>'video_id',
                                         'value'=>$model->oVideo->name,
                                       ),
		'name',
		'photo',
                                      array(
                                           'name'=>'',
                                           'type'=>'raw',
                                           'value'=>'<img src="'.Yii::app()->request->baseUrl.VideoAd::getHandleData("photo", $model->id).'" width="200px">'
                                       ),
                                       array(
                                           'name'=>'url',
                                           'type'=>'raw',
                                           'value'=>'<a href="'.$model->url.'">'.$model->url.'</a>'
                                       ),
		 array(
                                            'name'=>'vw',
                                            'value'=>Yii::app()->params->vwStatus[$model->vw]
                                      ),
		's_date',
		'e_date',
	),
)); ?>
