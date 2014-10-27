<?php echo TbHtml::breadcrumbs(array(
    '頻道設定'=>array('channel/index'),
    '頻道 - '.Channel::model()->findByPk($model->channel_id)->name=>array('channel/view','id'=>$model->channel_id),
    '影片設定'=>array('index','channel_id'=>$model->channel_id),
    $model->name
)); ?>


<?php echo TbHtml::linkButton('回列表', 
                                                        array(
                                                            'icon'=>'th-list',
                                                            'url'=>Yii::app()->createUrl('video/index',array('channel_id'=>$model->channel_id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('video/create',array('channel_id'=>$model->channel_id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('更新', 
                                                        array(
                                                            'icon'=>'pencil',
                                                            'color' => TbHtml::BUTTON_COLOR_WARNING,
                                                            'url'=>Yii::app()->createUrl('video/update', array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::button('刪除', 
                                                        array(
                                                            'loading' => '處理中...',
                                                            'icon'=>'trash',
                                                            'color' => TbHtml::BUTTON_COLOR_DANGER,
                                                            'onclick'=>'deleteAjax("'.Yii::app()->createUrl('video/delete',array('id'=>$model->id,'ajax'=>1)).'","'.$model->id.'","'.Yii::app()->createUrl('video/admin',array('channel_id'=>$model->channel_id)).'");',
                                                            'url'=>Yii::app()->createUrl('channelAd/delete',array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('video/admin',array('channel_id'=>$model->channel_id))
                                                       )); ?>
<br><br>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'channel_id',
		'name',
		'video_code',
                                       array(
                                           'name'=>'',
                                           'type'=>'raw',
                                           'value'=>'<iframe width="420" height="315" src="//www.youtube.com/embed/'.$model->video_code.'" frameborder="0" allowfullscreen></iframe>',
                                       ),
                                       array(
                                           'name'=>'photo',
                                           'type'=>'raw',
                                           'value'=>'<img src="'.$model->photo.'" style="max-width:200px" >',
                                       ),
		'remark',
                                       'seq',
		array(
                                            'name'=>'vw',
                                            'value'=>Yii::app()->params->vwStatus[$model->vw]
                                      )
	),
)); ?>
