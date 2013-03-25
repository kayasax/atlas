<?php
/* @var $this SpaceController */
/* @var $data Space */
?>


<div class="view well">

	
	<!-- <?php echo CHtml::encode($data->getAttributeLabel('name')); ?> -->
	<h2> <?php echo CHtml::link(CHtml::encode($data->name),array('view','id'=>$data->idspace,'nom'=>$data->name)); ?> </h2>

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?> : </b>
	<?php echo nl2br(CHtml::encode($data->description)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creationdate')); ?> : </b>
	<?php echo CHtml::encode($data->creationdate); ?>
	<br />

	<b>Créé par : </b>
	<?php echo CHtml::encode($data->creator->username); ?>
	<br />

	


</div>