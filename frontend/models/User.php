<?php

namespace frontend\models;

use yii\db\ActiveRecord;



class User extends ActiveRecord{
    //private $id;
    private $NGO_id;
    private $NGO_name;
    private $NGO_country;
    private $NGO_city;
    private $NGO_email;
    private $NGO_password;
    private $NGO_phoneno;
    private $NGO_status;
    private $NGO_img;

    public function rules()
    {
        return[
            [['NGO_id','NGO_name', 'NGO_img'],'required']
        ];
    }
}
