<?php
/**
* Gestion des événements transmis par les composants
**/

class EventCollector
{

	/**
	* Update site activity table
	*/
	private function updateActivity($type,$operation,$url){
		$act=new Activity();
		$act->type=$type;
		$act->operation=$operation;
		$act->operator=Yii::app()->user->id;
		$act->url=$url;
		$act->date=new CDbExpression('NOW()');

		$act->save();
	}

	public function pageCreated($event){	
		
		$type='une page';
		$operation='créé';
		$url="<a href='".Yii::app()->controller->createUrl('page/view',array('id'=>$event->sender->idpage))."'>".$event->sender->title."</a>";
		$this->updateActivity($type,$operation,$url);
		
	}

	public function pageUpdated($event){	
		
		$type='la page';
		$operation='modifié';
		$url="<a href='".Yii::app()->controller->createUrl('page/view',array('id'=>$event->sender->idpage))."'>".$event->sender->title."</a>";
		$this->updateActivity($type,$operation,$url);
		
	}


	public function SpaceCreated($event){	
		
		$type='un espace';
		$operation='créé';
		$url="<a href='".Yii::app()->controller->createUrl('space/view',array('id'=>$event->sender->idspace))."'>".$event->sender->name."</a>"; //.$event->sender->idspace.   
		$this->updateActivity($type,$operation,$url);
		echo "test";
		
		
	}

	public function SpaceUpdated($event){	
		
		$type='l\'espace';
		$operation='modifié';
		$url="<a href='".Yii::app()->controller->createUrl('space/view',array('id'=>$event->sender->idspace))."'>".$event->sender->name."</a>";
		$this->updateActivity($type,$operation,$url);
		
	}
}
?>