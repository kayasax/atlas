<?php
/* @var $this UserprofileController */
/* @var $model Userprofile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->iduser,
);

?>

<h3>Profil de #<?php echo $model->iduser; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'iduser',
		'lastname',
		'firstname',
		'email',
		'status',
		'lastseen',
	),
)); ?>
