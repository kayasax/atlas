<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
	array('label'=>'Update Page', 'url'=>array('update', 'id'=>$model->idpage)),
	array('label'=>'Delete Page', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idpage),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Page', 'url'=>array('admin')),
);
?>

<div class='well'>
<h2><?php echo $model->title; ?><small> - crée le  <?php echo $model->creationdate;?> par <?php echo $model->author;?></small></h2>
<h4><?php echo $model->intro; ?></h4>
</div>

<div class='well'>
<?php echo $model->content; ?>
</div>


<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idpage',
		'title',
		'intro',
		'content',
		'creator',
		'creation',
		'last_modification',
		'modified_by',
	),
)); */?>
