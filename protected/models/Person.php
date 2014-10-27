<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property integer $id
 * @property integer $uid
 * @property integer $news
 * @property integer $stock
 * @property integer $lottery
 * @property integer $coupon
 * @property integer $luck
 * @property integer $poll
 * @property integer $weather
 */
class Person extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, news, stock, lottery, coupon, luck, poll, weather', 'required'),
			array('uid, news, stock, lottery, coupon, luck, poll, weather,upd,delay', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, uid, news, stock, lottery, coupon, luck, poll, weather,upd,delay', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '系統編號',
			'uid' => '使用者編號',
                                                          'delay' => '持續時間(毫秒)',
			'news' => '最新消息',
			'stock' => '天氣預報',
			'lottery' => '今日股市',
			'coupon' => '最新商品',
			'luck' => '最新資訊',
			'poll' => '新品上市',
			'weather' => '會員中心',
                    
//                                                          'news' => '新聞快訊',
//			'stock' => '股票快訊',
//			'lottery' => '台灣彩卷',
//			'coupon' => '優惠快訊',
//			'luck' => '好康抽獎',
//			'poll' => 'Heran民調',
//			'weather' => '氣相資訊',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('news',$this->news);
		$criteria->compare('stock',$this->stock);
		$criteria->compare('lottery',$this->lottery);
		$criteria->compare('coupon',$this->coupon);
		$criteria->compare('luck',$this->luck);
		$criteria->compare('poll',$this->poll);
		$criteria->compare('weather',$this->weather);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Person the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
                    public  function getDataByUid($uid){
                        
                        $sql = "select * from person where uid = ".$uid;
                        $data = Yii::app()->db->createCommand($sql)->queryRow();

                        return $data;
                    }
}
