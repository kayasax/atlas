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

	<p class="note"><span class="required">*</span> = champs obligatoire.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->fileFieldRow($model, 'file');?>		
	<?php echo $form->textAreaRow($model,'filedescription',array('rows'=>6, 'class'=>'span4','hint'=>' Merci de mettre une description parlante afin de faciliter la recherche' )); ?>
		
		<br/>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>$model->isNewRecord ? 'Ajouter' : 'Enregistrer')); ?>
<?php $this->endWidget(); ?>

