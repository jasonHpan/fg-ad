<?php

/**
 * This is the model class for table "fg_area".
 *
 * The followings are the available columns in table 'fg_area':
 * @property integer $id
 * @property string $name
 * @property integer $seq
 * @property integer $city_id
 *
 * The followings are the available model relations:
 * @property FgCity $city
 * @property FgBranch[] $fgBranches
 */
class FgArea extends RewriteAR
{
	  
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FgArea the static model class
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
		return "FG_Area";
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('id', 'required'),
			array('id, seq, city_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, seq, city_id', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'FgCity', 'city_id'),
			'fgBranches' => array(self::HAS_MANY, 'FgBranch', 'area_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '流水號',
			'name' => '地區名稱',
			'seq' => '排序',
			'city_id' => '縣市',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('seq',$this->seq);
		$criteria->compare('city_id',$this->city_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}