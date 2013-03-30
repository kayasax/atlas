<?php
/* @var $this SpaceController */
/* @var $model Space */
//var_dump(array_reverse($path));
$this->breadcrumbs=$path;//$model->name,


$this->menu=array(
	array('label'=>'List Space', 'url'=>array('index')),
	array('label'=>'Create Space', 'url'=>array('create')),
	array('label'=>'Update Space', 'url'=>array('update', 'id'=>$model->idspace)),
	array('label'=>'Delete Space', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idspace),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Space', 'url'=>array('admin')),
);
?>

<?php //CVarDumper::dump(Yii::app()->user->email,20);?>


<div class="widget-header"><h3><?php echo $model->name; ?> - <small><?php echo $model->description;?></small></h3></div>

<?php if( isset($index->content) ):?> 
<div class='widget widget-content'>
	<p class='lead'> <?php echo $index->content; ?></p>
</div>
<?php endif;?>
<div class="row">
    <div class="span4">
        <div class="widget-header"><h3><i class="icon-book"></i> &nbsp;Espaces enfants</h3></div>
        <div class="widget-content">
        <?php //echo CVarDumper::dump($childs->getData());?>	

        <?php
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$childs,
				'itemView'=>'_child',
				
		));
		?>
 		</div>
	</div>

    <div class="span5">
        <div class="widget-header"><h3><i class="icon-file"></i>&nbsp; Pages récentes</h3></div>
        <div class="widget-content">
	   	<?php
			$this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$pages,
				'itemView'=>'_page',
				'sortableAttributes'=>array(
				'name',
				'author',
				'creationdate',
			),
		));
 		?>
 		</div>
	</div>
</div>

