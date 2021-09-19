<?php 
namespace frontend\models;

use yii\base\Model;
use common\models\MiamalaForm;

class MiamalaaForm extends Model
{
   public $details;
    public $context;
    public $amount;
    public $date;

  public function rules()
  {
        return [
            [['details', 'context', 'amount', 'date'], 'required'],
            [['amount'], 'number'],
            [['date'], 'safe'],
            [['details'], 'string', 'max' => 100],
            [['context'], 'string', 'max' => 25],
        ];
    }
public function printdata()
{
  print $this->fullname;
  print $this->yob;
  print $this->chancenumber;
}
public function manipdata()
{
    $usermodel=new MiamalaForm();
      $usermodel->date=$this->date;
      $usermodel->amount=$this->amount;
      $usermodel->details=$this->details;
      $usermodel->context=$this->context;
     $usermodel->save();

      $res=true;
    
  

  return $res;

}

}





?>