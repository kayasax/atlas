<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Announce[] $announces
 * @property File[] $files
 * @property Page[] $pages
 * @property Revision[] $revisions
 * @property Space[] $spaces
 * @property Userprofile $userprofile
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'length', 'max'=>45),
			array('password', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password', 'safe', 'on'=>'search'),
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
			'announces' => array(self::HAS_MANY, 'Announce', 'createdby'),
			'files' => array(self::HAS_MANY, 'File', 'added_by'),
			'pages' => array(self::HAS_MANY, 'Page', 'author'),
			'revisions' => array(self::HAS_MANY, 'Revision', 'createdby'),
			'spaces' => array(self::HAS_MANY, 'Space', 'createdby'),
			'userprofile' => array(self::HAS_ONE, 'Userprofile', 'iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function validatePassword($password){
		//die(crypt('loic'));
		return crypt($password,$this->password)===$this->password;
		//return $password===$this->password;
	}

	public function hashPassword($password)
    {
        return crypt($password, $this->generateSalt());
    }
    
    protected function beforeSave(){
    	if(parent::beforeSave())
    	{
    		if($this->isNewRecord)
    		{
    			$this->password=crypt($this->password);
    			/*$this->lasttouched=new CDbExpression('NOW()');
    			//$this->createdby=Yii::app()->user->id;
    			$this->createdby=Yii::app()->user->id;*/
    		}
    		else{}
    			
    		return true;
    	}
    	else
    		return false;
    }
    
    protected function afterSave()
    {   
    	//die ("id :".$this->id);
    	parent::afterSave();
    	$exists=Userprofile::model()->exists("iduser = $this->id");
    	if($exists === false){
    		$profile=new Userprofile;
    		$profile->iduser=$this->id;
    		$profile->save();
    		//Userprofile::model()->insert(array('iduser'=>$this->id));
    	}
    }
}