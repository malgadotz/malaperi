<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "loans".
 *
 * @property int $id
 * @property string $name
 * @property string $mode
 * @property string $context
 * @property float $amount
 * @property string $date
 * @property string $status
 * @property int $userid
 */
class LoansForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'mode', 'context', 'amount', 'date', 'status', 'userid'], 'required'],
            [['amount'], 'number'],
            [['date'], 'safe'],
            [['userid'], 'integer'],
            [['name'], 'string', 'max' => 60],
            [['mode', 'status'], 'string', 'max' => 20],
            [['context'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'mode' => 'Mode',
            'context' => 'Context',
            'amount' => 'Amount',
            'date' => 'Date',
            'status' => 'Status',
            'userid' => 'Userid',
        ];
    }
}
