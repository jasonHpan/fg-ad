<?php
/* @var $this BoardController */
/* @var $model Board */
?>

<?php
$this->breadcrumbs=array(
	'看板'=>array('index'),
	$model->title,
);


?>


<?php echo TbHtml::linkButton('回列表', 
                                                        array(
                                                            'icon'=>'th-list',
                                                            'url'=>Yii::app()->createUrl('board/index',array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('board/create',array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('更新', 
                                                        array(
                                                            'icon'=>'pencil',
                                                            'color' => TbHtml::BUTTON_COLOR_WARNING,
                                                            'url'=>Yii::app()->createUrl('board/update', array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::button('刪除', 
                                                        array(
                                                            'loading' => '處理中...',
                                                            'icon'=>'trash',
                                                            'color' => TbHtml::BUTTON_COLOR_DANGER,
                                                            'onclick'=>'deleteAjax("'.Yii::app()->createUrl('board/delete',array('id'=>$model->id,'ajax'=>1)).'","'.$model->id.'","'.Yii::app()->createUrl('board/admin',array('id'=>$model->id)).'");',
                                                            'url'=>Yii::app()->createUrl('board/delete',array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('board/admin',array('id'=>$model->id))
                                                       )); ?>
<br><br>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'title',
        array('label'=>'看板內容','value'=>$model->getContent()),
		// 'content',
		// 'image',
		array('label'=>'右側看板圖片','type'=>'image','value'=>$model->getImage()),
        array('label'=>'上下架狀態','value'=>$model->getStatus()),
	),
)); ?>