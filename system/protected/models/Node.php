<?php

/**
 * This is the model class for table "tbl_node".
 *
 * The followings are the available columns in table 'tbl_node':
 * @property string $id_node
 * @property string $nama_node
 * @property string $alamat
 * @property string $no_alamat
 * @property string $rt
 * @property string $rw
 * @property string $kota
 * @property string $kecamatan
 * @property string $provinsi
 * @property string $lng
 * @property string $lat
 *
 * The followings are the available model relations:
 * @property TblStation[] $tblStations
 */
class Node extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_node';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_node, nama_node, kota, kecamatan, provinsi', 'required'),
			array('id_node, nama_node', 'length', 'max'=>100),
			array('alamat, kota, kecamatan, provinsi', 'length', 'max'=>500),
			array('no_alamat, rt, rw', 'length', 'max'=>20),
			array('lng, lat', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_node, nama_node, alamat, no_alamat, rt, rw, kota, kecamatan, provinsi, lng, lat', 'safe', 'on'=>'search'),
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
			'tblStations' => array(self::HAS_MANY, 'TblStation', 'id_node'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_node' => 'ID Node',
			'nama_node' => 'Nama Node',
			'alamat' => 'Alamat',
			'no_alamat' => 'No Alamat',
			'rt' => 'RT',
			'rw' => 'RW',
			'kota' => 'Kota',
			'kecamatan' => 'Kecamatan',
			'provinsi' => 'Provinsi',
			'lng' => 'Longitude',
			'lat' => 'Latitude',
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

		$criteria->compare('id_node',$this->id_node,true);
		$criteria->compare('nama_node',$this->nama_node,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_alamat',$this->no_alamat,true);
		$criteria->compare('rt',$this->rt,true);
		$criteria->compare('rw',$this->rw,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('kecamatan',$this->kecamatan,true);
		$criteria->compare('provinsi',$this->provinsi,true);
		$criteria->compare('lng',$this->lng,true);
		$criteria->compare('lat',$this->lat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Node the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
