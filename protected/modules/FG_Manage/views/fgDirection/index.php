<?php
/* @var $this FgDirectionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Fg Directions',
);

$this->menu=array(
	array('label'=>'Create FgDirection','url'=>array('create')),
	array('label'=>'Manage FgDirection','url'=>array('admin')),
);
?>

<h1>Fg Directions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>