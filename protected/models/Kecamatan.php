<?php

/**
 * This is the model class for table "sm_kecamatan".
 *
 * The followings are the available columns in table 'sm_kecamatan':
 * @property string $id
 * @property string $id_kab
 * @property string $kecamatan
 * @property string $id_peta
 *
 * The followings are the available model relations:
 * @property Kabupaten $idKab
 */
class Kecamatan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kecamatan the static model class
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
		return 'sm_kecamatan';
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
			array('id', 'length', 'max'=>5),
			array('id_kab', 'length', 'max'=>2),
			array('kecamatan', 'length', 'max'=>24),
			array('id_peta', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_kab, kecamatan, id_peta', 'safe', 'on'=>'search'),
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
			'idKab' => array(self::BELONGS_TO, 'Kabupaten', 'id_kab'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_kab' => 'Id Kab',
			'kecamatan' => 'Kecamatan',
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
		$criteria->compare('id_kab',$this->id_kab,true);
		$criteria->compare('kecamatan',$this->kecamatan,true);
		$criteria->compare('id_peta',$this->id_peta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}