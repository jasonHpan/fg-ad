<?php
/* @var $this FgDeviceTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Fg Device Types',
);

$this->menu=array(
	array('label'=>'Create FgDeviceType','url'=>array('create')),
	array('label'=>'Manage FgDeviceType','url'=>array('admin')),
);
?>

<h1>Fg Device Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>