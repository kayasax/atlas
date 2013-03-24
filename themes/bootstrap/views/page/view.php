<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	$model->space0->name=>array('space/view/','id'=>$model->space0->idspace),
	'Pages'=>array('index'),
	$model->title,
);

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
		<div class='span4'><h2><?php echo $model->title; ?></h2><h5><?php echo $model->intro; ?></h5></div>
		<div class='span4'> 
			<ul class='unstyled'>
				<li><small> <i class='icon-time' title='Créé le'></i>  <?php echo $model->creationdate;?> <i class='icon-user' title='auteur'></i> <?php echo $model->author;?></small></li>
				<li><small> <i class='icon-pencil' title='Dernière modification'></i>  <?php echo $model->lasttouched;?> 
			</ul>
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
