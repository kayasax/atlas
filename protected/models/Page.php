<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $idpage
 * @property string $title
 * @property string $intro
 * @property string $content
 * @property integer $creator
 * @property string $creation
 * @property string $last_modification
 * @property integer $modified_by
 *
 * The followings are the available model relations:
 * @property Userprofile $creator0
 * @property Version $version
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
			array('creator', 'required'),
			array('creator, modified_by', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('intro, content, creation, last_modification', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpage, title, intro, content, creator, creation, last_modification, modified_by', 'safe', 'on'=>'search'),
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
			'creator0' => array(self::BELONGS_TO, 'Userprofile', 'creator'),
			'version' => array(self::HAS_ONE, 'Version', 'idpage'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpage' => 'Idpage',
			'title' => 'Titre',
			'intro' => 'Intro',
			'content' => 'Contenu',
			'creator' => 'Créé par',
			'creation' => 'Date création',
			'last_modification' => 'Dernière modification',
			'modified_by' => 'Modifié par',
		);
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('creator',$this->creator);
		$criteria->compare('creation',$this->creation,true);
		$criteria->compare('last_modification',$this->last_modification,true);
		$criteria->compare('modified_by',$this->modified_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Automatic date modification
	 * @return multitype:multitype:string NULL
	 */
	public function behaviors(){
		return array(
				'CTimestampBehavior' => array(
						'class' => 'zii.behaviors.CTimestampBehavior',
						'createAttribute' => 'creation',
						'updateAttribute' => 'last_modification',
				)
		);
	}
}