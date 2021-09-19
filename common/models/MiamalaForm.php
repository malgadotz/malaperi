<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "miamala".
 *
 * @property int $miamala_id
 * @property string $details
 * @property string $context
 * @property float $amount
 * @property string $date
 */
class MiamalaForm extends \yii\db\ActiveRecord
{
   
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'miamala';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['details', 'context', 'amount', 'date'], 'required'],
            [['amount'], 'number'],
            [['date'], 'safe'],
            [['details'], 'string', 'max' => 100],
            [['context'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'miamala_id' => 'Miamala ID',
            'details' => 'Details',
            'context' => 'Context',
            'amount' => 'Amount',
            'date' => 'Date',
        ];
    }
}
