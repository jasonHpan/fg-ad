<?php
/* @var $this FgBranchController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Fg Branches',
);

$this->menu=array(
	array('label'=>'Create FgBranch','url'=>array('create')),
	array('label'=>'Manage FgBranch','url'=>array('admin')),
);
?>

<h1>Fg Branches</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>