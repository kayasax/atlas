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
		$operation='créée';
		$url="<a href='".Yii::app()->controller->createUrl('page/view',array('id'=>$event->sender->idpage))."'>".$event->sender->title."</a>";
		$this->updateActivity($type,$operation,$url);
		
	}

	public function pageUpdated($event){	
		
		$type='la page';
		$operation='modifiée';
		$url="<a href='".Yii::app()->controller->createUrl('page/view',array('id'=>$event->sender->idpage))."'>".$event->sender->title."</a>";
		$this->updateActivity($type,$operation,$url);
		
	}
}
?>