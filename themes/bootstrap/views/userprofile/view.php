<?php
/* @var $this UserprofileController */
/* @var $model Userprofile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->firstname." ".$model->lastname ,
);

?>

<h3 class="clean">Profil de <?php echo $model->firstname." ".$model->lastname; ?></h3>

<div class='well'>

<a href="<?php echo Yii::app()->createUrl('userprofile/update',array('id'=>$model->iduser));?>" class='btn btn-primary pull-right'>Modifier mon profil</a>
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
</div>