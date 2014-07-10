<?php

/**
 * This is the model class for table "menuitems".
 *
 * The followings are the available columns in table 'menuitems':
 * @property integer $id
 * @property string $menuitem
 * @property string $description
 * @property integer $restaurantId
 * @property integer $price
 */
class Menuitems extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'menuitems';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menuitem, description, restaurantId, price', 'required'),
			array('restaurantId, price', 'numerical', 'integerOnly'=>true),
			array('menuitem', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, menuitem, description, restaurantId, price', 'safe', 'on'=>'search'),
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
			'menuitem' => 'Menuitem',
			'description' => 'Description',
			'restaurantId' => 'Restaurant',
			'price' => 'Price',
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
		$criteria->compare('menuitem',$this->menuitem,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('restaurantId',$this->restaurantId);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Menuitems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getFormPriceStatus()
    {
        return array('1'=>'$','2'=>'$$','3'=>'$$$','4'=>'$$$$');
    }

    public function getPriceStatus()
    {
        return array(
            array('id'=>'1', 'title'=>'$'),
            array('id'=>'2', 'title'=>'$$'),
            array('id'=>'3', 'title'=>'$$$'),
            array('id'=>'4', 'title'=>'$$$$'),
        );
    }

    public function gridDisplayPrice($data, $row){
        $display = '';
        $i = 0;
        while($i < $data->price)
        {
            $display .= '$';
            ++$i;
        }
        return($display);
    }
}
