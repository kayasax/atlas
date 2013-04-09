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
        
        parent::init(); 
    }
 
    /**
     * Search index creation
     */
    public function actionCreate()
    {
        setlocale(LC_ALL, 'fr_FR.iso-8859-1');
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());
        
         $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles), true);
 
        $pages = Page::model()->with('space0')->findAll();
        foreach($pages as $page){
            
            //var_dump($page->title);
            
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Keyword('type','page'));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('_id',$page->idpage));
            $doc->addField(Zend_Search_Lucene_Field::Text('title', $page->title."&nbsp;{ <i class='icon-folder-open-alt'></i>&nbsp;".$page->space0->name." }","iso-8859-1"));
            $doc->addField(Zend_Search_Lucene_Field::Text('intro',$page->intro));   
            $doc->addField(Zend_Search_Lucene_Field::Text('content',CHtml::decode($page->content)));
 
 
            $index->addDocument($doc);
        }
        //Yii::app()->end();
        $spaces = Space::model()->findAll();
        foreach($spaces as $space){
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Keyword('type','space'));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('_id',$space->idspace));
            $doc->addField(Zend_Search_Lucene_Field::Text('title', CHtml::encode($space->name)));
            $doc->addField(Zend_Search_Lucene_Field::Text('intro',CHtml::encode($space->description)));   
            $doc->addField(Zend_Search_Lucene_Field::Text('content',''));
 
 
            $index->addDocument($doc);
        }
        
        $index->commit();
        echo 'Lucene index created';
    }
 
   public function actionSearch()
    {
       Zend_Search_Lucene::setDefaultSearchField(null);
       setlocale(LC_ALL, 'fr_FR.iso-8859-1');
       Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());
    
       //Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
       //Zend_Search_Lucene_Analysis_Analyzer::setDefault(new  Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());
       
        $this->layout='column2';
         if (($term = Yii::app()->getRequest()->getParam('q', null)) !== null) {
            $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            $results = $index->find($term);
            $query = Zend_Search_Lucene_Search_QueryParser::parse($term);       
            $this->render('search', compact('results', 'term', 'query'));
        }
    }
}
