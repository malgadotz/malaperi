<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "drugs".
 *
 * @property int $inv_id
 * @property int $cat_id
 * @property string $drug_name
 * @property string $unit
 * @property string $price
 * @property string $expire
 * @property string $pic
 * @property string $description
 * @property string $date
 * @property int $user_id
 *
 * @property Categories $cat
 * @property Sales[] $sales
 * @property Admin $user
 */
class Drugs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'drugs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_id', 'drug_name', 'unit', 'price', 'pic', 'description', 'user_id'], 'required'],
            [['cat_id', 'user_id'], 'integer'],
            [['drug_name', 'unit', 'price', 'pic', 'description'], 'string'],
            [['expire', 'date'], 'safe'],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['cat_id' => 'cat_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'inv_id' => 'Inv ID',
            'cat_id' => 'Cat ID',
            'drug_name' => 'Drug Name',
            'unit' => 'Unit',
            'price' => 'Price',
            'expire' => 'Expire',
            'pic' => 'Pic',
            'description' => 'Description',
            'date' => 'Date',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Categories::className(), ['cat_id' => 'cat_id']);
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::className(), ['inv_id' => 'inv_id']);
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
    public function getData()
    {
      
      

        $this->user_id=yii::$app->user->getId();
        $this->save();
    }
}
