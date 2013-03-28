<?php
class ElfinderController extends CController
{
    public function actions()
    {
        /*var_dump($_GET);
        Yii::app()->end();*/
    	    	
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
        			'root' => Yii::getPathOfAlias('webroot') . '/files/'.$_GET['pageid'].'/',
        			'URL' => Yii::app()->baseUrl . '/files/'.$_GET['pageid'].'/',
        			'rootAlias' => Page::model()->findByPk($_GET['pageid'])->title,
        			'mimeDetect' => 'none'
        				)
        		),
        );
    }
}
?>