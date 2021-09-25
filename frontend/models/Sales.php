<?php

namespace frontend\models;

use yii\db\ActiveRecord;



class Sales extends ActiveRecord{
    //private $id;
    private $sales_id;
    private $quantity;
    private $amount;
    private $drug_name;
    private $seller_id;
    
    private $drug_id;

    public function rules(){
        return[
            [['quantity', 'amount','seller_id','drug_id'],'required']
        ];
    }
    public function attributeLabels()
    {
        return [
            'quantity' => 'Quantity To Sell' ,
        ];
    }
}
