<?php
/* @var $this FileController */
/* @var $model File */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'file-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->fileFieldRow($model, 'file');?>
				
	<?php echo $form->textAreaRow($model,'filedescription',array('rows'=>6, 'cols'=>50)); ?>
	<?php echo $form->error($model,'filedescription'); ?>
	
	<?php echo $form->textFieldRow($model,'page',array('value'=>$_GET['pageid'])); ?>
	<?php echo $form->error($model,'page'); ?>
	

	
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>$model->isNewRecord ? 'Ajouter' : 'Enregistrer')); ?>
<?php $this->endWidget(); ?>

