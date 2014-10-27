<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom_style.css" />
        
                     <!--Angularjs-->
                     <?php //  Yii::app()->getClientScript()->registerScriptFile(Yii::app()->baseUrl.'/js/angular.min.js');?>
                     <?php Yii::app()->bootstrap->register(); ?>      
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<div id="header">
            <!--<div id="logo"><img src="<?php echo Yii::app()->request->baseUrl."/images/image/logo_red.png"?>" width="80" align="middle"> <?php echo CHtml::encode(Yii::app()->name); ?></div>-->
	<div id="logo"><img src="<?php echo Yii::app()->request->baseUrl."/images/image/fashionguide.gif"?>" ><!--FashionGuide!--> 開發測試版本</div>
                    </div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
//				array('label'=>'類別設定', 'url'=>array('category/index'),'active' => $this->main_menu == 'category' ? true : false),
//				array('label'=>'頻道設定', 'url'=>array('channel/index'),'active' => $this->main_menu == 'channel' ? true : false),
                                                                             array('label'=>'個人資訊設定', 'url'=>array('person/index'),'active' => $this->main_menu == 'person' ? true : false),
                                                                             array('label'=>'全螢幕廣告設定', 'url'=>array('fullscreenAd/index'),'active' => $this->main_menu == 'fullscreen_ad' ? true : false),
                                                                             array('label'=>'天氣', 'url'=>array('weather/index'),'active' => $this->main_menu == 'weather' ? true : false),
                                                                             array('label'=>'看板', 'url'=>array('board/index'),'active' => $this->main_menu == 'board' ? true : false),
//				array('label'=>'Contact', 'url'=>array('site/contact')),
//				array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
//				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
                                        'homeLink'=>CHtml::link('首頁',Yii::app()->homeUrl),
		  'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> 禾聯碩股份有限公司.<br/>
		All Rights Reserved.<br/>
		<?php // echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<script>
    function deleteAjax(url,id,goto){
        if(confirm('確定刪除此項目嗎')){
            $.ajax({
                url:url,
                type:"post",
                data:{id:id},
                success:function(){
                    location.href= goto;
                }
            })
        }
    }
</script>
</body>
</html>