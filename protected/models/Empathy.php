<?php

/**
 * This is the model class for table "empathy".
 *
 * The followings are the available columns in table 'empathy':
 * @property integer $page
 * @property integer $user
 * @property string $love
 *
 * The followings are the available model relations:
 * @property Page $page0
 */
class Empathy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Empathy the static model class
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
		return 'empathy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page, user', 'required'),
			array('page, user', 'numerical', 'integerOnly'=>true),
			array('love', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('page, user, love', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'page' => 'Page',
			'user' => 'User',
			'love' => 'Love',
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

		$criteria->compare('page',$this->page);
		$criteria->compare('user',$this->user);
		$criteria->compare('love',$this->love,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}