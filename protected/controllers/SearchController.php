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
        //setlocale(LC_ALL, 'fr_FR.utf-8');
        Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());
                
        $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles), true);
 
        $pages = Page::model()->with('space0')->findAll();
        foreach($pages as $page){
            var_dump(utf8_decode($page->title));
            
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Keyword('type','page'));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('_id',$page->idpage));
            $doc->addField(Zend_Search_Lucene_Field::Text('title', utf8_decode($page->title)."&nbsp;{ <i class='icon-folder-open-alt'></i>&nbsp;".utf8_decode($page->space0->name)." }"));
            $doc->addField(Zend_Search_Lucene_Field::Text('intro',utf8_decode($page->intro)));   
            $doc->addField(Zend_Search_Lucene_Field::Text('content',$page->content));
 
            $index->addDocument($doc);
        }
        //Yii::app()->end(); 
        $files = File::model()->findAll();
             
        foreach($files as $file){
            $doc = new Zend_Search_Lucene_Document();
            $doc->addField(Zend_Search_Lucene_Field::Keyword('type','file'));
            $doc->addField(Zend_Search_Lucene_Field::Keyword('_id',$file->page));
            $doc->addField(Zend_Search_Lucene_Field::Text('title', CHtml::encode($file->filename)));
            $doc->addField(Zend_Search_Lucene_Field::Text('intro',CHtml::encode($file->filedescription)));   
            $doc->addField(Zend_Search_Lucene_Field::Text('content',''));
 
 
            $index->addDocument($doc);
        }
        
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
        echo 'index Lucene créé';
        $index->optimize();
        echo 'fin optimisation';
    }
 
   public function actionSearch()
    {
       Zend_Search_Lucene::setDefaultSearchField(null);
       //setlocale(LC_ALL, 'fr_FR.utf-8');
       Zend_Search_Lucene_Analysis_Analyzer::setDefault(new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());
    
       //Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
       //Zend_Search_Lucene_Analysis_Analyzer::setDefault(new  Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive());
       
        $this->layout='column2';
         if (($term = Yii::app()->getRequest()->getParam('q', null)) !== null) {
            $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            (preg_match("/\*/", $term) == 0 )? $results = $index->find(utf8_decode($term)."~"):$results = $index->find(utf8_decode($term)); // Make a fuzzysearch if no wildcar
            $query = Zend_Search_Lucene_Search_QueryParser::parse($term);       
            $this->render('search', compact('results', 'term', 'query'));
        }
    }
}
