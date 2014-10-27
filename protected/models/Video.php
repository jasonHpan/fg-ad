<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property integer $id
 * @property integer $channel_id
 * @property string $name
 * @property string $video_code
 * @property integer $vw
 * @property integer $seq
 * @property integer $remark
 */
class Video extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('channel_id, video_code', 'required'),
			array('channel_id, vw, seq', 'numerical', 'integerOnly'=>true),
			array('name, video_code, photo,remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, channel_id, name, video_code, photo, vw, seq, remark', 'safe', 'on'=>'search'),
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
                                             'oChannel'=>array(self::BELONGS_TO, 'Channel', 'channel_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '系統編號',
			'channel_id' => '頻道',
			'name' => '名稱',
                                                          'photo' => '預設圖片',
			'video_code' => '影片代碼',
			'vw' => '顯示',
			'seq' => '排序',
			'remark' => '備註',
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
		$criteria->compare('channel_id',$this->channel_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('video_code',$this->video_code,true);
		$criteria->compare('vw',$this->vw);
		$criteria->compare('seq',$this->seq);
		$criteria->compare('remark',$this->remark);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
