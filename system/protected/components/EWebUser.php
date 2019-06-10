<?php
class EWebUser extends CWebUser
{
   private $_userTable = array
   (
      1=>'Administrator',
      2=>'Goverment',
      3=>'Member',
   );
 
   protected $_model;

   function isAdmin()
   {
      //Access this via Yii::app()->user->isAdmin()
      return (Yii::app()->user->isGuest) ? FALSE : $this->level == 1;
   }

 
   public function isGov()
   {
      //Access this via Yii::app()->user->isSuperadmin()
      return (Yii::app()->user->isGuest) ? FALSE : $this->level == 2;
   }

   public function isMember()
   {
      //Access this via Yii::app()->user->isSuperadmin()
      return (Yii::app()->user->isGuest) ? FALSE : $this->level == 3;
   }

   public function canAccess($minimumLevel)
   {
      //Access this via Yii::app()->user->canAccess(9)
      return (Yii::app()->user->isGuest) ? FALSE : $this->level >= $minimumLevel;
   }
 
   public function getRoleName()
   {
      //Access this via Yii::app()->user->roleName()
      return (Yii::app()->user->isGuest) ? '' : $this->getUserLabel($this->level);
   }
 
   public function getUserLabel($level)
   {
      //Use this for example as a column in CGridView.columns:
      
      //array('value'=>'Yii::app()->user->getUserLabel($data->level)'),
      return $this->_userTable[$level];
   }
 
   public function getUserLevelsList()
   {
      //Access this via Yii::app()->user->getUserLevelsList()
      return $this->_userTable;
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
   public function getIdUser() {
      $user = $this->loadModel();
      return $user->id;
   }


   public function getFoto($id)
   {
 
         $model=User::model()->findByPk($id);
         if (($model->foto!=null)||($model->foto!="")){
            return $model->foto;
         }else{
            return "default.png";
         }
        
   } 

   public function getIdentitas($id)
   {
 
         $model=User::model()->findByPk($id);
         if (($model->file_identitas!=null)||($model->file_identitas!="")){
            return $model->file_identitas;
         }else{
            return "default.png";
         }
        
   } 

   public function getLogo()
   {
      $model=Event::model()->findByPk(1);
      return $model->logo;
       
   }  
      
}
?>