<?php
/* @var $this SpaceController */
/* @var $data Space */
?>


<div class="view well">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('idespace')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idespace), array('view', 'id'=>$data->idespace)); ?>
	<br /> -->

	<!-- <?php echo CHtml::encode($data->getAttributeLabel('name')); ?> -->
	<h2> <?php echo CHtml::link(CHtml::encode($data->name),array('view','id'=>$data->idespace)); ?> </h2>

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?> : </b>
	<?php echo nl2br(CHtml::encode($data->description)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation')); ?> : </b>
	<?php echo CHtml::encode($data->creation); ?>
	<br />

	<b>Créé par : </b>
	<?php echo CHtml::encode($data->creator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startpage')); ?> : </b>
	<?php echo CHtml::encode($data->startpage); ?>
	<br />


</div>