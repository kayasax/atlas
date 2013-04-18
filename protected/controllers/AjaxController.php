<?php

class AjaxController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','AjaxFillTree'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'voteUp', 'voteDown','addToFav'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionvoteUp() {
        $page = $_POST['id'];
        if ($_POST['update'] == 0) {
            $emp = new Empathy();
            $emp->page = $page;
            $emp->user = Yii::app()->user->id;
            $emp->love = '1';
            $emp->save();
        } else {
            $emp = Empathy::model()->find('user=:user AND page=:page',array(':user'=>Yii::app()->user->id,':page'=>$page));
            echo $emp->love;
            $emp->love = '1';
            $emp->save();
        }
        
        Yii::app()->end();
    }

    public function actionvoteDown() {
        $page = $_POST['id'];
        if ($_POST['update'] == 0) {
            $emp = new Empathy();
            $emp->page = $page;
            $emp->user = Yii::app()->user->id;
            $emp->love = '-1';
            $emp->save();
        } else {
            $emp = Empathy::model()->find('user=:user AND page=:page',array(':user'=>Yii::app()->user->id,':page'=>$page));
            echo $emp->love;
            $emp->love = '-1';
            $emp->save();
        }
        Yii::app()->end();
    }

    public function actionaddToFav(){
              
        $profile=Userprofile::model()->findByPk(Yii::app()->user->id );
        
        if(isset($_POST['type']) && $_POST['type']=='space'){
            $f= array_filter(explode(',', $profile->spacefavs));
            if(in_array($_POST['id'], $f)){
                $f = array_diff($f, array($_POST['id']));
                $favorites = (implode(',', $f));
                $profile->spacefavs = $favorites;
                $profile->save();
                echo'<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="icon-ok"></i>&nbsp;Supprimée des favoris.
            </div>';
            }
        else{
           $profile->spacefavs.=",".$_POST['id'];
           $profile->save();
           echo'<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="icon-ok"></i>&nbsp;Ajoutée aux favoris.
            </div>';
        }
        Yii::app()->end();
        }
        
        
        $f= array_filter(explode(',', $profile->favorites));
        if(in_array($_POST['id'], $f)){
            $f=  array_diff($f, array($_POST['id']));
            $favorites=(implode(',', $f));
            $profile->favorites=$favorites;
            $profile->save();
            echo'<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="icon-ok"></i>&nbsp;Supprimée des favoris.
            </div>';
            
        }
        else{
           $profile->favorites.=",".$_POST['id'];
           $profile->save();
           echo'<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="icon-ok"></i>&nbsp;Ajoutée aux favoris.
            </div>';
        }
               
        
        Yii::app()->end();
    }
    
     public function actionAjaxFillTree()
    {
        // accept only AJAX request (comment this when debugging)
        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }
        // parse the user input
        $parentId = "1";
        if (isset($_GET['root']) && $_GET['root'] !== 'source') {
            $parentId = (int) $_GET['root'];
        }
        // read the data (this could be in a model)
        $children = Yii::app()->db->createCommand(
            "SELECT m1.idspace as id, m1.name AS text, m2.idspace IS NOT NULL AS hasChildren "
            . "FROM space AS m1 LEFT JOIN space AS m2 ON m1.idspace=m2.parent "
            . "WHERE m1.parent <=> $parentId "
            . "GROUP BY m1.idspace ORDER BY m1.name ASC"
        )->queryAll();
        
        //var_dump($children);
        
         $data=$return=array();
         foreach ($children as $child){
            $data['id']=$child['id'];
            $data['text']=$child['text'];
            $data['hasChildren']=$child['hasChildren'];
            //$data['text']="<a href='".Yii::app()->createUrl('space/view',array('id'=>$child['id']))." class='treenode'>$child[text]</a>";
                     
            $options=array(
                   'href'=>yii::app()->createUrl('space/view',array('id'=>$child['id'])),'class'=>'treenode-open'
                   );
            $nodeText = CHtml::openTag('a', $options);
            $nodeText.= $child['text'];
            $nodeText.= CHtml::closeTag('a')."\n";
            $data['text'] = $nodeText;
            //$data['expanded']=true;
            
            
            $return[]=$data;
        }
        
        echo str_replace(
            '"hasChildren":"0"',
            '"hasChildren":false',
            CTreeView::saveDataAsJson($return)
        );
        Yii::app()->end();
    }
}
