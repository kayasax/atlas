<?php
/**
* portlet favorites
*/

Yii::import('zii.widgets.CPortlet');
 
class Favorites extends CPortlet
{
    	
    protected function renderContent()
    {?><div class='widget'>
            <div class='widget-header'> <h3><i class='icon-heart'></i>&nbsp;  Mes favoris </h3></div>
            <div class='widget-content'>
            <?php
            if( Yii::app()->user->isGuest){
                echo "Vous devez être connecté pour afficher vos favoris";
            }
            else{
                $favs=  Userprofile::model()->findByPk(Yii::app()->user->id);
                if($favs !== NULL){
                    $favorites=  array_filter(explode(',',$favs->favorites)) ;        
                }
                if(count($favorites)==0){
                    echo "Vous n'avez pas encore enregistré de favori. <br/>
                        <p class='label label-info'>Info</p>
                        Cliquez sur l'icone <i class='icon-heart-empty'></i> en haut à droite des pages pour les ajouter à vos favoris";
                }
                else{
                    echo '<ul class="unstyled">';
                    foreach ($favorites as $fav) {
                        $p=Page::model()->findByPk($fav)->with('space0');
                        echo "<li>". CHtml::link($p->title." {".$p->space0->name."}"  , Yii::app()->createUrl('page/view',array('id'=>$p->idpage)))."</li>";
                    }
                    echo '</ul>';
                }
                ;?>
                
            </div>
        </div>
<?php
    }
    }   
}
?>