<?php
/* @var $this PageController */
/* @var $model Page */
$path=Space::getPath($model->space0->idspace,true);
$path[]="$model->title";
   
$this->breadcrumbs=$path;

/*$this->breadcrumbs=array(
	$model->space0->name=>array('space/view/','id'=>$model->space0->idspace),
	'Pages'=>array('index'),
	$model->title,
);*/

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/toc.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/page.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile("https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js");


?>

<div class='well'>
    <div class='row'>
		<div class='span6'><h3><?php echo $model->title; ?></h3><h5><?php echo $model->intro; ?></h5></div>
		<div class='span2'> 
                    <?php 
                    if(!yii::app()->user->isGuest){
                        $favs=explode(',',User::model()->with('userprofile')->findByPk(Yii::app()->user->id)->userprofile->favorites);
                        if(in_array($model->idpage, $favs)){
                            $icon='icon-heart';
                            $title='Cliquer pour supprimer cette page de vos favoris';
                        }
                        else{
                            $icon='icon-heart-empty';
                            $title='Cliquer pour ajouter cette page à vos favoris';
                        }
                    
                    
                    ?>
                    
                    <p class='pull-right'><?php echo CHtml::ajaxLink("<i class='".$icon."' id='favIcon'></i>", Yii::app()->createUrl("ajax/addToFav"), 
                        array(
                        'update'=>'#favMessage',
                        'data'=>array('id'=>$model->idpage),
                        'type'=>'post',
                        'success'=>'function($data){
                            $("#favMessage").html($data);
                            if($("#favIcon").hasClass("icon-heart-empty")){
                                $("#favIcon").removeClass("icon-heart-empty").addClass("icon-heart");
                                $("#favLink").attr("title","Cliquer pour supprimer cette page de vos favoris");
                            } 
                            else{
                               $("#favIcon").removeClass("icon-heart").addClass("icon-heart-empty")
                               $("#favLink").attr("title","Cliquer pour ajouter cette page à vos favoris");
                            }
                         }
                         '
                         ),
                         
                        array(
                        'id'=>'favLink',
                        'title'=>$title,
                        'class'=>'',
                        'style'=>'color:red',
                ));
                    }?></p>
                    <div id='favMessage'></div>
                    <p class='clearfix'>
			<ul class='unstyled '>
				<li><small> <i class='icon-user' title='auteur'></i> <?php echo $model->author0->userprofile->firstname;?></small></li>
				<li><small> <i class='icon-time' title='Créé le'></i>  <?php echo $model->creationdate;?> </small></li>
				<li><small> <i class='icon-pencil' title='Dernière modification'></i>  <?php echo $model->lasttouched;?> </small></li>
					<li><small> <?php $this->widget('score',array('id'=>$model->idpage))?> </small></li>
			</ul>
                </p>
		</div>
	</div> <!-- / row -->
	

	<div class='row'>
		<div class='span8'>
			<a href='#' id='showFile' class='btn btn-primary <?php if( $model->nbFiles==0){echo "disabled";} ?>'><i class='icon-paper-clip icon-2x'></i> Voir les fichiers attachés (<?php echo $model->nbFiles;?>)</a>
			<div id='files' style='display:none'>
			<?php $this->widget('ext.elFinder.ElFinderWidget', array(
		        'connectorRoute' => 'Elfinder/pageConnector/',
		        ));?>
			</div>
		</div>
	</div>
</div>

<div class='widget '>
	<div class='widget-content' >
            <div id='toc' class='pull-right'></div>
            <div id='pageContent'>
                <?php echo $model->content; ?>
            </div>
	</div>
</div>


<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idpage',
		'title',
		'intro',
		'content',
		'creator',
		'creation',
		'last_modification',
		'modified_by',
	),
)); */?>
