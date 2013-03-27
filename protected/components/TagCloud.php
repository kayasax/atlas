<?php
/**
* portet Nuage de tags
*/

Yii::import('zii.widgets.CPortlet');
 
class TagCloud extends CPortlet
{
    public $title='Tags';
    public $maxTags=20;
    public $htmlOption=array('class'=>'widget');

    public $decorationCssClass='widget-header ';
    /**
     * @var string the CSS class for the portlet title tag. Defaults to 'portlet-title'.
     */
    public $titleCssClass='h3 ';
    /**
     * @var string the CSS class for the content container tag. Defaults to 'portlet-content'.
     */
    public $contentCssClass='widget-content';
 
    protected function renderDecoration()
    {
    	if($this->title!==null)
    	{
    		echo "<div class=\"{$this->decorationCssClass}\">\n";
    		echo " <h3><i class='icon-tag'></i>&nbsp; {$this->title}</h3>\n";
    		echo "</div>\n";
    	}
    	}
    	
    protected function renderContent()
    { 
        $tags=Tag::model()->findTagWeights($this->maxTags);
 
        foreach($tags as $tag=>$weight)
        {
            $link=CHtml::link(CHtml::encode($tag), array('page/index','tag'=>$tag));
            echo CHtml::tag('span', array(
                'class'=>'btn',
                'style'=>"font-size:{$weight}pt",
            ), $link)."\n";
        }
    }
}
?>