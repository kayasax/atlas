<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $idpage
 * @property integer $space
 * @property string $title
 * @property string $intro
 * @property string $content
 * @property integer $author
 * @property string $creationdate
 * @property string $lasttouched
 * @property integer $status
 * @property string $tags
 * @property string $version
 *
 * The followings are the available model relations:
 * @property Empathy $empathy
 * @property Space $space0
 * @property User $author0
 * @property Revision $revision
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('space,title','required'),
			array('space, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('tags', 'length', 'max'=>128),
			 array('tags', 'match', 'pattern'=>'/^[\w\s,]+$/',
            'message'=>'Les tags ne peuvent contenir que des lettres.'),
        	array('tags', 'normalizeTags'),
			array('version', 'length', 'max'=>5),
			array('intro, content, creationdate, lasttouched', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpage, space, title, intro, content, author, creationdate, lasttouched, status, tags, version', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'empathy' => array(self::HAS_ONE, 'Empathy', 'page'),
			'space0' => array(self::BELONGS_TO, 'Space', 'space'),
			'author0' => array(self::BELONGS_TO, 'User', 'author'),
			'revision' => array(self::HAS_ONE, 'Revision', 'idpage'),
			'files' => array(self::HAS_MANY, 'File', 'page'),
			'nbFiles' => array(self::STAT, 'File', 'page'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpage' => 'Idpage',
			'space' => 'Espace parent',
			'title' => 'Titre',
			'intro' => 'Intro',
			'content' => 'Contenu',
			'author' => 'Auteur',
			'creationdate' => 'Créée',
			'lasttouched' => 'Modifiée',
			'status' => 'Statut',
			'tags' => 'Tags',
			'version' => 'Version',
		);
	}

	/**
	* Events this model can rise
	**/
	public function onNewPage($event){
		$this->raiseEvent('onNewPage',$event);
	}

	public function onUpdatePage($event){
		$this->raiseEvent('onUpdatePage',$event);
	}



	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idpage',$this->idpage);
		$criteria->compare('space',$this->space);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('author',$this->author);
		$criteria->compare('creationdate',$this->creationdate,true);
		$criteria->compare('lasttouched',$this->lasttouched,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('version',$this->version,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	* Mises à jour automatique des dates de création / modif
	*/
	protected function beforeSave(){
	    if(parent::beforeSave())
	    {
	        if($this->isNewRecord)
	        {
	            $this->creationdate=new CDbExpression('NOW()');
	            $this->lasttouched=new CDbExpression('NOW()');
	            //$this->createdby=Yii::app()->user->id;
	            $this->author=Yii::app()->user->id;;
	        }
	        else
	            $this->lasttouched=new CDbExpression('NOW()');
	        return true;
	    }
	    else
	        return false;
	}

	/**
	* Validation de l'unicité des tags
	*/
	public function normalizeTags($attribute,$params)
	{
    $this->tags=Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}

	protected function afterSave()
	{
   	parent::afterSave();
    Tag::model()->updateFrequency($this->_oldTags, $this->tags);
	
    if ($this->isNewRecord) {
        $event = new CModelEvent($this);
    	$this->onNewPage($event); 
    }
 		$event = new CModelEvent($this);
    	$this->onUpdatePage($event); 
    
	}	
 
	private $_oldTags;
 
	protected function afterFind()
	{
    	parent::afterFind();
    	$this->_oldTags=$this->tags;
	}

	protected function afterDelete()
	{
    parent::afterDelete();
    Tag::model()->updateFrequency($this->tags, '');
	}

	
}