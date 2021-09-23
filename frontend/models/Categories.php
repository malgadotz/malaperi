<?php

namespace frontend\models;

use yii\db\ActiveRecord;



class Categories extends ActiveRecord{
    //private $id;
    private $cat_id;
    private $cat_name;
    private $cat_pic;

    private $cat_date;
    private $user_id;
    public $image;

    public function rules(){
        return[
            [['cat_id','cat_name', 'cat_pic','user_id'],'required'],
            [['image'],'file'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'cat_id' => 'Miamala ID',
            'cat_name' => 'Details',
            'image' => 'cat_pic',
            
            'user_id' => 'user ID',
        ];
    }
}
