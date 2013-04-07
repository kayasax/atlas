<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'test',
);
?>

<?php 
$this->widget('TreeView');
?>