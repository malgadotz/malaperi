<?php 
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Users;
use yii;
class LoginController extends controller
{

     
    public function actionIndex()
    {
        // $session =Yii::$app->session;
        // $session['name']=yii::$app->homeUrl;
        // $session->open();
        // if ($session->isActive)
        // {

        // }
        // else{
        //     echo 'session Not Started';
        // }
        return $this->render('/miamala/index');
        // return $this->render('/miamala/index');
    }

    public function actionLogin()
    {
        $this->$layout ='blank';

		$model = new Users();
		if ($model->load(Yii::$app->request->post()))
		{
            $layout ='main';
			// $session =Yii::$app->session;
			// $session['login']='name';
			// $session->open();	
		return $this->render('/miamala/index');
			// Yii::$app->getSession()->setFlash('message','Post published successfully');

	   }// $user= new UserForm();
		// if($user->email === $this->email && $user->password === $this->password)
		// {
		// 	return $this->render('profile');
		// }
		// else{
		// 	return $this->render('login');
		// }
    // $model->password = '';
       return $this->render('login', [
            'model' => $model,
        ]);
    }













}
?>