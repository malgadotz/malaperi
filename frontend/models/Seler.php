<?php
namespace frontend\models;
use Yii;
use common\models\User;
use common\models\Seller;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Seler extends Model
{
    public $username;
    public $email;
    public $mobile;
    public $newpassword;
    public $newppassword;
    public $pic;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
      return [
          ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 8, 'max' => 255],

            // name, email, subject and body are required
            [[ 'newpassword','newppassword','mobile'], 'required'],
            ['pic', 'string'],
            ['mobile','integer', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['mobile', 'unique', 'targetClass' => '\common\models\Seller', 'message' => 'This mobile number is already taken.'],
            // email has to be a valid email address
              ['email', 'trim'],

            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            // verifyCode needs to be entered correctly
            
[['newpassword','newppassword'], 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
[['newpassword','newppassword'], 'filter', 'filter' => 'trim'],
[['newppassword'], 'compare', 'compareAttribute' => 'newpassword', 'message' => 'Passwords do not match'],
];
}

 public function attributeLabels()
    {
        return [
            'email' => 'Seller Email',
            'mobile' => 'Mobile Number',
            'username' => 'Username',
            'pic' => 'Seller\'s Profile Picture',
            'newpassword' => 'Enter Password',
            'newppassword' => 'Confirnm Password',
        ];
    }


public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
          $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->newpassword);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
             return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }


}?>