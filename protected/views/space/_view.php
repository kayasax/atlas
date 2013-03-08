<?php
/* @var $this SpaceController */
/* @var $data Space */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idespace')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idespace), array('view', 'id'=>$data->idespace)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation')); ?>:</b>
	<?php echo CHtml::encode($data->creation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creator')); ?>:</b>
	<?php echo CHtml::encode($data->creator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startpage')); ?>:</b>
	<?php echo CHtml::encode($data->startpage); ?>
	<br />


</div>