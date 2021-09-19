<?php

namespace frontend\models;

use yii\db\ActiveRecord;



class Categories extends ActiveRecord{
    //private $id;
    private $cat_id;
    private $cat_name;
    private $cat_pic;
    private $cat_details;
    private $cat_date;
    private $user_id;
    

    public function rules(){
        return[
            [['cat_id','cat_name', 'cat_pic','cat_details','user_id'],'required']
        ];
    }
}
