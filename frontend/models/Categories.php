<?php
namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;



class Categories extends ActiveRecord{
    //private $id;
    private $cat_id;
    private $cat_name;
    private $cat_pic;
    private $user_id;
    public function rules()
    {
        return[
            [['cat_name', 'cat_pic','user_id'],'required'],
            [['cat_pic'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
}
?>