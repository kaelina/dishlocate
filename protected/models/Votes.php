<?php

/**
 * This is the model class for table "votes".
 *
 * The followings are the available columns in table 'votes':
 * @property integer $id
 * @property integer $dishId
 * @property integer $metroId
 * @property integer $menuitemId
 * @property integer $userId
 * @property string $dt
 * @property string $ip
 */
class Votes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'votes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dishId, metroId, menuitemId, userId, dt, ip', 'required'),
			array('dishId, metroId, menuitemId, userId', 'numerical', 'integerOnly'=>true),
			array('ip', 'length', 'max'=>39),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, dishId, metroId, menuitemId, userId, dt, ip', 'safe', 'on'=>'search'),
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
			'dishId' => 'Dish',
			'metroId' => 'Metro',
			'menuitemId' => 'Menuitem',
			'userId' => 'User',
			'dt' => 'Dt',
			'ip' => 'Ip',
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
		$criteria->compare('dishId',$this->dishId);
		$criteria->compare('metroId',$this->metroId);
		$criteria->compare('menuitemId',$this->menuitemId);
		$criteria->compare('userId',$this->userId);
		$criteria->compare('dt',$this->dt,true);
		$criteria->compare('ip',$this->ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Votes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
