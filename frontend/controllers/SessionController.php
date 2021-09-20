<?php 
namespace frontend\controllers;
use yii\web\Controller;
use yii;
class SessionController extends controller
{

    public function actionIndex()
    {
        $session =Yii::$app->session;
        $session['name']=yii::$app->homeUrl;
        $session->open();
        if ($session->isActive)
        {

        }
        else{
            echo 'session Not Started';
        }
        
   
echo "nammmmmme";
        // return $this->render('/miamala/index');
    }
}








?>