<?php
/* @var $this SpaceController */
/* @var $data Space */
?>


<div class="">
	<h4> <?php echo CHtml::link(CHtml::encode($data->name),array('view','id'=>$data->idspace)); ?> </h4>
</div>