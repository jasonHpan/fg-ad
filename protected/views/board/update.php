<?php
/* @var $this BoardController */
/* @var $model Board */
?>

<?php
$this->breadcrumbs=array(
	'看板'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'更新',
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

<?php $this->renderPartial('_form', array('model'=>$model)); ?>