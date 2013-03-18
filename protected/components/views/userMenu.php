<?php
//echo yii::app()->request->getParam('id');
?>
<ul>
<li><?php echo CHtml::link('Créer une page',array('page/create','idspace'=>yii::app()->request->getParam('id') )); ?></li>
    <li><?php echo CHtml::link('Manage Posts',array('post/admin')); ?></li>
    
    <li><?php echo CHtml::link('Logout',array('site/logout')); ?></li>
</ul>