<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title=>array('view','id'=>$model->idpage),
	'Update',
);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
	array('label'=>'View Page', 'url'=>array('view', 'id'=>$model->idpage)),
	array('label'=>'Manage Page', 'url'=>array('admin')),
);
?>

<h1>Update Page <?php echo $model->idpage; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>