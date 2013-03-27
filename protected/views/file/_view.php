<?php
/* @var $this FileController */
/* @var $data File */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idfile')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idfile), array('view', 'id'=>$data->idfile)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filename')); ?>:</b>
	<?php echo CHtml::encode($data->filename); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mime')); ?>:</b>
	<?php echo CHtml::encode($data->mime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filedescription')); ?>:</b>
	<?php echo CHtml::encode($data->filedescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('added_by')); ?>:</b>
	<?php echo CHtml::encode($data->added_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page')); ?>:</b>
	<?php echo CHtml::encode($data->page); ?>
	<br />


</div>