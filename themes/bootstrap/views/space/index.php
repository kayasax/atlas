<?php
/* @var $this SpaceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spaces',
);

$this->menu=array(
	array('label'=>'Create Space', 'url'=>array('create')),
	array('label'=>'Manage Space', 'url'=>array('admin')),
);
?>

<h1>Liste des espaces</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
		'name',
		'creation'
	),
	
)); ?>
