<?php
/* @var $this FgUserController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Fg Users',
);

$this->menu=array(
	array('label'=>'Create FgUser','url'=>array('create')),
	array('label'=>'Manage FgUser','url'=>array('admin')),
);
?>

<h1>Fg Users</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>