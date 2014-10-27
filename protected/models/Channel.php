<?php

/**
 * This is the model class for table "channel".
 *
 * The followings are the available columns in table 'channel':
 * @property integer $id
 * @property integer $category_id
 * @property integer $tv_channel
 * @property string $youtube_channel
 * @property string $first_video
 * @property string $name
 * @property string $remark
 * @property integer $seq
 * @property integer $vw
 */
class Channel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'channel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, tv_channel, youtube_channel, name', 'required'),
			array('category_id, tv_channel, seq, vw', 'numerical', 'integerOnly'=>true),
			array('youtube_channel, first_video, name, remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id, tv_channel, youtube_channel, first_video, name, remark, seq, vw', 'safe', 'on'=>'search'),
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
                                            'oCategory'=>array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => '系統編號',
			'category_id' => '類別',
			'tv_channel' => '電視頻道',
			'youtube_channel' => 'youtube頻道連結',
			'first_video' => '預設撥放影片',
			'name' => '名稱',
                                                          'photo' => '預設圖片',
			'remark' => '備註',
			'seq' => '排序',
			'vw' => '顯示',
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('tv_channel',$this->tv_channel);
		$criteria->compare('youtube_channel',$this->youtube_channel,true);
		$criteria->compare('first_video',$this->first_video,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('seq',$this->seq);
		$criteria->compare('vw',$this->vw);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Channel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
