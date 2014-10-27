<?php
/* @var $this FgPlaceController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Fg Places',
);

$this->menu=array(
	array('label'=>'Create FgPlace','url'=>array('create')),
	array('label'=>'Manage FgPlace','url'=>array('admin')),
);
?>

<h1>Fg Places</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>