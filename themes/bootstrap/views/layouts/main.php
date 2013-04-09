<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="fr" />

 <!-- encore un patch pour IE8--> 
 <script type='javascript' src="<?php echo Yii::app()->baseUrl; ?>/js/css3-mediaqueries.js"></script>
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/main.css" />
	
</head>

<body style='background-image: url("<?php echo Yii::app()->baseUrl; ?>/images/carbon_fibre.png"); )' >

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Accueil', 'url'=>array('/site/index')),
                array('label'=>'Espaces','url'=>array('/space') ),
                array('label'=>'A propos', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Connexion', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>(Yii::app()->user->isGuest) ? '' : yii::app()->user->firstname
					,'url'=>'#'
					,'visible'=>!Yii::app()->user->isGuest
					,'items'=>array(
						array('label'=>'Mon profil', 'url'=>array('/userprofile/view/'.Yii::app()->user->id) ),
						array('label'=>'Déconnexion', 'url'=>array('/site/logout') ),
					
				)
				),
                
            ),
        ),
        '<form class="navbar-search pull-left" action="'.Yii::app()->createUrl('search/search').'">
            <input type="text" name="q" id="q" class="search-query span2" placeholder="Chercher"></form>',
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
	<hr>
	<div id="footer" class='footer'>
		<div class='row'>
			<div class='span6'><?php echo Yii::powered(); ?></div>
			<div class='span6 '><p class='text-right'>Copyright &copy; <?php echo date('Y'); ?> SMAC</p></div>
		</div>
		<br/>
		
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
