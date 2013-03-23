<?php
/* @var $this SpaceController */
/* @var $data Space */
?>






	<h2> <?php echo CHtml::link(CHtml::encode($data->title),array('/page/view','id'=>$data->idpage)); ?> </h2>

	<b><?php echo CHtml::encode($data->getAttributeLabel('intro')); ?> : </b>
	<?php echo nl2br(CHtml::encode($data->intro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creationdate')); ?> : </b>
	<?php echo CHtml::encode($data->creationdate); ?>
	<br />

	<b>Créé par : </b>
	<?php echo CHtml::encode($data->author); ?>
	<br />


