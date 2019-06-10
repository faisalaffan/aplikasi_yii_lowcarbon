<?php

/**
 * This is the model class for table "tbl_skala".
 *
 * The followings are the available columns in table 'tbl_skala':
 * @property string $kode
 * @property string $deskripsi_kode
 * @property double $batas_paling_bawah
 * @property double $batas_bawah
 * @property double $batas_tengah
 * @property double $batas_atas
 * @property double $batas_paling_atas
 */
class Skala extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_skala';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode, deskripsi_kode, batas_paling_bawah, batas_bawah, batas_tengah, batas_atas, batas_paling_atas', 'required'),
			array('batas_paling_bawah, batas_bawah, batas_tengah, batas_atas, batas_paling_atas', 'numerical'),
			array('kode, deskripsi_kode', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('kode, deskripsi_kode, batas_paling_bawah, batas_bawah, batas_tengah, batas_atas, batas_paling_atas', 'safe', 'on'=>'search'),
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
			'kode' => 'Kode',
			'deskripsi_kode' => 'Deskripsi Kode',
			'batas_paling_bawah' => 'Batas Paling Bawah',
			'batas_bawah' => 'Batas Bawah',
			'batas_tengah' => 'Batas Tengah',
			'batas_atas' => 'Batas Atas',
			'batas_paling_atas' => 'Batas Paling Atas',
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

		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('deskripsi_kode',$this->deskripsi_kode,true);
		$criteria->compare('batas_paling_bawah',$this->batas_paling_bawah);
		$criteria->compare('batas_bawah',$this->batas_bawah);
		$criteria->compare('batas_tengah',$this->batas_tengah);
		$criteria->compare('batas_atas',$this->batas_atas);
		$criteria->compare('batas_paling_atas',$this->batas_paling_atas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Skala the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
