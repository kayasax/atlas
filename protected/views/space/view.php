<?php
/* @var $this SpaceController */
/* @var $model Space */

$this->breadcrumbs=array(
	'Spaces'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Space', 'url'=>array('index')),
	array('label'=>'Create Space', 'url'=>array('create')),
	array('label'=>'Update Space', 'url'=>array('update', 'id'=>$model->idspace)),
	array('label'=>'Delete Space', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idspace),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Space', 'url'=>array('admin')),
);
?>

<h1>View Space #<?php echo $model->idspace; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idspace',
		'name',
		'parent',
		'description',
		'createdby',
		'creationdate',
		'lasttouched',
		'status',
	),
)); ?>
