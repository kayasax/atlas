<?php
/**
* portet Nuage de tags
*/

Yii::import('zii.widgets.CPortlet');
 
class Treeview extends CPortlet
{
   
 
    	
    protected function renderContent()
    { 
        ?>
        <div class='widget'>
            <div class='widget-header'>
                <h3><i class='icon-sitemap'></i>&nbsp; Explorateur d'espaces</h3>
            </div>
            <div class='widget-content'>
            
        <?php
        $this->Widget('CTreeView',array(
            'collapsed'=>'true',
            'url' => array('Ajax/ajaxFillTree'),
            'animated'=>'fast',
            'htmlOptions'=>array('class'=>'treeview-famfamfam')
         )
    
        );
        echo '</div></div>';
    }
}
?>