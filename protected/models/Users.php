<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $hash
 */
class Users extends CActiveRecord
{
    public $originalAttributes;

    public $email2;
    public $password;
    public $password2;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email', 'required'),
			array('username', 'length', 'max'=>30),
            array('username', 'validateUniqueUsername'),
			array('email, salt', 'length', 'max'=>255),
            array('hash, verify', 'length', 'max'=>60),
            array('email', 'email'),
            array('email', 'validateUniqueEmail'),
            array('email', 'validateDuplicateEmail'),
            array('password', 'validateDuplicatePassword'),
            array('password', 'validatePassword'),
            array('email2, password2', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, hash', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'email' => 'Email',
            'email2' => 'Email again',
			'password' => 'Password',
            'password2' => 'Password again',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('hash',$this->hash,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function validateUniqueUsername($attribute,$params)
    {
        $results = Users::findAll(array('condition'=>"username='".$this->$attribute."'"));
        if(!empty($results))
            $this->addError($attribute, 'This username is already in use, please choose another.');
    }

    public function validateUniqueEmail($attribute,$params)
    {
        $results = Users::findAll(array('condition'=>"email='".$this->$attribute."'"));
        if(!empty($results))
            $this->addError($attribute, 'This email is already in use, please choose another.');
    }

    public function validateDuplicateEmail($attribute,$params)
    {
        if($this->isDirty('email'))
        {
            if($this->email !== $this->email2)
            {
               $this->addError($attribute, 'Email addresses do not match.');
            }
        }
    }

    public function validatePassword($attribute,$params)
    {
        //At least 8 characters, may add more requirements later
        if(strlen($this->$attribute)<8)
        {
            $this->addError($attribute, 'Your password must be at least 8 characters in length.');
        }
    }

    public function validateDuplicatePassword($attribute,$params)
    {
        if(!empty($this->password))
        {
            if($this->password !== $this->password2)
            {
                $this->addError($attribute, 'Passwords do not match.');
            }
        }
    }

    public function afterSave()
    {
        if($this->isNewRecord)
        {
            //Create and store salt
            //Create and store verify string
            //Log account creation
            //Send verification email
        }

        parent::afterSave();
    }

    public function afterFind()
    {
        $this->originalAttributes->username = $this->username;
        $this->originalAttributes->email = $this->email;

        parent::afterFind();
    }

    public function isDirty($attribute)
    {
        if($this->$attribute !== $this->originalAttributes->$attribute){
            return true;
        }
        return false;
    }
}
