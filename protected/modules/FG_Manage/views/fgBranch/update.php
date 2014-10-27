<?php
/* @var $this FgBranchController */
/* @var $model FgBranch */
?>

<?php
$this->breadcrumbs=array(
	'Fg Branches'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FgBranch', 'url'=>array('index')),
	array('label'=>'Create FgBranch', 'url'=>array('create')),
	array('label'=>'View FgBranch', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FgBranch', 'url'=>array('admin')),
);
?>

    <h1>Update FgBranch <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>