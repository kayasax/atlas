<?php
/* @var $this SpaceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Espaces',
);

$this->menu=array(
	array('label'=>'Create Space', 'url'=>array('create')),
	array('label'=>'Manage Space', 'url'=>array('admin')),
);
?>

<h1>Liste des espaces</h1>


<?php
$this->widget('zii.widgets.Grid.CGridView', array(
	'dataProvider'=>$model->with('creator')->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'type'=>'raw',
			'header'=>'Nom',
			'name'=>'name',
			'value'=>'CHtml::Link( $data->name,"space/".$data->idspace)',
		),
		
		//'parent',
		'description',
		//'createdby',
		'creationdate',
),
		/*
		 'lasttouched',
'status',
	/*'itemView'=>'_view',
	'sortableAttributes'=>array(
		'name',
		'creationdate'
	),*/
	
)); ?>
