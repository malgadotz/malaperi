<?php
namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;



class Categories extends ActiveRecord{
    //private $id;
    private $cat_id;
    private $cat_name;
    private $cat_pic;
    public function rules()
    {
        return[
            [['cat_id','cat_name', 'cat_pic'],'required'],
            [['cat_pic'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
}
?>