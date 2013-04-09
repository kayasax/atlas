<?php
$icons=array('space'=>'icon-folder-open','page'=>'icon-file-alt');


$this->pageTitle=Yii::app()->name . ' - Search results';
$this->breadcrumbs=array(
    'Résultats de la recherche',
);
?>
<h3 class='clean'>Résultats de la recherche pour : "<?php echo $term; ?>" (<?php echo count($results) ?> trouvés)</h3>
<div class='well '>
   

<?php if (!empty($results)): ?>
<?php foreach($results as $result): ?>
    <div class='box'>
        <p class='lead'>
            <?php echo CHtml::link('<i class="'.$icons[$result->type].'"></i>'.$query->highlightMatches($result->title),Yii::app()->createUrl("$result->type/view",array('id'=>$result->_id))); ?>
            <?php echo "(". round($result->score*100) ."%)"?>
        </p>
        <h5> <?php echo $query->highlightMatches($result->intro); ?></h5>
        <small><?php echo $query->highlightMatches($result->content); ?></small>                 
    </div>           
<?php endforeach; ?>
<?php else: ?>
    <p class="alert alert-error"><i class=' icon-exclamation-sign'></i> Aucune correspondance trouvée.</p>
<?php endif; ?>          

</div>