<?php
/* @var $this SpaceController */
/* @var $data Space */
?>


<h4> <?php echo CHtml::link(CHtml::encode($data->title),array('/page/view','id'=>$data->idpage)); ?> <small><?php echo nl2br(CHtml::encode($data->intro)); ?></small></h4>
<div class='small'>
<i class='icon-user' title='auteur'></i>&nbsp;<?php echo CHtml::encode($data->author0->userprofile->firstname); ?>
<i class='icon-time' title='créé le'></i>&nbsp;<?php echo CHtml::encode($data->creationdate); ?>

</div>


