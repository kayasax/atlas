<?php
/* @var $this SpaceController */
/* @var $data Space */
?>


<h4> <?php echo CHtml::link(CHtml::encode($data->title),array('/page/view','id'=>$data->idpage)); ?> <small><?php echo nl2br(CHtml::encode($data->intro)); ?></small></h4>

<i class='icon-time' title='créé le'></i><?php echo CHtml::encode($data->creationdate); ?>
<i class='icon-user' title='auteur'></i><?php echo CHtml::encode($data->author0->username); ?>
	<br />


