<?php
/* @var $this WeatherController */
/* @var $model Weather */
?>

<?php
$this->breadcrumbs=array(
	'天氣'=>array('index'),
	$model->id,
);


?>


<?php echo TbHtml::linkButton('回列表', 
                                                        array(
                                                            'icon'=>'th-list',
                                                            'url'=>Yii::app()->createUrl('weather/index',array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('weather/create',array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('更新', 
                                                        array(
                                                            'icon'=>'pencil',
                                                            'color' => TbHtml::BUTTON_COLOR_WARNING,
                                                            'url'=>Yii::app()->createUrl('weather/update', array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::button('刪除', 
                                                        array(
                                                            'loading' => '處理中...',
                                                            'icon'=>'trash',
                                                            'color' => TbHtml::BUTTON_COLOR_DANGER,
                                                            'onclick'=>'deleteAjax("'.Yii::app()->createUrl('weather/delete',array('id'=>$model->id,'ajax'=>1)).'","'.$model->id.'","'.Yii::app()->createUrl('weather/admin',array('id'=>$model->id)).'");',
                                                            'url'=>Yii::app()->createUrl('weather/delete',array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('weather/admin',array('id'=>$model->id))
                                                       )); ?>
<br><br>


<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		array(
			 'name'=>'city_id',
             'value'=>$model->getRelated('city')->city_name,
			),
		'date_time',
		array(
			'name'=>'type_id',
			'value'=>$model->getRelated('type')->name,
			),
	),
)); ?>