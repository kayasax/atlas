<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class='jumbotron'>
	<div class='container'>
		<div class='row'>
			<div class='span2'><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/logo.jpg","logo Atlas"); ?></div>
			<div class='span7 offset2'>
				<h1>Bienvenue sur <?php echo CHtml::encode(Yii::app()->name);?>,</h1>
				<p>le wiki et l'espace documentaire dédié au support SMAC</p>

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

<div class='row'>

<div class='span6'>
	<div class='widget '>
	<div class='widget-header'> <i class='icon-file'></i><h3>Dernières modifications</h3></div>
	<div class='widget-content'>
			<ul class='unstyled'>
				<li><?php echo CHtml::link('test',CHtml::normalizeUrl(array('page/6'))); ?></li>
				<li>test2</li>
			</ul>
	</div>
	</div>
</div>


<div class='span6'>
	<div class='widget '>
	<div class='widget-header'> <i class='icon-heart'></i><h3>Mes favoris </h3></div>
	<div class='widget-content'>
		<ul class='unstyled'>
				<li><?php echo CHtml::link('Changelog',CHtml::normalizeUrl(array('page/7'))); ?></li>
				<li>test2</li>
		</ul>
		
	</div>
	</div>
</div>
</div> <!-- row-->

<div class='row'>

<div class='span6'>
	<div class='widget '>
	<div class='widget-header'> <i class='icon-file'></i><h3>Dernières modifications</h3></div>
	<div class='widget-content'>
			<ul class='unstyled'>
				<li><?php echo CHtml::link('test',CHtml::normalizeUrl(array('page/6'))); ?></li>
				<li>test2</li>
			</ul>
	</div>
	</div>
</div>


<div class='span6'>
	<div class='widget '>
	<div class='widget-header'> <i class='icon-file'></i><h3>Statistiques </h3></div>
	<div class='widget-content'>
		<dl class='dl-horizontal'>
			<dt>Nombre d'espace : </dt><dd>12</dd>
		</dl>
		
	</div>
	</div>
</div>
</div> <!-- row-->