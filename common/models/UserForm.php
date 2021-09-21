<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $pic
 * @property string $number
 * @property string $date
 */
class UserForm extends \yii\db\ActiveRecord
{
    public $email;
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'name', 'pic', 'number'], 'required'],
            [['date'], 'safe'],
            [['email', 'password', 'name', 'pic'], 'string', 'max' => 50],
            [['number'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'name' => 'Name',
            'pic' => 'Pic',
            'number' => 'Number',
            'date' => 'Date',
        ];
    }



    public function getUser()
    {
        if ($this->_users === null) {
            $this->_users = Users::findByEmail($this->username);
        }

        return $this->_users;
    }
}
