<?php

/**
 * This is the model class for table "sm_arc".
 *
 * The followings are the available columns in table 'sm_arc':
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_tipe_dokumen
 * @property string $tanggal_batas
 * @property string $tanggal_upload
 * @property string $csv_link
 * @property string $mdb_link
 * @property integer $flag
 *
 * The followings are the available model relations:
 * @property TipeDokumen $idTipeDokumen
 * @property User $idUser
 */
class Arc extends CActiveRecord
{
	public $user_search;
	public $tipe_dokumen_search;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Arc the static model class
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
		return 'sm_arc';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		if(Yii::app()->user->getRole()==1){
			return array(
				array('id_user, id_tipe_dokumen, tanggal_batas, flag', 'required'),
				array('id_user, id_tipe_dokumen, flag', 'numerical', 'integerOnly'=>true),
				array('csv_link, mdb_link', 'length', 'max'=>64),
				array('tanggal_upload', 'safe'),
				array('csv_link', 'file', 'types'=>'csv', 'allowEmpty'=>false, 'safe' => false),
				array('mdb_link', 'file', 'types'=>'mdb', 'allowEmpty'=>false, 'safe' => false),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, id_user, id_tipe_dokumen, tanggal_batas, tanggal_upload, csv_link, mdb_link, flag', 'safe', 'on'=>'search'),
			);
		}else{
			return array(
				array('id_user, id_tipe_dokumen, tanggal_batas, flag', 'required'),
				array('id_user, id_tipe_dokumen, flag', 'numerical', 'integerOnly'=>true),
				array('csv_link, mdb_link', 'length', 'max'=>64),
				array('tanggal_upload', 'safe'),
				array('csv_link', 'file', 'types'=>'csv', 'allowEmpty'=>true, 'safe' => false),
				array('mdb_link', 'file', 'types'=>'mdb', 'allowEmpty'=>true, 'safe' => false),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, id_user, id_tipe_dokumen, tanggal_batas, tanggal_upload, csv_link, mdb_link, flag', 'safe', 'on'=>'search'),
			);
		}

	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idTipeDokumen' => array(self::BELONGS_TO, 'TipeDokumen', 'id_tipe_dokumen'),
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'Id User',
			'id_tipe_dokumen' => 'Id Tipe Dokumen',
			'tanggal_batas' => 'Tanggal Batas',
			'tanggal_upload' => 'Tanggal Upload',
			'csv_link' => 'Csv Link',
			'mdb_link' => 'Mdb Link',
			'flag' => 'Status',
			'user_search' => 'Nama BPS',
			'tipe_dokumen_search' => 'Tipe Dokumen'


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
		$criteria->with = array('idUser', 'idTipeDokumen');
		$criteria->compare( 'idUser.user_name', $this->user_search, true );
		$criteria->compare( 'idTipeDokumen.nama_dokumen', $this->tipe_dokumen_search, true );

		if(Yii::app()->user->getRole()==1){
			$criteria->addCondition('id_user='.Yii::app()->user->id);
		}

		$criteria->compare('id',$this->id);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_tipe_dokumen',$this->id_tipe_dokumen);
		$criteria->compare('tanggal_batas',$this->tanggal_batas,true);
		$criteria->compare('tanggal_upload',$this->tanggal_upload,true);
		$criteria->compare('csv_link',$this->csv_link,true);
		$criteria->compare('mdb_link',$this->mdb_link,true);
		$criteria->compare('flag',$this->flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'user_search'=>array(
						'asc'=>'idUser.user_name',
						'desc'=>'idUser.user_name DESC',
					),
					'tipe_dokumen_search'=>array(
						'asc'=>'idTipeDokumen.nama_dokumen',
						'desc'=>'idTipeDokumen.nama_dokumen DESC',
					),

					'*',
				),
			),
		));
	}
}