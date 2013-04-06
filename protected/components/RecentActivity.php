<?php
/**
* portlet recent activity
*/

Yii::import('zii.widgets.CPortlet');
 
class RecentActivity extends CPortlet
{
    public $title='';
    /*public $maxTags=20;
    public $htmlOption=array('class'=>'widget');*/
 
	public function init()
	{
		//$this->title="Mes actions";
		parent::init();
	} 
    protected function renderContent()
    { 
		$dataProvider=new CActiveDataProvider('Activity', array(

				'criteria'=>array(
					'order'=>'date DESC',		
					'with'=>array('operator0','operator0.userprofile'),
				),
				'pagination'=>array(
						'pageSize'=>10,
				),

		));
		echo"<ul class='unstyled' ";
        $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_activity',
				
		));
        echo"</ul>";
    }
}
?>