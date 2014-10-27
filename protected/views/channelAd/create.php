<?php echo TbHtml::breadcrumbs(array(
    '頻道設定'=>array('channel/index'),
    '頻道 - '.Channel::model()->findByPk($channel_id)->name=>array('channel/view','id'=>$channel_id),
    '廣告設定'=>array('index','channel_id'=>$channel_id),
    '新增'
)); ?>

<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('channelAd/create',array('channel_id'=>$channel_id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('channelAd/admin',array('channel_id'=>$channel_id))
                                                       )); 
?>

<?php $this->renderPartial('_form', array('model'=>$model,'channel_id'=>$channel_id)); ?>