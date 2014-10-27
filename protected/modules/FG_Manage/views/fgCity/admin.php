<?php
$this->breadcrumbs=array(
	'Fg Cities'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FgCity', 'url'=>array('index')),
	array('label'=>'Create FgCity', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#fg-city-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h1>Manage Fg Cities</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php

$gridColumns = array(
	array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
	array('name'=>'name', 'header'=>'縣市'),
	array('name'=>'direction.name', 'header'=>'區域','filter'=>CHtml::activeTextField($model,'direction')),
	array('name'=>'seq', 'header'=>'排序'),
	array(            // display a column with "view", "update" and "delete" buttons
            'htmlOptions'=>array('width'=>"40px",'style'=>'text-align: center'),
            'class'=>'CButtonColumn',
            'deleteConfirmation'=>'確定刪除此項目嗎?',
            'buttons'=>array(
                        'view'=>array(
                                                    'label'=>'詳細資料',
                                        ),
                        'update'=>array(
                                   'label'=>'更新',
                       ),
                        'delete'=>array(
                                                    'label'=>'刪除',
                                                    ),
                        ),
        ),
	
);
?>
<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'fg-city-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>$gridColumns,
	
)); ?>
