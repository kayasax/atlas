<?php
/* @var $this UserprofileController */
/* @var $model Userprofile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->firstname." ".$model->lastname=>array('view','id'=>$model->iduser),
	'Mise à jour',
);

$this->menu=array(
	array('label'=>'List Userprofile', 'url'=>array('index')),
	array('label'=>'Create Userprofile', 'url'=>array('create')),
	array('label'=>'View Userprofile', 'url'=>array('view', 'id'=>$model->iduser)),
	array('label'=>'Manage Userprofile', 'url'=>array('admin')),
);
?>

<div class='widget'>
	<div class='widget-header'><i class='icon-user'></i><h3>Mise à jour du profil <?php echo $model->iduser; ?></h3></div>
	<div class='widget-content'>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>