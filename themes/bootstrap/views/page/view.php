<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	$model->space0->name=>array('space/view/','id'=>$model->space0->idspace),
	'Pages'=>array('index'),
	$model->title,
);

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/page.js',CClientScript::POS_END);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
	array('label'=>'Update Page', 'url'=>array('update', 'id'=>$model->idpage)),
	array('label'=>'Delete Page', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idpage),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Page', 'url'=>array('admin')),
);
?>

<div class='well'>
	<div class='row'>
		<div class='span6'><h2><?php echo $model->title; ?></h2><h5><?php echo $model->intro; ?></h5></div>
		<div class='span2'> 
			<ul class='unstyled'>
				<li><small> <i class='icon-user' title='auteur'></i> <?php echo $model->author0->username;?></small></li>
				<li><small> <i class='icon-time' title='Créé le'></i>  <?php echo $model->creationdate;?> </small></li>
				<li><small> <i class='icon-pencil' title='Dernière modification'></i>  <?php echo $model->lasttouched;?> 
			</ul>
		</div>
	</div> <!-- / row -->
	

	<div class='row'>
		<div class='span8'>
			<a href='#' id='showFile'><i class='icon-paper-clip icon-2x'></i> Voir les fichiers attachés (<?php echo $model->nbFiles;?>)</a>
			<div id='files' style='display:none'>
			<?php $this->widget('ext.elFinder.ElFinderWidget', array(
		        'connectorRoute' => 'Elfinder/pageConnector/',
		        ));?>
			</div>
		</div>
	</div>
</div>

<div class='widget '>
	<div class='widget-content'>
	<?php echo $model->content; ?>
	</div>
</div>


<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idpage',
		'title',
		'intro',
		'content',
		'creator',
		'creation',
		'last_modification',
		'modified_by',
	),
)); */?>
