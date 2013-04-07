<?php
class ElfinderController extends CController
{
    public function actions()
    {
        /*var_dump($_GET);
        Yii::app()->end();*/
    	if (isset($_GET['pageid'])){
            $urlData=$_GET['pageid'].'/';
            $titre=Page::model()->findByPk($_GET['pageid'])->title;
        }
        else {
            $urlData='';
            $titre='root';
        }
 
                
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
        			'root' => Yii::getPathOfAlias('webroot') . '/files/'.$urlData, //Set root to pageid folder 
        			'URL' => Yii::app()->baseUrl . '/files/'.$urlData,
        			'rootAlias' =>$titre ,
        			'mimeDetect' => 'none',
                    /**
                    * @todo personaliser les droits d'acces, supprimer le bouton favoris,
                    */
        				)
        		),
        );
    }
}
?>