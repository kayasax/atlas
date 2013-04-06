<?php
/**
* portet Nuage de tags
*/

Yii::import('zii.widgets.CPortlet');
 
class SearchBlock extends CPortlet
{
     public $title='Recherche';
 
    protected function renderContent()
    {
        $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'action'=>Yii::app()->createUrl("search/search"),
            'id'=>'searchForm',
            'type'=>'search',
        'enableAjaxValidation'=>false,
        'htmlOptions' => array(),));
        ?>    
        <input type="text" class="input-small" placeholder="Email" name="q" id="q">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Chercher')); 
         $this->endWidget();
 
        /*echo CHtml::beginForm(array('search/search'), 'get', array('style'=> 'inline')) .
        CHtml::textField('q', '', array('placeholder'=> 'chercher...','style'=>'width:140px;')) .
        CHtml::submitButton('Go!',array('style'=>'width:30px;')) .
        CHtml::endForm('');*/
    }
}
?>