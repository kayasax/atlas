<?php
//echo yii::app()->request->getParam('id');
// necho $test;
?>

<div class='widget'>
    <div class='widget-header'><h3><i class='icon-tasks'></i>&nbsp; Actions</h3></div>
    <div class='widget-content'>
    	 <?php $this->widget('bootstrap.widgets.TbMenu', array(
    		'type'=>'list',
    		'items'=>$items,
    		)); ?>
    </div>
</div>

