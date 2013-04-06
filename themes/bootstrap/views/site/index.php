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
	<div class='container'>
		<div class='row'>
			<div class='span2'><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/logo.jpg","logo Atlas"); ?></div>
			<div class='span7 offset2'>
				<h1>Bienvenue sur <?php echo CHtml::encode(Yii::app()->name);?>,</h1>
				<p>le wiki et l'espace documentaire dédié au support SMAC</p>

				<div class='row'>
					<br/><br/>
					<div class='label label-info pull-right '><h4><em>Mieux vaut savoir tout chercher que chercher à tout savoir...</em></h4></div>
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
	<h3 class='clean'>Utilisation</h3>
	<p>Le site est constitué sous forme de wiki ou chaqun peut (est encouragé même) modifier le contenu des pages et ainsi maintenir une documentation <strong>la plus à jour possible</strong></p>
	<p><?php echo CHtml::link('Les espaces',CHtml::normalizeUrl(array('space/index'))) ;?> permettent d'orgnaiser le contenu par thème</p>
</div>
</div>

<div class='row'>
    <div class='span6'>
        <?php $this->widget('Favorites');?>
    </div> <!-- /span6-->
    <div class='span6'>
        <div class='widget '>
        <div class='widget-header'> <h3> <i class='icon-calendar'></i>&nbsp; Activité récente</h3></div>
        <div class='widget-content'>
        <?php $this->widget('RecentActivity');?>

        </div>
        </div>
    </div> <!-- /span6-->
</div> <!-- row-->

<div class='row'>
    <div class='span6'>
          <?php $this->widget('Leaderboard');?>
    </div>
    <div class='span6'>
            <?php $this->widget('TagCloud');?>
    </div>
</div> <!-- row-->

<div class='span6'>
	<div class='widget '>
	<div class='widget-header'> <h3><i class='icon-file'></i>&nbsp;   Statistiques </h3></div>
	<div class='widget-content'>
		<dl class='dl-horizontal'>
			<dt>Nombre d'espace : </dt><dd>12</dd>
		</dl>
		
	</div>
	</div>
</div>