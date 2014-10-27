<?php

/**
 * This is the model class for table "fg_city".
 *
 * The followings are the available columns in table 'fg_city':
 * @property integer $id
 * @property string $name
 * @property integer $direction_id
 * @property integer $seq
 *
 * The followings are the available model relations:
 * @property FgArea[] $fgAreas
 * @property FgDirection $direction
 */
class FgCity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FgCity the static model class
	 */
	//改寫父類別連線方式
	function __construct($scenario='insert')
    {
    	// 修改連線資訊
        $dbname = Yii::app()->dbfgmanage->connectionString;
        Yii::app()->db->setActive(false);
        Yii::app()->db->connectionString = trim($dbname);
        Yii::app()->db->setActive(true);
        // 新增及修改
        if($scenario===null) // internally used by populateRecord() and model()
			return;
        $this->setScenario($scenario);
		$this->setIsNewRecord(true);
		
    }   
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'FG_City';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, direction_id, seq', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, direction_id, seq', 'safe', 'on'=>'search'),
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
			'fgAreas' => array(self::HAS_MANY, 'FgArea', 'city_id'),
			'direction' => array(self::BELONGS_TO, 'FgDirection', 'direction_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'direction_id' => 'Direction',
			'seq' => 'Seq',
		);
	}
	public function getAreaName(){
		return $this->fgAreas->name;
	}
	public function getDirectionName(){
		return $this->direction->name;
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria();
		$criteria->together = true;
		$criteria->with = array('direction',);
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('direction_id',$this->direction_id);
		$criteria->compare('seq',$this->seq);
		$criteria->addSearchCondition('direction.name', $this->direction);
		// $criteria->compare('direction.name',$this->direction->name);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}