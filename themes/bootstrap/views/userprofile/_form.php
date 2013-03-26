<?php
/* @var $this UserprofileController */
/* @var $model Userprofile */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'userprofile-form',
	'enableAjaxValidation'=>false,
		'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Les champs avec <span class="required">*</span> sont requis.</p>

	<?php echo $form->errorSummary($model); ?>

	
	
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'firstname'); ?>

		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>

		<?php echo $form->labelEx($model,'lastseen'); ?>
		<?php echo $form->textField($model,'lastseen'); ?>
		<?php echo $form->error($model,'lastseen'); ?>
	<br/>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary', 'label'=> $model->isNewRecord ? 'Créer' : 'Enregistrer')); ?>
		
	

<?php $this->endWidget(); ?>
