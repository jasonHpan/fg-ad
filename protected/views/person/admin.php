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
    '個人資訊設定'=>array('index'),
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
                                                            'url'=>Yii::app()->createUrl('person/index')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('person/create')
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
                                                'name'=> 'uid',
                                       ),
                                      array(
                                          'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                          'name'=>'news',
                                          'value'=>'Yii::app()->params->vwStatus[$data->news]',
                                          'filter'=>CHtml::dropDownList('Person[news]', 'news',  
                                                                                array(
                                                                                    '' =>'',
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->news=>array('selected'=>true)))
                                                                                ),
                                      ),
                                      array(
                                          'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                          'name'=>'stock',
                                          'value'=>'Yii::app()->params->vwStatus[$data->stock]',
                                          'filter'=>CHtml::dropDownList('Person[stock]', 'stock',  
                                                                                array(
                                                                                    '' =>'',
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->stock=>array('selected'=>true)))
                                                                                ),
                                      ),
                                      array(
                                          'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                          'name'=>'lottery',
                                          'value'=>'Yii::app()->params->vwStatus[$data->lottery]',
                                          'filter'=>CHtml::dropDownList('Person[lottery]', 'lottery',  
                                                                                array(
                                                                                    '' =>'',
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->lottery=>array('selected'=>true)))
                                                                                ),
                                      ),
                                      array(
                                          'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                          'name'=>'coupon',
                                          'value'=>'Yii::app()->params->vwStatus[$data->coupon]',
                                          'filter'=>CHtml::dropDownList('Person[coupon]', 'coupon',  
                                                                                array(
                                                                                    '' =>'',
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->coupon=>array('selected'=>true)))
                                                                                ),
                                      ),
                                      array(
                                          'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                          'name'=>'luck',
                                          'value'=>'Yii::app()->params->vwStatus[$data->luck]',
                                          'filter'=>CHtml::dropDownList('Person[luck]', 'luck',  
                                                                                array(
                                                                                    '' =>'',
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->luck=>array('selected'=>true)))
                                                                                ),
                                      ),
                                      array(
                                          'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                          'name'=>'poll',
                                          'value'=>'Yii::app()->params->vwStatus[$data->poll]',
                                          'filter'=>CHtml::dropDownList('Person[poll]', 'poll',  
                                                                                array(
                                                                                    '' =>'',
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->poll=>array('selected'=>true)))
                                                                                ),
                                      ),
                                       array(
                                          'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                          'name'=>'weather',
                                          'value'=>'Yii::app()->params->vwStatus[$data->weather]',
                                          'filter'=>CHtml::dropDownList('Person[weather]', 'weather',  
                                                                                array(
                                                                                    '' =>'',
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->weather=>array('selected'=>true)))
                                                                                ),
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
