<?php
/* @var $this SpaceController */
/* @var $model Space */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'space-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'idespace'); ?>
		<?php echo $form->textField($model,'idespace'); ?>
		<?php echo $form->error($model,'idespace'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'creation',array('value'=>'now()' )); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creator'); ?>
		<?php echo $form->textField($model,'creator',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'creator'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'startpage'); ?>
		<?php echo $form->textField($model,'startpage',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'startpage'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->