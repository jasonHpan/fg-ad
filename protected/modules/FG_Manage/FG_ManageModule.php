<?php

class FG_ManageModule extends CWebModule
{
	public function init()
	{
		Yii::setPathOfAlias('bootstrap', realpath(__DIR__ . '/../../extensions/bootstrap'));
		Yii::setPathOfAlias('yiiwheels', realpath(__DIR__ . '/../../extensions/yiiwheels'));
		Yii::setPathOfAlias('booster', realpath(__DIR__ . '/../../extensions/yiibooster'));
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
//		$this->layoutPath="//protected/modules/FG_Manage/views";

		// import the module-level models and components
		$this->setImport(array(
			// 'application.models.*',
			// 'application.components.*',
			'FG_Manage.models.*',
			'FG_Manage.components.*',
			'bootstrap.helpers.TbHtml',
	          'bootstrap.helpers.TbArray',
	          'bootstrap.behaviors.TbWidget',
	          'bootstrap.widgets.*',
	          // 'bootstrap.components.TbApi',
	          'yiiwheels.widgets.*',  
	          'bootstrap.*', 
	          'booster.components.Bootstrap',

		));
		Yii::app()->getComponent('bootstrap');// this does the loading
		
		// Yii::app()->getComponent('booster');// this does the loading
		// $this->setComponent();
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
