<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class='jumbotron'>
	<div class='container'>
		<div class='row'>
			<div class='span2'><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/logo.jpg","logo Atlas"); ?></div>
			<div class='span7 offset2'>
				<h1>Bienvenue sur <? echo CHtml::encode(Yii::app()->name);?>,</h1>
				<p>le support de notre connaissance</p>

				<div class='row'>
					<br/><br/>
					<div class='well blockquote pull-right'><em>Mieux vaut savoit tout chercher que chercher à tout savoir...</em></div>
				</div>		
			</div>
		</div>
		
	</div>
</div>

<h2>Utilisation</h2>
<p>Le site est constitué sous forme de wiki ou chaqun peut (est encouragé même) modifier le contenu des pages et ainsi maintenir une documentation <strong>la plus à jour possible</strong></p>
<p><?php echo CHtml::link('Les espaces',CHtml::normalizeUrl(array('space/index'))) ;?> permettent d'orgnaiser le contenu par thème</p>

