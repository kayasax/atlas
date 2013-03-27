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
        
            <?php $this->widget('userMenu'); ?>
            <?php $this->widget('TagCloud', array( 'maxTags'=>20,)); //Yii::app()->params['tagCloudCount'],  ?> 
    
        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>