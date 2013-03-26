<?php
/* @var $this UserprofileController */
/* @var $model Userprofile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->iduser=>array('view','id'=>$model->iduser),
	'Update',
);

$this->menu=array(
	array('label'=>'List Userprofile', 'url'=>array('index')),
	array('label'=>'Create Userprofile', 'url'=>array('create')),
	array('label'=>'View Userprofile', 'url'=>array('view', 'id'=>$model->iduser)),
	array('label'=>'Manage Userprofile', 'url'=>array('admin')),
);
?>

<h1>Mise à jour du profil </h1> 

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>