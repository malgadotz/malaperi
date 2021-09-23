<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $cat_id
 * @property string $cat_name
 * @property string $cat_pic
 * @property int $user_id
 *
 * @property Drugs[] $drugs
 * @property Admin $user
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

     public $cat_pict;
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_name', 'cat_pic'], 'required'],
            [['user_id'], 'integer'],
            [['cat_pic'], 'string', 'max' => 111],
            [['cat_name'], 'string', 'max' => 222],
            [['cat_pict'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,jpge,web,gif'],
            
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_name' => 'Category Name',
            'cat_pic' => 'Category Picture',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Drugs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDrugs()
    {
        return $this->hasMany(Drugs::className(), ['cat_id' => 'cat_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Admin::className(), ['id' => 'user_id']);
    }

     
    // public function upload()
    // {

    //     if ($this->validate()) {
    //         $this->cat_pic->saveAs('img/' . $this->cat_pic->baseName . '.' . $this->cat_pic->extension);
    //         $name=$this->cat_pic->baseName. $this->cat_pic->extension;
    //         $this->cat_pic=$name;
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
