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

<h3 class='clean'>Liste des espaces</h3>




<?php  $this->renderPartial('_inlineSearch',array(
    'model'=>$model,
)); ?>



<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model->search(),
    'itemView'=>'_view',
    'id'=>'spaceview',       // must have id corresponding to js above
    'sortableAttributes'=>array(
        'name',
        'description',
        'createdby',
        'creationdate',
    ),
)); 
?>

<?php

/** ok avec grid view
$this->widget('zii.widgets.Grid.CGridView', array(
	'dataProvider'=>$model->with('creator')->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'type'=>'raw',
			'header'=>'Nom',
			'name'=>'name',
			'value'=>'CHtml::Link( $data->name,array("/".Yii::app()->controller->id."/view", "id"=>$data->idspace))',//,$this->createUrl("/space/")',//.$data->idspace)',
		),	
		'description',
		array('name'=>'createdby','value'=>'$data->creator->username'),
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
//)); ?>

