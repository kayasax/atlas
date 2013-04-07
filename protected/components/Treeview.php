<?php
/**
* portet Nuage de tags
*/

Yii::import('zii.widgets.CPortlet');
 
class Treeview extends CPortlet
{
   
 
    	
    protected function renderContent()
    { 
        echo '<div class="box ">';
        $this->Widget(
        'CTreeView',
        array('url' => array('Ajax/ajaxFillTree'))
        );
        echo '</div>';
        
    }
}
?>