<?php
/* @var $this SpaceController */
/* @var $model Space */
//var_dump(array_reverse($path));
$this->breadcrumbs = $path; //$model->name,


if (!yii::app()->user->isGuest) {
    $favs = explode(',', User::model()->with('userprofile')->findByPk(Yii::app()->user->id)->userprofile->spacefavs);
    if (in_array($model->idspace, $favs)) {
        $icon = 'icon-heart';
        $title = 'Cliquer pour supprimer cet espace de vos favoris';
    } else {
        $icon = 'icon-heart-empty';
        $title = 'Cliquer pour ajouter cet espace à vos favoris';
    }
    ?>

<div class="widget-header"> <span> <h3><?php echo $model->name; ?> - <small><?php echo $model->description; ?></small></h3></span>



    <span class='pull-right' style='margin-right: 10px;color:red'><?php
        echo CHtml::ajaxLink("<i class='" . $icon . "' id='favIcon'></i>", Yii::app()->createUrl("ajax/addToFav"), array(
            'update' => '#favMessage',
            'data' => array('id' => $model->idspace, 'type' => 'space'),
            'type' => 'post',
            'success' => 'function($data){
                            $("#favMessage").html($data);
                            if($("#favIcon").hasClass("icon-heart-empty")){
                                $("#favIcon").removeClass("icon-heart-empty").addClass("icon-heart");
                                $("#favLink").attr("title","Cliquer pour supprimer cet espace de vos favoris");
                            } 
                            else{
                               $("#favIcon").removeClass("icon-heart").addClass("icon-heart-empty")
                               $("#favLink").attr("title","Cliquer pour ajouter cet espace à vos favoris");
                            }
                         }
                         '
                ), array(
            'id' => 'favLink',
            'title' => $title,
            //'class' => '',
            'style' => 'color:red',
        ));
    }
    ?>
    </span>
</div>
<div id='favMessage'></div>
    <?php if (isset($index->content)): ?> 
    <div class='widget widget-content lead'>
        <?php echo $index->content; ?>
    </div>
<?php endif; ?>
<div class="row">
    <div class="span4">
        <div class="widget-header"><h3><i class="icon-book"></i> &nbsp;Espaces enfants</h3></div>
        <div class="widget-content">
            <?php //echo CVarDumper::dump($childs->getData());?>	

            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $childs,
                'itemView' => '_child',
            ));
            ?>
        </div>
    </div>

    <div class="span5">
        <div class="widget-header"><h3><i class="icon-file"></i>&nbsp; Pages récentes</h3></div>
        <div class="widget-content">
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $pages,
                'itemView' => '_page',
                'sortableAttributes' => array(
                    'name',
                    'author',
                    'creationdate',
                ),
            ));
            ?>
        </div>
    </div>
</div>

