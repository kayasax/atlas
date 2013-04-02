<?php
/* @var $this SpaceController */
/* @var $model Space */

$this->breadcrumbs=array(
	'Espaces'=>array('index'),
	'Création',
);


?>

<h3>Créer un espace</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model,'parents'=>$parents)); ?>