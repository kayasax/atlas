<?php
Yii::import('zii.widgets.CPortlet');

class UserMenu extends CPortlet
{
	public function init()
	{
		$this->title="Mes actions";
		parent::init();
	}

	protected function renderContent()
	{
		$this->render('userMenu');
	}
}