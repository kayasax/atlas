<?php
/* @var $this UserprofileController */
/* @var $model Userprofile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->firstname." ".$model->lastname ,
);

?>

<h3 class="clean">Profil de <?php echo $model->firstname." ".$model->lastname; ?></h3>

<div class='well'>
   
    <span >
            <img src="<?php echo Yii::app()->baseUrl.'/images/avatars/'.$model->avatar ?>"/>
    </span>
    <span class="pull-right ">
         
        
        <dl class="dl-horizontal">
            <dt>Nom</dt><dd><?php echo $model->lastname?></dd>
            <dt>Prénom</dt><dd><?php echo $model->firstname?></dd>
            <dt>Dernière visite </dt><dd><?php echo $model->lastseen?></dd>
        </dl>

    </span>
<p class='clearfix'><a href="<?php echo Yii::app()->createUrl('userprofile/update',array('id'=>$model->iduser));?>" class='btn btn-primary pull-right'>Modifier mon profil</a></p>
   
</div>