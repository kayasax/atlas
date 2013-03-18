<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

  

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'formPageCreate',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

<?php
		$this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        /*'alerts'=>array( // configurations per alert type
            'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),*/
		)
); ?>    


<?php echo $form->errorSummary($model); ?>

<?php echo $form->labelEx($model,'space'); ?>
<?php echo $form->dropDownList($model, 'space',Space::getParents(), array('options' => array(Yii::app()->request->getParam('idspace')=>array('selected'=>true) ))); ?>

<?php echo $form->textFieldRow($model, 'title', array('class'=>'span8','maxlength'=>100)); ?>
 
<?php echo $form->labelEx($model,'intro'); ?>
<?php echo $form->textArea($model, 'intro', array('rows'=>3,'class'=>'span8')); ?>
 

<div class="tinymce">
<?php echo $form->labelEx($model,'content'); ?><br />
<?php

$this->widget('ext.tinymce.TinyMce', array(
    'model' => $model,
    'attribute' => 'content',
    // Optional config
    'compressorRoute' => 'tinyMce/compressor',
    //'spellcheckerUrl' => array('tinyMce/spellchecker'),
    // or use yandex spell: http://api.yandex.ru/speller/doc/dg/tasks/how-to-spellcheck-tinymce.xml
    //'spellcheckerUrl' => 'http://speller.yandex.net/services/tinyspell',
    'fileManager' => array(
        'class' => 'ext.elFinder.TinyMceElFinder',
        'connectorRoute'=>'elfinder/connector',
    ),
    'htmlOptions' => array(
        'rows' => 6,
        'cols' => 60,
    ),
));

/* $this->widget('application.extensions.tinymce.TinyMce',
    array(
        'model'=>$model,
        'attribute'=>'content',
        'editorTemplate'=>'full',
        'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'),
));*/ ?>
<?php echo $form->error($model,'content'); ?>
</div>


 <div class='span8 text-right'>
 	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>$model->isNewRecord ? 'Créer' : 'Enregistrer', 'type'=>'primary', 'icon'=>'ok')); ?>
 </div>
 <br/><br/>
 <?php $this->endWidget();?> <!-- end Form -->
 

