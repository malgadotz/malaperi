<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $id
 * @property string $details
 * @property string $mode
 * @property string $type
 * @property string $context
 * @property float $amount
 * @property string $date
 * @property int $userid
 */
class PaymentForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['details', 'mode', 'type', 'context', 'amount', 'date', 'userid'], 'required'],
            [['amount'], 'number'],
            [['date'], 'safe'],
            [['userid'], 'integer'],
            [['details'], 'string', 'max' => 120],
            [['mode'], 'string', 'max' => 20],
            [['type'], 'string', 'max' => 50],
            [['context'], 'string', 'max' => 70],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'details' => 'Details',
            'mode' => 'Mode',
            'type' => 'Type',
            'context' => 'Context',
            'amount' => 'Amount',
            'date' => 'Date',
            'userid' => 'Userid',
        ];
    }
}
