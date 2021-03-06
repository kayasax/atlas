<?php

/**
 * This is the model class for table "userprofile".
 *
 * The followings are the available columns in table 'userprofile':
 * @property integer $iduser
 * @property string $lastname
 * @property string $firstname
 * @property string $email
 * @property integer $status
 * @property string $lastseen
 * @property string $favorites
 * @property string $avatar
 *
 * The followings are the available model relations:
 * @property User $iduser0
 */
class Userprofile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Userprofile the static model class
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
		return 'userprofile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iduser', 'required'),
			array('iduser, status', 'numerical', 'integerOnly'=>true),
			array('lastname, firstname, email,avatar', 'length', 'max'=>100),
			array('lastseen', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('iduser, lastname, firstname, email, status, lastseen', 'safe', 'on'=>'search'),
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
			'iduser0' => array(self::BELONGS_TO, 'User', 'iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iduser' => 'Iduser',
			'lastname' => 'Nom',
			'firstname' => 'Prénom',
			'email' => 'Adresse Email',
			'status' => 'Statut',
			'lastseen' => 'Lastseen',
                        'favorites'=>'Favoris',
                        'avatar'=>'Avatar'
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

		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('lastseen',$this->lastseen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}