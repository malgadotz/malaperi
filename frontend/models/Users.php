<?php 
namespace frontend\models;

use yii\base\Model;
use common\models\UserForm;

class Users extends Model
{
   public $email;
    public $password;
    public $name;
    public $pic;
    public $number;

  public function rules()
  {
        return [
            [['email', 'password', 'name', 'pic', 'number'], 'required'],
            [['date'], 'safe'],
            [['email', 'password', 'name', 'pic'], 'string', 'max' => 50],
            [['number'], 'string', 'max' => 15],
        ];
    }
public function printdata()
{
//   print $this->fullname;
//   print $this->yob;
//   print $this->chancenumber;
}
public function adduser()
{
    // $usermodel=new UserForm();
    //   $usermodel->details=$this->details;
    //   $usermodel->context=$this->context;
     $usermodel->save();

      $res=true;
    
  

  return $res;

}

}





?>