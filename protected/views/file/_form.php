<?php
/* @var $this FileController */
/* @var $model File */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'filename'); ?>
	</div>

	<?php echo $form->fileField($model, 'file');
	echo $form->error($model, 'file');?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'mime'); ?>
		<?php echo $form->textField($model,'mime',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'filedescription'); ?>
		<?php echo $form->textArea($model,'filedescription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'filedescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'added_by'); ?>
		<?php echo $form->textField($model,'added_by'); ?>
		<?php echo $form->error($model,'added_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page'); ?>
		<?php echo $form->textField($model,'page'); ?>
		<?php echo $form->error($model,'page'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->