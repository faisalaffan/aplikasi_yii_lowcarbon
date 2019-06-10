<?php

/**
 * This is the model class for table "tbl_suhu".
 *
 * The followings are the available columns in table 'tbl_suhu':
 * @property string $id_suhu
 * @property string $id_station
 * @property double $nilai
 * @property string $waktu
 * @property string $ket
 *
 * The followings are the available model relations:
 * @property TblStation $idStation
 */
class Suhu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_suhu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_suhu, id_station, nilai, waktu, ket', 'required'),
			array('nilai', 'numerical'),
			array('id_suhu, id_station', 'length', 'max'=>100),
			array('ket', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_suhu, id_station, nilai, waktu, ket', 'safe', 'on'=>'search'),
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
			'idStation' => array(self::BELONGS_TO, 'TblStation', 'id_station'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_suhu' => 'Id Suhu',
			'id_station' => 'Id Station',
			'nilai' => 'Nilai',
			'waktu' => 'Waktu',
			'ket' => 'Ket',
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

		$criteria->compare('id_suhu',$this->id_suhu,true);
		$criteria->compare('id_station',$this->id_station,true);
		$criteria->compare('nilai',$this->nilai);
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('ket',$this->ket,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => array(
               'defaultOrder' => 'waktu desc',  // this is it.
            ),
               'pagination'=>array(
               'pageSize'=>10
            ), 

		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Suhu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getStatus1($input)
	{
		if ($input==0){
			return '<h5 align="left"><span class="label label-success">Normal</span></h5>';
		}							
		else{
			return '<h5 align="left"><span class="label label-warning">Abnormal</span></h5>';
		}

	}

}
