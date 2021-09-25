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
            [['cat_name', 'cat_pic','user_id'], 'required'],
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
