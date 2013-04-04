<?php
/**
* portlet appreciation des pages : affichage de l'appreciation et liens ajax 
 * permettant de voter
*/

Yii::import('zii.widgets.CPortlet');
 
class Score extends CPortlet
{
     public $id;
        
    protected function renderContent()
    { 
        // on récupère les scores de la page actuelle
        $score=Empathy::model()->findAll('page=:page AND love="1"',array(':page'=>$this->id));     
        $up=count($score);
        $score2=Empathy::model()->findAll('page=:page AND love="-1"',array(':page'=>$this->id));     
        $down=count($score2);
        
        // l'utilisateur actuel a t'il déjà voté ?    	
        $myscore=Empathy::model()->find('page=:page AND user=:user',array(':page'=>$this->id,':user'=>Yii::app()->user->id));
        
        if(count($myscore) ==0){ // no vote
            $options=array(
                'data'=>array('id'=>$this->id,'update'=>0),
                'type'=>'post',
        	'success'=>'function($data){
        		/* incrementer le compteur*/
        		$("#scoreUp").html( parseInt($("#scoreUp").html()) +1) ;
        		/*désactiver le lien */
        		$("#voteUpLink")
                            .addClass("disabled")
                            .css("color","green")
                            .click(function(){return false;})
                            .attr("title","Vous avez déjà voté");
            }');
            $htmlOptions=array(
                'id'=>'voteUpLink',
                'title'=>'Cliquer ici si vous appréciez cette page',
                'class'=>'btn',
                'color'=>'black',
                );
        }
        elseif($myscore->love == "1"){ // vote UP
            $options=array(
                'data'=>array('id'=>$this->id,'update'=>'1'),
                'type'=>'post',
        	//'success'=>''
                );
            $htmlOptions=array(
                'id'=>'voteUpLink',
                'title'=>'Vous avez déjà apprécié cette page',
                'class'=>'btn disabled',
                'style'=>'color:green',
                );
            
        }
        else{ // vote down
            $options=array(
                'data'=>array('id'=>$this->id,'update'=>'1'),
                'type'=>'post',
        	'success'=>'function($data){
        		/* incrementer le compteur up decrementer cmpteur down*/
        		$("#scoreDown").html( parseInt($("#scoreDown").html()) -1) ;
                        $("#scoreUp").html( parseInt($("#scoreUp").html()) +1) ;
        		/*désactiver le lien */
        		$("#voteUpLink")
                            .addClass("disabled")
                            .css("color","green")
                            .click(function(){return false;})
                            .attr("title","Vous avez déjà voté");
                        $("#voteDownLink")
                            .removeClass("disabled")
                            .css("color","black")
                            .attr("title","Cliquer içi si vous n\'appéciez pas cette page");
            }'
                );
            $htmlOptions=array(
                'id'=>'voteUpLink',
                'title'=>'Cliquer ici si vous appréciez cette page',
                'class'=>'btn',
                'style'=>'color:black',
                'confirm'=>'Voulez-vous vraiment remplacer votre appréciation négative par une positive ?'
                );
        }
        
        // Afficher le bouton VopteUp
        echo CHtml::ajaxLink(
            '<i class="icon-thumbs-up"></i>&nbsp;<span id="scoreUp">'.$up.'</span>',          // the link body (it will NOT be HTML-encoded.)
            array('ajax/voteUp'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
            $options,
            $htmlOptions	        		
        );
        
        
        // Même chose pour voteDown
        if(count($myscore) ==0){ // no vote
            $options=array(
                'data'=>array('id'=>$this->id,'update'=>0),
                'type'=>'post',
        	'success'=>'function($data){
        		/* incrementer le compteur*/
        		$("#scoreDown").html( parseInt($("#scoreDown").html()) +1) ;
        		/*désactiver le lien */
        		$("#voteDownLink")
                            .addClass("disabled")
                            .css("color","red")
                            .click(function(){return false;})
                            .attr("title","Vous avez déjà voté");
            }');
            $htmlOptions=array(
                'id'=>'voteDownLink',
                'title'=>'Cliquer ici si vous n\'appréciez cette page',
                'class'=>'btn',
                'style'=>'color:black',
                );
        }
        elseif($myscore->love == "-1"){ // vote down
            $options=array(
                'data'=>array('id'=>$this->id,'update'=>'1'),
                'type'=>'post',
        	//'success'=>''
                );
            $htmlOptions=array(
                'id'=>'voteDownLink',
                'title'=>'Vous avez déjà laissé une appreciation négative',
                'class'=>'btn disabled',
                'style'=>'color:red',
                );
            
        }
        else{ // vote up
            $options=array(
                'data'=>array('id'=>$this->id,'update'=>'1'),
                'type'=>'post',
        	'success'=>'function($data){
        		/* incrementer le compteur down decrementer cmpteur up*/
        		$("#scoreDown").html( parseInt($("#scoreDown").html()) +1) ;
                        $("#scoreUp").html( parseInt($("#scoreUp").html()) -1) ;
        		/*désactiver le lien */
        		$("#voteDownLink")
                            .addClass("disabled")
                            .css("color","red")
                            .click(function(){return false;})
                            .attr("title","Vous avez déjà voté");
                        $("#voteUpLink")
                            .removeClass("disabled")
                            .css("color","black")
                            .attr("title","Cliquer içi si vous appéciez cette page");
            }'
                );
            $htmlOptions=array(
                'id'=>'voteDownLink',
                'title'=>'Cliquer ici si vous n\'appréciez pas cette page',
                'class'=>'btn',
                'style'=>'color:black',
                'confirm'=>'Voulez-vous vraiment remplacer votre appréciation positive par une négative ?'
                );
        }
        
        echo "&nbsp;";
        echo CHtml::ajaxLink(
            '<i class="icon-thumbs-down"></i>&nbsp;<span id="scoreDown">'.$down.'</span>',          // the link body (it will NOT be HTML-encoded.)
            array('ajax/voteDown'), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
            $options,
            $htmlOptions	        		
        );
    }
}

?>