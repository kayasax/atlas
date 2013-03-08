<?php
/* @var $this UserprofileController */
/* @var $model Userprofile */

$this->breadcrumbs=array(
	'Userprofiles'=>array('index'),
	$model->iduser,
);

$this->menu=array(
	array('label'=>'List Userprofile', 'url'=>array('index')),
	array('label'=>'Create Userprofile', 'url'=>array('create')),
	array('label'=>'Update Userprofile', 'url'=>array('update', 'id'=>$model->iduser)),
	array('label'=>'Delete Userprofile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->iduser),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Userprofile', 'url'=>array('admin')),
);
?>

<h1>View Userprofile #<?php echo $model->iduser; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'iduser',
		'lastname',
		'firstname',
		'email',
	),
)); ?>
