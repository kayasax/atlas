<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<!-- Affichage messages flash -->
<?php
$this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        /*'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger

        ),*/
    )); 
?>

<div class='well'>
    <div class='row'>
        <div class='span2'><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/logo.jpg","logo Atlas"); ?></div>
        <div class='span7 offset2'>
            <h1>Bienvenue sur <?php echo CHtml::encode(Yii::app()->name);?>,</h1>
            <p>le wiki et l'espace documentaire dédié au support SMAC</p>
            <div class='row'>
                    <div class='span5  pull-right clearfix '><h5><em>Mieux vaut savoir tout chercher que chercher à tout savoir...</em></h5></div>
            </div>		
            <div class='row'>
                <br/>
                <div class='clearfix pull-right' style='position:relative ; bottom:10'>
                    <a href="<?php echo Yii::app()->createUrl('site/page',array('view'=>'about'));?>"
                       class='btn btn-large btn-primary'>Découvrir Atlas&nbsp;<i class='icon-circle-arrow-right icon-2x'></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class='row'>
    <div class='span12' style='color:rgb(202, 202, 202)'>
    <?php
	 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        /*'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),*/
        )); 
    ?>
        <h4 class='clean'>Utilisation</h4>
	<p>Le site est constitué sous forme de wiki ou chaqun peut  modifier le contenu des pages et ainsi maintenir une documentation <strong>la plus à jour possible</strong></p>
	<p><?php echo CHtml::link('Les espaces',CHtml::normalizeUrl(array('space/index'))) ;?> permettent d'orgnaiser le contenu par thème.</p>
    </div>
</div>

<div class='row'>
    <div class='span6'>
        <!--Explorateur d'espace -->
        <?php  $this->widget('TreeView');?>
       
        <!-- Favoris -->
        <?php  $this->widget('Favorites');?>
        
        <!-- top pages -->
        <?php $this->widget('Leaderboard');?>
        
    </div> <!-- /span6--> 
    <div class='span6'>
        <!-- Tags -->
         <?php $this->widget('TagCloud');?>
        
        <!-- activité récente -->
       
                <?php $this->widget('RecentActivity');?>
            
    </div> <!-- /span6-->
    
</div> <!-- row-->


