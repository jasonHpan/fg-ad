<?php echo TbHtml::breadcrumbs(array(
    '類別設定'=>array('index'),
    '新增'
)); ?>

<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('fullscreenAd/create')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('fullscreenAd/admin')
                                                       )); 
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>