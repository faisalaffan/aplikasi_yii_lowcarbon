<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $nama_user
 * @property string $username
 * @property string $pwd_hash
 * @property string $jenis_kelamin
 * @property string $hp
 * @property string $alamat
 * @property string $no_alamat
 * @property string $rt
 * @property string $rw
 * @property string $kecamatan
 * @property string $kota
 * @property string $akun_fb
 * @property string $akun_ig
 * @property string $provinsi
 * @property string $foto
 * @property string $file_identitas
 * @property string $level
 * @property string $lng
 * @property string $lat
 */
class User extends CActiveRecord
{
	
	public $password;
 	public $password_repeat;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_user, username, jenis_kelamin, hp, alamat, kecamatan, kota, provinsi, level', 'required'),
			array('hp', 'numerical'),
			array('username','unique'),
			//array('email', 'email'),
			//array('password, password_repeat', 'required', 'on'=>'update'),
			array('password', 'compare', 'compareAttribute' => 'password_repeat'),		
			array('password', 'length', 'min'=>8, 'max'=>40),		
			array('nama_user', 'length', 'max'=>200),
			array('username', 'length', 'max'=>30),
			array('pwd_hash', 'length', 'max'=>100),
			array('jenis_kelamin, level', 'length', 'max'=>5),
			array('hp, no_alamat, rt, rw', 'length', 'max'=>20),
			array('alamat, kecamatan, kota, akun_fb, akun_ig, provinsi', 'length', 'max'=>500),
			array('foto, file_identitas', 'length', 'max'=>750),
			array('lng, lat', 'length', 'max'=>25),
			array('password, password_repeat', 'safe'),	
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama_user, username, pwd_hash, jenis_kelamin, hp, alamat, no_alamat, rt, rw, kecamatan, kota, akun_fb, akun_ig, provinsi, foto, file_identitas, level, lng, lat', 'safe', 'on'=>'search'),
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
			'nama_user' => 'Nama User',
			'username' => 'Username',
			'pwd_hash' => 'Password',
			'jenis_kelamin' => 'Jenis Kelamin',
			'hp' => 'HP',
			'alamat' => 'Alamat',
			'no_alamat' => 'No Alamat',
			'rt' => 'RT',
			'rw' => 'RW',
			'kecamatan' => 'Kecamatan',
			'kota' => 'Kota',
			'akun_fb' => 'Akun Fb',
			'akun_ig' => 'Akun Ig',
			'provinsi' => 'Provinsi',
			'foto' => 'Foto',
			'file_identitas' => 'File Identitas',
			'level' => 'Level',
			'lng' => 'Lng',
			'lat' => 'Lat',
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
		$criteria->compare('nama_user',$this->nama_user,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('pwd_hash',$this->pwd_hash,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('hp',$this->hp,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_alamat',$this->no_alamat,true);
		$criteria->compare('rt',$this->rt,true);
		$criteria->compare('rw',$this->rw,true);
		$criteria->compare('kecamatan',$this->kecamatan,true);
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('akun_fb',$this->akun_fb,true);
		$criteria->compare('akun_ig',$this->akun_ig,true);
		$criteria->compare('provinsi',$this->provinsi,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('file_identitas',$this->file_identitas,true);
		$criteria->compare('level',$this->level,true);
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
    {
        //add the password hash if it's a new record
        if ($this->getIsNewRecord())
        {
            //creates the password hash from the plaintext password
            $this->pwd_hash = Yii::app()->user->hashPassword($this->password);                         
        }    
        else if (!empty($this->password)&&!empty($this->repeat_password)&&($this->password===$this->repeat_password))
        //if it's not a new password, save the password only if it not empty and the two passwords match
        {
            $this->pwd_hash = $this->password;
        }
        return parent::beforeSave();
    }

    public function hash($value)
	{
		//return crypt($value);
		//new code----------------------------
		//$salt = openssl_random_pseudo_bytes(22);
		//$salt = '$2a$%13$' . strtr($salt, array('_' => '.', '~' => '/'));
		//return crypt($value, $salt);
		//end---------------------------------
	    $a = md5($value);  
	    return $a;   
	}
   
   	public function hashPassword($value)
   	{
      //return crypt($value);
      //new code---------------------
      //$salt = openssl_random_pseudo_bytes(22);
      //$salt = '$2a$%13$' . strtr($salt, array('_' => '.', '~' => '/'));
      //return crypt($value, $salt);
      //------------------------------
      $a = md5($value);  
      return $a;    
   	}

	protected function afterValidate()
 	{
 		parent::afterValidate();
 		if (!empty($this->password)){
 			$this->pwd_hash = $this->hash($this->password);
 		}
 		else{
 			$this->pwd_hash = $this->pwd_hash;
 		}
 	}
	
	public function check($value)
	{
		//$new_hash = crypt($value, $this->pwd_hash);
		$new_hash = md5($value);
		if ($new_hash == $this->pwd_hash) {
			return 1;
		}
		return 0;
	}

	public function passwordStrengthOk($attribute, $params)
	{
		// default to true
		$valid = true;
		// at least one number
		$valid = $valid && preg_match
			('/.*[\d].*/', $this->$attribute);
		// at least one non-word character
		//$valid = $valid && preg_match
		//	('/.*[\W].*/', $this->$attribute);
		// at least one capital letter
		//$valid = $valid && preg_match
		//	('/.*[A-Z].*/', $this->$attribute);
		if (!$valid)
			$this->addError($attribute, "Password tidak memenuhi kriteria.");
		
		return $valid;
	}

	public function getGender()
    {
		return array(
           '1' => 'Laki-laki',
           '0' => 'Perempuan',
        );
    }

	public function getLevel($input)
	{
		if($input==1){
			return 'Administrator';
		}
		else if ($input==2){
			return 'Pemerintah';
		}else{
			return 'Member';
		}

	}

	public function getJK($data){
		if ($data==1){
			return 'Laki-Laki';
		}
		else{
			return 'Perempuan';
		}
	}

	public function getLevel1()
    {
		return array(
           '3' => 'Member', 
		   '2' => 'Pemerintah',           
           '1' => 'Administrator',         
        );
    }  	

}
