<?php
/* @var $this ChannelAdController */
/* @var $model ChannelAd */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#channel-ad-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo TbHtml::breadcrumbs(array(
    '頻道設定'=>array('category/index'),
    '頻道 - '.Channel::model()->findByPk($channel_id)->name=>array('channel/view','id'=>$channel_id),
    '廣告設定'=>array('index','channel_id'=>$channel_id),
    '搜尋'
)); ?>


<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php echo TbHtml::linkButton('回列表', 
                                                        array(
                                                            'icon'=>'th-list',
                                                            'url'=>Yii::app()->createUrl('channelAd/index',array('channel_id'=>$channel_id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('channelAd/create',array('channel_id'=>$channel_id))
                                                        )); 
?>&nbsp;

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'channel-ad-grid',
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
                                          'filter'=>CHtml::dropDownList('ChannelAd[vw]', 'vw',  
                                                                                array(
                                                                                    '' =>'',
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->vw=>array('selected'=>true)))
                                                                                ),
                                      ),
		's_date',
		'e_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
