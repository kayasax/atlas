<?php
/**
* portlet appreciation des pages
*/

Yii::import('zii.widgets.CPortlet');
 
class Score extends CPortlet
{
     public $id;
        
    protected function renderContent()
    { 
        //echo ($this->id);
        $myscore=Empathy::model()->find('page=:page AND user=:user',array(':page'=>$this->id,':user'=>Yii::app()->user->id));
        
        $score=Empathy::model()->find('page=:page AND love="1"',array(':page'=>$this->id));       
        ( $myscore!== NULL && $myscore->love =='1')?$style='style="color:green"':$style='style="color:black"';
        ( $myscore!== NULL && $myscore->love =='1')?$href='href="#" title="Vous avez déjà voté pour cette page" ':$href='href="fdfd" title="dfsdf"';
        ($score===NULL)?$up=0:$up=$score->count();
        echo "<a $href> <i class='icon-thumbs-up' $style></i></a>$up";
        
        $score=Empathy::model()->find('page=:page AND love="-1"',array(':page'=>$this->id));
        ( $myscore!== NULL && $myscore->love =='-1')?$style='style="color:red"':$style='style="color:black"';
        ( $myscore!== NULL && $myscore->love =='-1')?$href='href="#" title="Vous avez déjà voté pour cette page" ':$href='href="fdfd" title="dfsdf"';
        ($score===NULL)?$down=0:$down=$score->count();
        echo "&nbsp;<a $href> <i class='icon-thumbs-down' $style></i></a>$down";       //echo "&nbsp;<i class='icon-thumbs-down'></i>".$score->count();
        
 
/*        foreach($tags as $tag=>$weight)
        {
            $link=CHtml::link(CHtml::encode($tag), array('page/index','tag'=>$tag));
            echo CHtml::tag('span', array(
                'class'=>'btn btn-mini',
                'style'=>"font-size:{$weight}pt ; margin:2px",
            ), $link)."\n";
        }*/
    }
}
?>