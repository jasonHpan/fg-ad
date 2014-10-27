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
    '天氣設定'=>array('index'),
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
                                                            'url'=>Yii::app()->createUrl('weather/index')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('weather/create')
                                                        )); 
?>&nbsp;

<?php 
            $this->widget('zii.widgets.grid.CGridView', array(
            	'id'=>'weather-grid',
                'dataProvider'=>$model->search(),
                'filter'=>$model,
                'summaryText' => '您可在以下輸入框輸入運算符號 (<, <=, >, >=, <> or =) 搜尋出符合之結果',
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
                                    'name'=>'date_time',
                                    // 'value'=>'var_dump($this)'
                                ),  
                                array(
                                    'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                    'name'=>'city_id',
                                    'value'=>'$data->getRelated("city")->city_name'
                                ),          // display the 'title' attribute
                                 array(
                                    'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                    'name'=>'type_id',
                                    'value'=>'$data->getRelated("type")->name'
                                ),  
                                array(            // display a column with "view", "update" and "delete" buttons
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
));?>
