<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property int $sales_id
 * @property int $quantity
 * @property float $amount
 * @property int $user_id
 * @property string $date
 * @property int $inv_id
 *
 * @property Drugs $inv
 * @property Admin $user
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'amount', 'user_id'], 'required'],
            [['quantity', 'user_id', 'inv_id'], 'integer'],
            [['amount'], 'number'],
            [['date'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['inv_id'], 'exist', 'skipOnError' => true, 'targetClass' => Drugs::className(), 'targetAttribute' => ['inv_id' => 'inv_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sales_id' => 'Sales ID',
            'quantity' => 'Quantity',
            'amount' => 'Amount',
            'user_id' => 'User ID',
            'date' => 'Date',
            'inv_id' => 'Inv ID',
        ];
    }

    /**
     * Gets query for [[Inv]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInv()
    {
        return $this->hasOne(Drugs::className(), ['inv_id' => 'inv_id']);
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
}
