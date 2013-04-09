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
                    $spacefavs=  array_filter(explode(',',$favs->spacefavs)) ;
                }
                if( count($favorites)==0 && count($spacefavs)==0 ){
                    echo "Vous n'avez pas encore enregistré de favori. <br/>
                        <p class='label label-info'>Info</p>
                        Cliquez sur l'icone <i class='icon-heart-empty'></i> en haut à droite des pages pour les ajouter à vos favoris";
                }
                else{
                    echo '<h6>Espaces</h6>';
                    echo '<ul class="unstyled">';
                    foreach ($spacefavs as $fav) {
                        $p=Space::model()->findByPk($fav);
                        echo "<li>". CHtml::link($p->name , Yii::app()->createUrl('space/view',array('id'=>$p->idspace)))."</li>";
                    }
                    echo '</ul>';
                    echo '<h6>Pages</h6>';
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