<?php

namespace frontend\models;

use yii\db\ActiveRecord;



class Inventeries extends ActiveRecord{
    //private $id;
    private $inv_id;
    private $drug_name;
    private $cat_id;
    private $supplier;
    private $company;
    private $quantity;
    private $price;
    private $expire;
    private $pic;
    private $user_id;
    private $description;
    private $date;

    public function rules(){
        return[
            [['inv_id','cat_id', 'drug_name','supplier','company','quantity','price','expire','pic','description','date'],'required']
        ];
    }
}
