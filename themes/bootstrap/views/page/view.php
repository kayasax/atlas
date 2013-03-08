<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
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

<h1>View Page #<?php echo $model->idpage; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
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
)); ?>
