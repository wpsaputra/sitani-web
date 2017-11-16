<?php

/**
 * This is the model class for table "sm_kabupaten".
 *
 * The followings are the available columns in table 'sm_kabupaten':
 * @property string $id
 * @property string $kabupaten
 * @property string $id_peta
 *
 * The followings are the available model relations:
 * @property Kecamatan[] $kecamatans
 */
class Kabupaten extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kabupaten the static model class
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
		return 'sm_kabupaten';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, id_peta', 'required'),
			array('id', 'length', 'max'=>2),
			array('kabupaten', 'length', 'max'=>20),
			array('id_peta', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kabupaten, id_peta', 'safe', 'on'=>'search'),
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
			'kecamatans' => array(self::HAS_MANY, 'Kecamatan', 'id_kab'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kabupaten' => 'Kabupaten',
			'id_peta' => 'Id Peta',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('kabupaten',$this->kabupaten,true);
		$criteria->compare('id_peta',$this->id_peta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}