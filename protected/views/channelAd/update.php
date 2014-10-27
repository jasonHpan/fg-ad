<?php echo TbHtml::breadcrumbs(array(
    '頻道設定'=>array('channel/index'),
    '頻道 - '.Channel::model()->findByPk($model->channel_id)->name=>array('channelAd/view','id'=>$model->channel_id),
    '廣告設定'=>array('index','channel_id'=>$model->channel_id),
    '詳細資料 - '.$model->name=>array('view','id'=>$model->id),
    '更新'
)); ?>

<?php echo TbHtml::linkButton('回列表', 
                                                        array(
                                                            'icon'=>'th-list',
                                                            'url'=>Yii::app()->createUrl('channelAd/index',array('channel_id'=>$model->channel_id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('channelAd/create',array('channel_id'=>$model->channel_id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('詳細資料', 
                                                        array(
                                                            'icon'=>'file',
                                                            'color' => TbHtml::BUTTON_COLOR_INVERSE,
                                                            'url'=>Yii::app()->createUrl('channelAd/view',array( 'id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('channelAd/admin',array('channel_id'=>$model->channel_id))
                                                       )); ?>

<?php $this->renderPartial('_form', array('model'=>$model,'channel_id'=>$model->channel_id,   )); ?>