<?php
namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;



class Drugs extends ActiveRecord{
    //private $id;
    private $inv_id;
    private $drug_name;
    private $price;
    private $unit;
 
    private $cat_id;
    private $expire;
    private $description;
    

    public function rules(){
        return[
            [['cat_id','drug_name', 'unit','price','expire','description'],'required']
        ];
    }
}
