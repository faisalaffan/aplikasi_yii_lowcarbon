<?php

/**
 * This is the model class for table "tbl_station".
 *
 * The followings are the available columns in table 'tbl_station':
 * @property string $id_station
 * @property string $id_node
 * @property string $nama_station
 * @property string $lng
 * @property string $lat
 *
 * The followings are the available model relations:
 * @property TblAngin[] $tblAngins
 * @property TblArahangin[] $tblArahangins
 * @property TblCo[] $tblCos
 * @property TblCo2[] $tblCo2s
 * @property TblKelembaban[] $tblKelembabans
 * @property TblMetan[] $tblMetans
 * @property TblNode $idNode
 * @property TblSuhu[] $tblSuhus
 * @property TblTegangan[] $tblTegangans
 */
class Station extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_station';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_station, id_node, nama_station', 'required'),
			array('id_station, id_node', 'length', 'max'=>100),
			array('nama_station', 'length', 'max'=>250),
			array('lng, lat', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_station, id_node, nama_station, lng, lat', 'safe', 'on'=>'search'),
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
			'tblAngins' => array(self::HAS_MANY, 'TblAngin', 'id_station'),
			'tblArahangins' => array(self::HAS_MANY, 'TblArahangin', 'id_station'),
			'tblCos' => array(self::HAS_MANY, 'TblCo', 'id_station'),
			'tblCo2s' => array(self::HAS_MANY, 'TblCo2', 'id_station'),
			'tblKelembabans' => array(self::HAS_MANY, 'TblKelembaban', 'id_station'),
			'tblMetans' => array(self::HAS_MANY, 'TblMetan', 'id_station'),
			'idNode' => array(self::BELONGS_TO, 'Node', 'id_node'),
			'tblSuhus' => array(self::HAS_MANY, 'TblSuhu', 'id_station'),
			'tblTegangans' => array(self::HAS_MANY, 'TblTegangan', 'id_station'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_station' => 'ID Station',
			'id_node' => 'Node',
			'nama_station' => 'Nama Station',
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

		$criteria->compare('id_station',$this->id_station,true);
		$criteria->compare('id_node',$this->id_node,true);
		$criteria->compare('nama_station',$this->nama_station,true);
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
	 * @return Station the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
