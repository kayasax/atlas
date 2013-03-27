<?php

/**
 * This is the model class for table "file".
 *
 * The followings are the available columns in table 'file':
 * @property integer $idfile
 * @property string $filename
 * @property string $mime
 * @property string $filedescription
 * @property string $date
 * @property integer $added_by
 * @property integer $page
 *
 * The followings are the available model relations:
 * @property Page $page0
 * @property User $addedBy
 */
class File extends CActiveRecord
{
	public $file;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return File the static model class
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
		return 'file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('added_by, page,file', 'required'),
			array('added_by, page', 'numerical', 'integerOnly'=>true),
			array('filename, mime', 'length', 'max'=>100),
			array('filedescription, date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idfile, filename, mime, filedescription, date, added_by, page', 'safe', 'on'=>'search'),
			array('file', 'file', 'allowEmpty' => false),
			
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
			'page0' => array(self::BELONGS_TO, 'Page', 'page'),
			'addedBy' => array(self::BELONGS_TO, 'User', 'added_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idfile' => 'Idfile',
			'filename' => 'Filename',
			'mime' => 'Mime',
			'filedescription' => 'Filedescription',
			'date' => 'Date',
			'added_by' => 'Added By',
			'page' => 'Page',
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

		$criteria->compare('idfile',$this->idfile);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('mime',$this->mime,true);
		$criteria->compare('filedescription',$this->filedescription,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('added_by',$this->added_by);
		$criteria->compare('page',$this->page);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}