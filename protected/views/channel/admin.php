<?php
/* @var $this ChannelController */
/* @var $model Channel */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#channel-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo TbHtml::breadcrumbs(array(
    '頻道設定'=>array('index'),
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
                                                            'url'=>Yii::app()->createUrl('channel/index')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('channel/create')
                                                        )); 
?>&nbsp;

<?php
            $this->widget('zii.widgets.grid.CGridView', array(
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
                                                        array(
                                                            'htmlOptions'=>array('width'=>"100px"),
                                                            'name'=>'category_id',
                                                            'value'=>'$data->oCategory->name',
                                                            'filter'=>CHtml::listData(Category::model()->findAll(),'id','name'),
                                                        ),
                                                        'name',  
                                                        'tv_channel',
                                                        array(
                                                            'htmlOptions'=>array('width'=>"110px",'style'=>'text-align: center'),
                                                            'name'=>'youtube_channel',
                                                            'type' => 'raw',
                                                            'value'=>function($data){ return "<a href='".$data->youtube_channel."' target='_blank'><img src='".Yii::app()->request->baseUrl."/images/image/youtube_icon.jpg"."' width='80'></a>";},
                                                            'filter'=>false,
                                                        ),
                                                         array(            // display 'create_time' using an expression
                                                            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                                            'name'=>'vw',
                                                            'value'=>'Yii::app()->params->vwStatus[$data->vw]',
                                                            'filter'=>CHtml::dropDownList('Channel[vw]', 'vw',  
                                                                                array(
                                                                                    '' =>'',
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->vw=>array('selected'=>true)))
                                                                                ),
                                                        ),
                                                        array(
                                                                    'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                                                    'name'=>'seq',
                                                          ),
                                                         array(
                                                            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                                            'name'=>'廣告設定',
                                                            'type'=>'raw',
                                                            'value'=>function($data){ return "<a href='".Yii::app()->createUrl('channelAd/index', array('channel_id' => $data->id))."' ><img src='".Yii::app()->request->baseUrl."/images/image/ad_icon.png"."' width='50'></a>";},
                                                            'filter'=>false,
                                                        ),
                                                        array(
                                                            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                                            'name'=>'影片設定',
                                                            'type'=>'raw',
                                                            'value'=>function($data){ return "<a href='".Yii::app()->createUrl("video/index", array("channel_id"=>$data->id))."'><img src='".Yii::app()->request->baseUrl."/images/image/video_icon.png"."' width='40'></a>";},
                                                            'filter'=>false,
                                                        ),
                                                        array(            // display a column with "view", "update" and "delete" buttons
                                                            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                                            'class'=>'CButtonColumn',
                                                            'deleteConfirmation'=>'確定刪除此項目嗎?',
//                                                            'template'=>'{view}{update}{delete}{video}',
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
//                                                                                                'video'=>array(
//                                                                                                                'label'=>'影片列表',
//                                                                                                                'imageUrl'=>Yii::app()->request->baseUrl.'/assets/custom_icon/video.png',
//                                                                                                                'url'=>'Yii::app()->createUrl("video/index", array("channel_id"=>$data->id))',
//                                                                                                                'options'=>array('class'=>'video'),
//                                                                                                                'visible'=>'true',
//                                                                                                ),
                                                                                ),
                                                        ),
                                                    ),
));?>
