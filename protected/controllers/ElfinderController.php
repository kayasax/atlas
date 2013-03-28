<?php
class ElfinderController extends CController
{
    public function actions()
    {
    	    	
        return array(
            'connector' => array(
                'class' => 'ext.elFinder.ElFinderConnectorAction',
                'settings' => array(
                    'root' => Yii::getPathOfAlias('webroot') . '/uploads/',
                    'URL' => Yii::app()->baseUrl . '/uploads/',
                    'rootAlias' => 'Home',
                    'mimeDetect' => 'none'
                )
            ),
        	'pageConnector' => array(
        		'class' => 'ext.elFinder.ElFinderConnectorAction',
        		'settings' => array(
        			'root' => Yii::getPathOfAlias('webroot') . '/files/'.$_GET['id'],
        			'URL' => Yii::app()->baseUrl . '/files/'.$_GET['id'],
        			'rootAlias' => 'Home',
        			//'mimeDetect' => 'none'
        				)
        		),
        );
    }
}
?>