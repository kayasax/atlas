<?php
/* @var $this SpaceController */
/* @var $model Space */

$this->breadcrumbs=array(
	'Spaces'=>array('index'),
	$model->name=>array('view','id'=>$model->idespace),
	'Update',
);

$this->menu=array(
	array('label'=>'List Space', 'url'=>array('index')),
	array('label'=>'Create Space', 'url'=>array('create')),
	array('label'=>'View Space', 'url'=>array('view', 'id'=>$model->idespace)),
	array('label'=>'Manage Space', 'url'=>array('admin')),
);
?>

<h1>Update Space <?php echo $model->idespace; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>