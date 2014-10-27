<?php echo TbHtml::breadcrumbs(array(
    '頻道設定'=>array('index'),
    '詳細資料 - '.$model->name
)); ?>


<?php echo TbHtml::linkButton('回列表', 
                                                        array(
                                                            'icon'=>'th-list',
                                                            'url'=>Yii::app()->createUrl('channel/index')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('channel/create')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('更新', 
                                                        array(
                                                            'icon'=>'pencil',
                                                            'color' => TbHtml::BUTTON_COLOR_WARNING,
                                                            'url'=>Yii::app()->createUrl('channel/update', array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::button('刪除', 
                                                        array(
                                                            'loading' => '處理中...',
                                                            'icon'=>'trash',
                                                            'color' => TbHtml::BUTTON_COLOR_DANGER,
                                                            'onclick'=>'deleteAjax("'.Yii::app()->createUrl('channel/delete',array('id'=>$model->id,'ajax'=>1)).'","'.$model->id.'","'.Yii::app()->createUrl('channel/admin').'");',
                                                            'url'=>Yii::app()->createUrl('channel/delete',array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('channel/admin')
                                                       )); ?>
<br><br>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
                                       array(
                                           'name'=>'category_id',
                                           'value'=>$model->oCategory->name
                                       ),
                                       'name',
		'tv_channel',
		array(
                                            'name'=>'youtube_channel',
                                            'type'=>'raw',
                                             'value'=>'<a href="'.$model->youtube_channel.'" target="_blank">'.$model->youtube_channel.'</a>',
                                       ),
		'first_video',
                                       array(
                                           'name'=>'',
                                           'type'=>'raw',
                                           'value'=>'<iframe width="420" height="315" src="//www.youtube.com/embed/'.$model->first_video.'" frameborder="0" allowfullscreen></iframe>',
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
