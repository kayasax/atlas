<?php
/**
* portet Nuage de tags
*/

Yii::import('zii.widgets.CPortlet');
 
class TagCloud extends CPortlet
{
    public $maxTags=20;
   /* public $title='Tags';
    
    public $htmlOption=array('class'=>'widget');

    public $decorationCssClass='widget-header ';*/
    /**
     * @var string the CSS class for the portlet title tag. Defaults to 'portlet-title'.
     */
    //public $titleCssClass='h3 ';
    /**
     * @var string the CSS class for the content container tag. Defaults to 'portlet-content'.
     */
    //public $contentCssClass='widget-content well';
 
  /*  protected function renderDecoration()
    {
    	if($this->title!==null)
    	{
    		echo "<div class=\"{$this->decorationCssClass}\">\n";
    		echo " <h3><i class='icon-tags icon-2x'></i>&nbsp; {$this->title}</h3>\n";
    		echo "</div>\n";
    	}
    	}
    */	
    protected function renderContent()
    { 
        ?>
    <div class='widget'>
        <div class='widget-header'><h3><i class='icon-tags icon-2x'></i>&nbsp;Tags</h3></div>
        <div class='widget-content'>
        <?php
        $tags=Tag::model()->findTagWeights($this->maxTags);
 
        foreach($tags as $tag=>$weight)
        {
            $link=CHtml::link(CHtml::encode($tag), array('page/index','tag'=>$tag));
            echo CHtml::tag('span', array(
                'class'=>'btn btn-mini',
                'style'=>"font-size:{$weight}pt ; margin:2px",
            ), $link)."\n\t\t";
        }
        ?>
</div> <!-- /widget-content-->
    </div><!-- /widget-->
    <?php
    }
}
?>