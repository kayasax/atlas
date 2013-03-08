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
	array('label'=>'Update Space', 'url'=>array('update', 'id'=>$model->idespace)),
	array('label'=>'Delete Space', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idespace),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Space', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->name; ?></h1>
<h2><?php echo $model->description;?></h2>


<?php echo $model->creator0->lastname?>
<?php //CVarDumper::dump($model,20,true);?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idespace',
		'name',
		'description',
		'creation',
		'creator',
		'startpage',
	),
)); ?>
