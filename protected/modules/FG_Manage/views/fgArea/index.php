<?php
/* @var $this FgAreaController */
/* @var $dataProvider CActiveDataProvider */

?>

<?php
$this->breadcrumbs=array(
	'Fg Areas',
);

$this->menu=array(
	array('label'=>'Create FgArea','url'=>array('create')),
	array('label'=>'Manage FgArea','url'=>array('admin')),
);

?>

<h1>Fg Areas</h1>

<?php 

$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
?>