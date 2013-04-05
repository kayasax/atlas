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
                'actions' => array('index', 'view'),
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
        //echo 'fav : '.$profile->favorites;
        $fav=$profile->favorites;
        if($fav==NULL){
            $profile->favorites = $_POST['id'];
            $profile->save();
            echo "<p class='alert alert-success'>Page ajoutée à vos favoris</p>";
        }
        
        ECHO '<p class="alert alert-success">toggle fav for '.Yii::app()->user->id .'and id='.$_POST['id'].'</p>';
        Yii::app()->end();
    }
}
