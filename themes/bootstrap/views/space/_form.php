<?php
/* @var $this SpaceController */
/* @var $model Space */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'space-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->labelEx($model,'name'); ?>
	<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	<?php echo $form->error($model,'name'); ?>


	<?php echo $form->labelEx($model,'description'); ?> 
	<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	<?php echo $form->error($model,'description'); ?>


	<?php echo $form->labelEx($model,'parent'); ?> 
	<?php echo $form->dropDownList($model,'parent',Space::getParents(),array('options' => array(Yii::app()->request->getParam('space')=>array('selected'=>true)))); ?>
	<?php echo $form->error($model,'description'); ?>

	<?php echo $form->labelEx($model,'status'); ?>
	<?php echo $form->textField($model,'status',array('size'=>45,'maxlength'=>45)); ?>
	<?php echo $form->error($model,'status'); ?>


	<br/><?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$model->isNewRecord ? 'Créer' : 'Enregistrer',  'icon'=>'ok')); ?>

<?php $this->endWidget(); ?>

