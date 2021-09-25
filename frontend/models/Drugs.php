<?php
namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;



class Drugs extends ActiveRecord{
    //private $id;
    private $inv_id;
    private $drug_name;
    private $price;
    private $quantity;
 
    private $cat_id;
    private $expire;
    private $description;
    

    public function rules(){
        return[
            [['cat_id','drug_name', 'quantity','price','expire','description'],'required']
        ];
    }


    public function attributeLabels()
    {
        return [
            'quantity' => 'Drug quantity' ,
            'price' => 'Price Per Unity' ,
            'expire' => 'Expire Date' ,
            'description' => 'Drug Description' ,
        ];
    }
}
