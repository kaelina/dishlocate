<?php

/**
 * This is the model class for table "locations".
 *
 * The followings are the available columns in table 'locations':
 * @property integer $id
 * @property integer $metroId
 * @property integer $restaurantId
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property integer $zip
 * @property integer $phone
 * @property integer $isOpen
 */
class Locations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'locations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('metroId, restaurantId, address1, city, state, zip, phone', 'required'),
			array('metroId, restaurantId, zip, phone, isOpen', 'numerical', 'integerOnly'=>true),
			array('address1, address2', 'length', 'max'=>100),
			array('city', 'length', 'max'=>50),
			array('state', 'length', 'max'=>2),
            array('address1, address2', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, metroId, restaurantId, address1, address2, city, state, zip, phone, isOpen', 'safe', 'on'=>'search'),
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
            'metros' => array(self::BELONGS_TO, 'Metros', 'metroId'),
            'restaurants' => array(self::BELONGS_TO, 'Restaurants', 'restaurantId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'metroId' => 'Metro',
			'restaurantId' => 'Restaurant',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'city' => 'City',
			'state' => 'State',
			'zip' => 'Zip',
			'phone' => 'Phone',
			'isOpen' => 'Is Open',
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
		$criteria->compare('metroId',$this->metroId);
		$criteria->compare('restaurantId',$this->restaurantId);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zip',$this->zip);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('isOpen',$this->isOpen);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Locations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getFormBooleanStatus()
    {
        return array('1'=>'Yes','0'=>'No');
    }

    public function getBooleanStatus()
    {
        return array(
            array('id'=>'1', 'title'=>'Yes'),
            array('id'=>'0', 'title'=>'No'),
        );
    }
}
