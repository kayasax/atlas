<?php
/* @var $this SpaceController */
/* @var $model Space */

$this->breadcrumbs=array(
	'Spaces'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Space', 'url'=>array('index')),
	array('label'=>'Manage Space', 'url'=>array('admin')),
);
?>

<h1>Create Space</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'parents'=>$parents)); ?>