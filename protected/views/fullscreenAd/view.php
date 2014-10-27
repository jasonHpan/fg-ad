<?php echo TbHtml::breadcrumbs(array(
    '類別設定'=>array('index'),
    '詳細資料 - '.$model->name
)); ?>

<?php echo TbHtml::linkButton('回列表', 
                                                        array(
                                                            'icon'=>'th-list',
                                                            'url'=>Yii::app()->createUrl('fullscreenAd/index')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('fullscreenAd/create')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('更新', 
                                                        array(
                                                            'icon'=>'pencil',
                                                            'color' => TbHtml::BUTTON_COLOR_WARNING,
                                                            'url'=>Yii::app()->createUrl('fullscreenAd/update', array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::button('刪除', 
                                                        array(
                                                            'loading' => '處理中...',
                                                            'icon'=>'trash',
                                                            'color' => TbHtml::BUTTON_COLOR_DANGER,
                                                            'onclick'=>'deleteAjax("'.Yii::app()->createUrl('fullscreenAd/delete',array('id'=>$model->id,'ajax'=>1)).'","'.$model->id.'","'.Yii::app()->createUrl('fullscreenAd/admin').'");',
                                                            'url'=>Yii::app()->createUrl('fullscreenAd/delete',array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('fullscreenAd/admin')
                                                       )); ?>
<br><br>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
                                       'desp',
		//'remark',
                                       'delay',
                                       'seq',
                                       array(
                                            'name'=>'vw',
                                            'value'=>Yii::app()->params->vwStatus[$model->vw]
                                      )
            
	),
)); ?>
