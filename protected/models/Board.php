<?php

/**
 * This is the model class for table "board".
 *
 * The followings are the available columns in table 'board':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property integer $status
 */
class Board extends CActiveRecord
{
	public static $base_upload_photo_dir ="/../images/board/";
    public static $base_font_end_photo_dir ="/images/board/";
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Board the static model class
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
		return 'board';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('image', 'length', 'max'=>100),
			array('content', 'safe'),
			array('date_time', 'safe'),
			array('image','safe'),
			array('frontend_color','safe'),
			array('frontend_image','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, image, status', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'title' => '看板標題',
			'content' => '看板內容',
			'image' => '右側看板圖片',
			'status' => '上下架狀態',
			'frontend_color'=>'前台背景顏色',
			'frontend_image'=>'前台圖片',
			'date_time' => '更新日期',
		);
	}
	public function getStatus(){
	  return ($this->status==0)?("上架"):("下架");
	}
	public function getContent(){
		return mb_substr(strip_tags($this->content),0,29,"utf-8")."...";
	}
	public function getTitle(){
		return mb_substr($this->content,0,17,"utf-8")."...";
	}
	public function getImage(){
		return Board::$base_upload_photo_dir.$this->image;
	}
	public function getFrontendImage(){
		return Board::$base_font_end_photo_dir.$this->frontend_image;
	}
	public function getFrontendColor(){
		return "#".$this->frontend_color;
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function beforeSave() {
	    if ($this->isNewRecord)
	        $this->date_time = new CDbExpression('NOW()');
	    else
	        $this->date_time = new CDbExpression('NOW()');
	 
	    return parent::beforeSave();
	}
}