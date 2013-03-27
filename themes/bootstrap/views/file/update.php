<?php
/* @var $this FileController */
/* @var $model File */

$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->idfile=>array('view','id'=>$model->idfile),
	'Update',
);

$this->menu=array(
	array('label'=>'List File', 'url'=>array('index')),
	array('label'=>'Create File', 'url'=>array('create')),
	array('label'=>'View File', 'url'=>array('view', 'id'=>$model->idfile)),
	array('label'=>'Manage File', 'url'=>array('admin')),
);
?>

<h1>Update File <?php echo $model->idfile; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>