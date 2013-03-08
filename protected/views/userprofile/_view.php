<?php
/* @var $this UserprofileController */
/* @var $data Userprofile */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->iduser), array('view', 'id'=>$data->iduser)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />


</div>