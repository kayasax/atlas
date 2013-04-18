<?php
/**
* portet sujets mieux notés
*/

Yii::import('zii.widgets.CPortlet');
 
class Leaderboard extends CPortlet
{
    /*public $title='Les mieux notés';
    public $maxTags=20;
    public $htmlOption=array('class'=>'widget');*/

    //public $decorationCssClass='widget-header ';
    /**
     * @var string the CSS class for the portlet title tag. Defaults to 'portlet-title'.
     */
    public $titleCssClass='h3 ';
    /**
     * @var string the CSS class for the content container tag. Defaults to 'portlet-content'.
     */
    //public $contentCssClass='widget-content well';
 
    protected function renderDecoration()
    {
    
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
?>
        <div class="widget">
            <div class='widget-header'><h3><i class='icon-star'></i>&nbsp;Les mieux notés</h3></div>
            <div class='widget-content'>
       
        <table class='table table-condensed table-bordered table-striped'>
            
            <thead>
            <tr>
                <th>Page</th>
                <th>Vote</th>
            </tr>
            </thead>
            <tbody>
        <?php
        foreach ($pages as $page) {
            echo "<tr>
            <td>".CHtml::link($page['title']." {".$page['name']."}",Yii::app()->createUrl('page/view', array('id'=>$page['page'])))."</td>
            <td>$page[total]</td>
            </tr>";
        }?>
            </tbody>
        </table>
            </div> <!-- /widget-content-->
        </div> <!-- /widget-->    
    <?php
    }
}
?>