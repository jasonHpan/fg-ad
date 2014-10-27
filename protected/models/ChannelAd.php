<?php

/**
 * This is the model class for table "channel_ad".
 *
 * The followings are the available columns in table 'channel_ad':
 * @property integer $id
 * @property integer $channel_id
 * @property string $name
 * @property string $photo
 * @property integer $vw
 * @property string $s_date
 * @property string $e_date
 */
class ChannelAd extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
                   public static $base_upload_photo_dir ="/../images/channel_ad/";
                   public static $base_font_end_photo_dir ="/images/channel_ad/";
    
	public function tableName()
	{
		return 'channel_ad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('channel_id, name', 'required'),
			array('channel_id, vw', 'numerical', 'integerOnly'=>true),
			array('name, photo, s_date, e_date,url', 'length', 'max'=>255),
//                                                          array('photo', 'file', 'types'=>'jpg, gif, png'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, channel_id, name, photo, vw, s_date, e_date', 'safe', 'on'=>'search'),
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
			'photo' => '圖片',
                                                          'url' => '連結',
			'vw' => '上架',
			's_date' => '起始時間',
			'e_date' => '結束時間',
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
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('vw',$this->vw);
		$criteria->compare('s_date',$this->s_date,true);
		$criteria->compare('e_date',$this->e_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ChannelAd the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
                    public static function getHandleData($column,$id){
                            $model = self::model()->findByPk($id);
                            switch($column){
                                case "photo":
                                    return  self::$base_font_end_photo_dir.$model->channel_id."/".$model->photo;
                                    break;
                            }
                        
                    }
}
