<?php
/* @var $this CategoryController */
/* @var $model Category */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo TbHtml::breadcrumbs(array(
    '類別設定'=>array('index'),
    '搜尋'
)); ?>


<?php // echo CHtml::link('進階搜尋','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php echo TbHtml::linkButton('回列表', 
                                                        array(
                                                            'icon'=>'th-list',
                                                            'url'=>Yii::app()->createUrl('category/index')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('category/create')
                                                        )); 
?>&nbsp;


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
                   'summaryText' => '您可在以下輸入框輸入運算符號 (<, <=, >, >=, <> or =) 搜尋出符合之結果',
	'filter'=>$model,
                        'pager'=>array(
                            'prevPageLabel' =>'上一頁',
                            'firstPageLabel' => '首頁', 
                            'nextPageLabel' => '下一頁',
                            'lastPageLabel' => '末頁',
                            'header' => '',
                        ),
	'columns'=>array(
                                      array(
                                                'htmlOptions'=>array('width'=>"40px",'style'=>'text-align: center'),
                                                'name'=>'流水號',
                                                'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                                                'filter'=>false,
                                          ),
		array(
                                                'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                                'name'=> 'id',
                                       ),
		'name',
                                      array(
                                          'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                          'name'=>'vw',
                                          'value'=>'Yii::app()->params->vwStatus[$data->vw]',
                                          'filter'=>CHtml::dropDownList('Category[vw]', 'vw',  
                                                                                array(
                                                                                    '' =>'',
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->vw=>array('selected'=>true)))
                                                                                ),
//                                          'filter'=>CHtml::listData(Category::model()->findAll(), 'vw', "Yii::app()->params->vwStatus[vw]"),
                                      ),
		array(
                                                'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                                'name'=>'seq',
                                      ),
		array(
                                                            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
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
	),
)); ?>
