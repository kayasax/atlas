<?php
/**
* portlet recent activity
*/

Yii::import('zii.widgets.CPortlet');
 
class RecentActivity extends CPortlet
{
    //public $title='';
    /*public $maxTags=20;
    public $htmlOption=array('class'=>'widget');*/
 
    protected function renderContent()
    { 
        $count=Yii::app()->db->createCommand('SELECT COUNT(*) FROM activity s1 where date=(
            select max(s2.date) from activity s2 where s1.type=s2.type and s1.operator=s2.operator and s1.operation=s2.operation and s1.url=s2.url)
            order by date desc')->queryScalar();

        $sql="SELECT 
            s1.type , s1.operator, s1.operation,s1.url,s1.date,s1.id
            FROM activity s1
            where date=(
                   select max(s2.date) from activity s2 where s1.type=s2.type and s1.operator=s2.operator and s1.operation=s2.operation and s1.url=s2.url)
            order by date DESC";
        
        $dataProvider=new CSqlDataProvider($sql, array(
            'totalItemCount'=>$count,
            'pagination'=>array(
                'pageSize'=>10
            )
        ));

        ?>
    <div class='widget '>
        <div class='widget-header'> <h3> <i class='icon-calendar'></i>&nbsp; Activité récente</h3></div>
        <div class='widget-content'>
            <ul class='unstyled'>
                <?php
                $this->widget('zii.widgets.CListView', array(
                                    'dataProvider'=>$dataProvider,
                                    'itemView'=>'_activity',
                    ));
                ?>
            </ul>
        </div> <!-- /widget-content-->
    </div><!-- /widget-->
    <?php
    }
}
?>