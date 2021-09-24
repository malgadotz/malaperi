<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seller".
 *
 * @property int $id
 * @property string $pic
 * @property int $mobile
 * @property int $log_id
 *
 * @property User $log
 */
class Seller extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seller';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['log_id'], 'required'],
            [['mobile', 'log_id'], 'integer'],
            [['pic'], 'string', 'max' => 222],
            [['log_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['log_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pic' => 'Pic',
            'mobile' => 'Mobile',
            'log_id' => 'Log ID',
        ];
    }

    /**
     * Gets query for [[Log]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLog()
    {
        return $this->hasOne(User::className(), ['id' => 'log_id']);
    }
}
