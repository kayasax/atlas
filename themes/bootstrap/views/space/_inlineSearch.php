<?php
/* @var $this SpaceController */
/* @var $model Space */
/* @var $form CActiveForm */
?>


<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiListView.update('spaceview', { 
        //this entire js section is taken from admin.php. w/only this line diff
        data: $(this).serialize()
    });
    return false;
});
");?>


<div class='box'>
<?php echo CHtml::link('<i class=icon-search></i> Rechercher','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
    'htmlOptions'=>array(),
)); ?>
 
<?php echo $form->textFieldRow($model, 'name', array('class'=>'input-small')); ?> 
<?php echo $form->textFieldRow($model, 'description', array('class'=>'input-small')); ?> 
<?php echo $form->textFieldRow($model, 'creationdate', array('class'=>'input-small')); ?>

<?php //echo $form->passwordFieldRow($model, 'password', array('class'=>'input-small')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Chercher')); ?>

<?php $this->endWidget(); ?>
</div><!-- search-form -->

</div>