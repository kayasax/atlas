<?php
/**
* portlet favorites
*/

Yii::import('zii.widgets.CPortlet');
 
class Favorites extends CPortlet
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
        $favs=  Userprofile::model()->findByPk(Yii::app()->user->id);
        $favorites=  array_filter(explode(',',$favs->favorites)) ;
        /*var_dump(array_slice($favorites,0));
        Yii::app()->end();*/
    
	?>	
        
        <div class='widget '>
            <div class='widget-header'> <h3><i class='icon-heart'></i>&nbsp;  Mes favoris </h3></div>
            <div class='widget-content'>
                <ul class='unstyled'>
                <?php 
                if(count($favorites)==0){
                    echo "Vous n'avez pas encore enregistré de favori. <br/>
                        <p class='label label-info'>Info</p>
                        Cliquez sur l'icone <i class='icon-heart-empty'></i> en haut à droite des pages pour les ajouter à vos favoris";
                }
                else{
                foreach ($favorites as $fav) {
                    //echo $fav;
                    $p=Page::model()->findByPk($fav)->with('space0');
                    //var_dump($p->space0->name);
                    echo "<li>". CHtml::link($p->title." {".$p->space0->name."}"  , Yii::app()->createUrl('page/view',array('id'=>$p->idpage)))."</li>";
                    
                    
                }
                }
                ;?>
                </ul>

            </div>
        </div>
        
<?php
    }
}

?>