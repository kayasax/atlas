<?php
/**
* portet sujets mieux notés
*/

Yii::import('zii.widgets.CPortlet');
 
class Leaderboard extends CPortlet
{
    public $title='Les mieux notés';
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
    public $contentCssClass='widget-content well';
 
    protected function renderDecoration()
    {
    	if($this->title!==null)
    	{
    		echo "<div class=\"{$this->decorationCssClass}\">\n";
    		echo " <h3><i class='icon-tags icon-2x'></i>&nbsp; {$this->title}</h3>\n";
    		echo "</div>\n";
    	}
    	}
    	
    protected function renderContent()
    { 
       $pages = Yii::app()->db->createCommand()
        ->select('page,count(love) as total, title, idspace, name ')
        ->from('empathy, page AS p, space AS s')
        ->where(' love="1" AND page=p.idpage AND p.space=s.idspace')
        ->group('page')
        ->order('total desc')
        ->limit(10)
               
        ->queryAll();

        echo"<table class='table table-condensed table-bordered table-striped'>
            
            <thead>
            <tr>
                <th>Page</th>
                <th>Vote</th>
            </tr>
            </thead>
            <tbody>";
        foreach ($pages as $page) {
            echo "<tr>
            <td>".CHtml::link($page['title']." {".$page['name']."}",Yii::app()->createUrl('page/view', array('id'=>$page['page'])))."</td>
            <td>$page[total]</td>
            </tr>";
        }
  echo"</tbody>
</table>";
    }
}
?>