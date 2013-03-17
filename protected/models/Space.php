<?php

/**
 * This is the model class for table "space".
 *
 * The followings are the available columns in table 'space':
 * @property integer $idspace
 * @property string $name
 * @property integer $parent
 * @property string $description
 * @property integer $createdby
 * @property string $creationdate
 * @property string $lasttouched
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Page[] $pages
 * @property User $createdby0
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

	public static function getParents(){
		$criteria = new CDbCriteria;
		$criteria->select = 'idspace, name'; 
		$p=Space::model()->findAll($criteria);
		return CHtml::listData($p,'idspace','name');
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
			//array('createdby', 'required'),
			array('parent', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			//array('status', 'length', 'max'=>45),
			array('description','safe'), //creationdate, lasttouched'
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('name, description, createdby, parent', 'safe', 'on'=>'search'),
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
			'pages' => array(self::HAS_MANY, 'Page', 'space'),
			'creator' => array(self::BELONGS_TO, 'User', 'createdby'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idspace' => 'Idspace',
			'name' => 'Nom',
			'parent' => 'Parent',
			'description' => 'Description',
			/*'createdby' => 'Createdby',
			'creationdate' => 'Creationdate',
			'lasttouched' => 'Lasttouched',
			'status' => 'Status',*/
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

		//$criteria->compare('idspace',$this->idspace);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('createdby',$this->createdby);
		/*$criteria->compare('creationdate',$this->creationdate,true);
		$criteria->compare('lasttouched',$this->lasttouched,true);
		$criteria->compare('status',$this->status,true);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave(){
	    if(parent::beforeSave())
	    {
	        if($this->isNewRecord)
	        {
	            $this->creationdate=new CDbExpression('NOW()');
	            $this->lasttouched=new CDbExpression('NOW()');
	            //$this->createdby=Yii::app()->user->id;
	            $this->createdby=1;
	        }
	        else
	            $this->lasttouched=time();
	        return true;
	    }
	    else
	        return false;
	}
}