<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ResetPassword extends Model
{
    public $name;
    public $email;
    public $oldpassword;
    public $newpassword;
    public $newppassword;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
      return [
            // name, email, subject and body are required
            [['name', 'oldpassword', 'newpassword','newppassword'], 'required'],
            // email has to be a valid email address
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],  
[['oldpassword'] , 'validateOldPassword'],
[['newpassword','newppassword'], 'string', 'min' =>8],
[['newpassword','newppassword'], 'filter', 'filter' => 'trim'],
[['newppassword'], 'compare', 'compareAttribute' => 'newpassword', 'message' => 'Passwords do not match'],
];
}
public function validateOldPassword()
{
    $hash=$this->oldpassword;
$dbpassword =\Yii::$app->user->identity->password_hash;
$newpassword= Yii::$app->security->generatePasswordHash($hash);
if($dbpassword == $newpassword)
{
    return true;
}
else
{
$this->addError("oldpassword", "Old Password Incorrect");
}
}
    /**
    * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            
            'name'=> 'Username',
            'oldpassword' => 'Old Password',
            'newppassword' => 'Repeat Password',
            'newpassword' => 'New Password',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
