<?php
/* @var $this SpaceController */
/* @var $model Space */

$this->breadcrumbs=array(
	'Espaces'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Space', 'url'=>array('index')),
	array('label'=>'Create Space', 'url'=>array('create')),
	array('label'=>'Update Space', 'url'=>array('update', 'id'=>$model->idspace)),
	array('label'=>'Delete Space', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idspace),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Space', 'url'=>array('admin')),
);
?>


<?php echo CVarDumper::dump($pages,20);?>

<div class='well'>
<h1><?php echo $model->name; ?> <small><?php echo $model->description;?></small></h1>
</div>

<?php echo Yii::app()->user->name; //echo $model->creator->lastname; ?>
<?php //CVarDumper::dump($model,20,true);?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$pages,
	'attributes'=>array(
		'title',             // title attribute (in plain text)
		//'content:html',  // description attribute in HTML
	/*			array(               // related city displayed as a link
						'label'=>'City',
						'type'=>'raw',
						'value'=>CHtml::link(CHtml::encode($model->city->name),
								array('city/view','id'=>$model->city->id)),*/
				),
)); ?>
