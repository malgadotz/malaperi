<?php

namespace frontend\models;

use yii\db\ActiveRecord;



class Sales extends ActiveRecord{
    //private $id;
    private $sales_id;
    private $quantity;
    private $amount;
    private $user_id;
    private $date;
    private $inv_id;

    public function rules(){
        return[
            [['sales_id','quantity', 'amount','user_id','date','inv_id'],'required']
        ];
    }
}
