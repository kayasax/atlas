<?php

class SearchController extends Controller
{
	 /**
     * @var string index dir as alias path from <b>application.</b>  , default to <b>runtime.search</b>
     */
    private $_indexFiles = 'runtime.search';
    /**
     * (non-PHPdoc)
     * @see CController::init()
     */
    public function init(){
        //Yii::import('application.vendors.*');
        require_once('Zend/Search/Lucene.php');
        setlocale(LC_ALL, 'fr_FR.iso-8859-1');
        parent::init(); 
    }
 
    /**
     * Search index creation
     */
    public function actionCreate()
    {
        
         $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles), true);
 
        $pages = Page::model()->with('space0')->findAll();
        foreach($pages as $page){
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Keyword('type','page'));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('_id',$page->idpage));
            $doc->addField(Zend_Search_Lucene_Field::Text('title', CHtml::encode($page->title)."&nbsp;{ <i class='icon-folder-open-alt'></i>&nbsp;".$page->space0->name." }"));
            $doc->addField(Zend_Search_Lucene_Field::Text('link',CHtml::encode($page->intro)));   
            $doc->addField(Zend_Search_Lucene_Field::Text('content',CHtml::encode($page->content,'utf8')));
 
 
            $index->addDocument($doc);
        }
        
        $spaces = Space::model()->findAll();
        foreach($spaces as $space){
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Keyword('type','space'));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('_id',$space->idspace));
            $doc->addField(Zend_Search_Lucene_Field::Text('title', CHtml::encode($space->name)));
            $doc->addField(Zend_Search_Lucene_Field::Text('link',CHtml::encode($space->description)));   
            $doc->addField(Zend_Search_Lucene_Field::Text('content',''));
 
 
            $index->addDocument($doc);
        }
        
        $index->commit();
        echo 'Lucene index created';
    }
 
   public function actionSearch()
    {
        $this->layout='column2';
         if (($term = Yii::app()->getRequest()->getParam('q', null)) !== null) {
            $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            $results = $index->find($term);
            $query = Zend_Search_Lucene_Search_QueryParser::parse($term);       
            $this->render('search', compact('results', 'term', 'query'));
        }
    }
}
