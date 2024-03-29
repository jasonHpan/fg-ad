<?php

/**
 * This is the model class for table "fg_user".
 *
 * The followings are the available columns in table 'fg_user':
 * @property integer $id
 * @property string $name
 * @property string $account
 * @property string $password
 * @property integer $level_id
 * @property integer $place_id
 * @property integer $branch_id
 *
 * The followings are the available model relations:
 * @property FgCtrlBranch[] $fgCtrlBranches
 * @property FgLevel $level
 */
class FgUser extends CActiveRecord
{
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
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FgUser the static model class
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
		return 'FG_User';
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
			array('id, level_id, place_id, branch_id', 'numerical', 'integerOnly'=>true),
			array('name, account, password', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, account, password, level_id, place_id, branch_id', 'safe', 'on'=>'search'),
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
			'fgCtrlBranches' => array(self::HAS_MANY, 'FgCtrlBranch', 'user_id'),
			'level' => array(self::BELONGS_TO, 'FgLevel', 'level_id'),
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
			'account' => 'Account',
			'password' => 'Password',
			'level_id' => 'Level',
			'place_id' => 'Place',
			'branch_id' => 'Branch',
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
		$criteria->compare('account',$this->account,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('place_id',$this->place_id);
		$criteria->compare('branch_id',$this->branch_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}