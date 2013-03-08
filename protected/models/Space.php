<?php

/**
 * This is the model class for table "space".
 *
 * The followings are the available columns in table 'space':
 * @property integer $idespace
 * @property string $name
 * @property string $description
 * @property string $creation
 * @property integer $creator
 * @property string $startpage
 *
 * The followings are the available model relations:
 * @property Userprofile $creator0
 */
class Space extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Space the static model class
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
		return 'space';
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
			array('creator', 'numerical', 'integerOnly'=>true),
			array('name, startpage', 'length', 'max'=>100),
			array('description, creation', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idespace, name, description, creation, creator, startpage', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idespace' => 'Idespace',
			'name' => 'Nom',
			'description' => 'Description',
			'creation' => 'Date de création',
			'creator' => 'Créateur',
			'startpage' => 'Startpage',
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

		$criteria->compare('idespace',$this->idespace);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('creation',$this->creation,true);
		$criteria->compare('creator',$this->creator);
		$criteria->compare('startpage',$this->startpage,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	* automatically fill timestamp on creation / update
	**/
	public function behaviors(){
	return array(
		'CTimestampBehavior' => array(
			'class' => 'zii.behaviors.CTimestampBehavior',
			'createAttribute' => 'creation',
			'updateAttribute' => null,
			)
		);
	}
}