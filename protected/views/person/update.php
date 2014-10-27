<?php echo TbHtml::breadcrumbs(array(
    '個人資訊設定'=>array('index'),
    '詳細資料 - '.$model->uid =>array('view','id'=>$model->id),
    '更新 - '.$model->uid
)); ?>

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
<?php echo TbHtml::linkButton('詳細資料', 
                                                        array(
                                                            'icon'=>'file',
                                                            'color' => TbHtml::BUTTON_COLOR_INVERSE,
                                                            'url'=>Yii::app()->createUrl('person/view',array( 'id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('person/admin')
                                                       )); ?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>