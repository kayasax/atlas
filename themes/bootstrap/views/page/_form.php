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
<?php echo $form->labelEx($model,'content'); ?>
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
        'class' => 'tinymce',
    ),
    'settings' => array(
        'content_css' => Yii::app()->theme->baseUrl.'/css/bootstrap.css', //Yii::app()->theme->baseUrl."/css/styles.css",
        'theme_advanced_buttons1' =>
        'bold,italic,underline,strikethrough,|,cut,copy,paste,pastetext,pasteword,|,undo,redo,|,forecolor,backcolor,|,outdent,indent,blockquote,|,styleselect,formatselect,|,print,|,visualaid,code,fullscreen',//,fontselect,fontsizeselect
        'theme_advanced_buttons2' => 'justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,link,unlink,anchor,image,|,charmap,emotions,iespell,advhr,|,', //cleanup,help,
        'theme_advanced_buttons3' => 'tablecontrols,|,insertdate,inserttime,|,visualchars,nonbreaking,template',
        'theme_advanced_buttons4' => '',
        'theme_advanced_toolbar_location' => 'top',
        'theme_advanced_toolbar_align' => 'left',
        'theme_advanced_statusbar_location' => 'bottom',
        'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,15=15pt,16=16pt"
        ),
                                                                                                                        )
);

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
 

