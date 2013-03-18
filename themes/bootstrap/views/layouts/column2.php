<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
    <div class="span9">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span3">
        <div id="sidebar">
        
                
        <?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array(
        array('label'=>'Actions','icon'=>'tasks'),
        array('label'=>'Créer un espace', 'icon'=>'book', 'url'=>$this->createUrl('space/create',array('space'=>Yii::app()->request->getParam('id')))),
        
        /*array('label'=>'ANOTHER LIST HEADER'),
        array('label'=>'Profile', 'icon'=>'user', 'url'=>'#'),
        array('label'=>'Settings', 'icon'=>'cog', 'url'=>'#'),
        array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),*/
    ),
)); ?>
    
    <?php 
	if($this->id == 'space' && Yii::app()->request->getParam('id')!='' ){
		$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'list',
		'items'=>array(
			array('label'=>'Modifier cet espace','icon'=>'pencil','url'=>$this->createUrl('space/update',array('id'=>Yii::app()->request->getParam('id')))),
)));}

	$this->widget('bootstrap.widgets.TbMenu', array(
		'type'=>'list',
		'items'=>array(
			array('label'=>'Créer une page', 'icon'=>'file','url'=>$this->createUrl('page/create',array('idspace'=>Yii::app()->request->getParam('id')))),
)));

	if($this->id == 'page' && Yii::app()->request->getParam('id')!='' ){
	$this->widget('bootstrap.widgets.TbMenu', array(
			'type'=>'list',
			'items'=>array(
					array('label'=>'Editer cette page','icon'=>'edit','url'=>$this->createUrl('page/update',array('id'=>Yii::app()->request->getParam('id')))),
			)));}

    ?>
    
            
        <?php /*
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Operations',
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();*/
        ?>
        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>