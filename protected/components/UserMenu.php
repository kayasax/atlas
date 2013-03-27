<?php
Yii::import('zii.widgets.CPortlet');

class UserMenu extends CPortlet
{
	public function init()
	{
		//$this->title="Mes actions";
		parent::init();
	}

	protected function renderContent()
	{
		$items=array(
        array('label'=>'Créer un espace', 'icon'=>'book 2x', 'url'=>Yii::app()->controller->createUrl('space/create',array('space'=>Yii::app()->request->getParam('id')))),
        );

        if( Yii::app()->controller->id == 'space' && Yii::app()->request->getParam('id')!='' ){
			$items[]=array('label'=>'Modifier cet espace','icon'=>'pencil 2x','url'=>Yii::app()->controller->createUrl('space/update',array('id'=>Yii::app()->request->getParam('id'))));
		}

		$items[]=array();
		$items[]=array('label'=>'Créer une page', 'icon'=>'file 2x','url'=>Yii::app()->controller->createUrl('page/create',array('idspace'=>Yii::app()->request->getParam('id'))));

		if( Yii::app()->controller->id == 'page' && Yii::app()->request->getParam('id')!='' ){
			$items[]=array('label'=>'Editer cette page','icon'=>'edit 2x','url'=>Yii::app()->controller->createUrl('page/update',array('id'=>Yii::app()->request->getParam('id'))));
			$items[]=array('label'=>'Ajouter un fichier','icon'=>'paper-clip 2x','url'=>Yii::app()->controller->createUrl('file/create',array('pageid'=>Yii::app()->request->getParam('id'))));
		}



		$this->render('userMenu',array(
			'items'=>$items,
			));
	}
}