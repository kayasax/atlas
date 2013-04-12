<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'test',
);
?>

<?php 
$img=new SimpleImage();
$img->load(Yii::app()->basePath."/../images/avatars/anonymous.png");
$img->resizeToWidth(40);
$img->save("images/avatars/mini/anonymous.png");
?>