<?php

namespace frontend\models;

use yii\db\ActiveRecord;



class Sales extends ActiveRecord{
    //private $id;
    private $sales_id;
    private $quantity;
    
    private $amount;
    private $date;
    private $drug_name;
    private $seller_id;
    
    private $drug_id;

    public function rules(){
        return[
            [['quantity', 'seller_id','drug_id',],'required'],
            [['quantity','amount'],'integer' ,'message'=>'Only Integers Are Allowed'],
            [['quantity'],'integer','min'=>1 ,'message'=>'Enter Valid Quantity Please!'],
           
        ];
    }
    public function attributeLabels()
    {
        return [
            'quantity' => 'Quantity To Sell' ,
        ];
    }
    
}