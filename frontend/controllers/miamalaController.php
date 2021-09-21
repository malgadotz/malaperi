<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\MiamalaaForm;
use frontend\models\Users;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use Yii;
class MiamalaController extends Controller
{
	// public function behaviors()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessControl::className(),
    //             'rules' => [
    //                 [
    //                     'actions' => ['login', 'profile'],
    //                     'allow' => true,
    //                 ],
    //                 [
    //                     'actions' => ['logout', ''],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 // 'logout' => ['post'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

// public $layout='miamalaLayout';
public function actionHome()
{
	
// 	$session =Yii::$app->session;
// 	$session['login']='name';
// 	if(isset($session['login']))
// 	{
// 	 $layout = 'blank';
		
// 	return $this->render('index');

//         // $ngo = Ngo::find()->all();
//         // $requests = Requests::find()->all();
//         // $imgs = RequestImages::find()->all();
//         // $donn = Donations::find()->all();
// 	// return $this->render('login', ['model'=>$model]);
// }
// else{
// 	$model = new Users();
// 	return $this->render('/login/index', [
// 		'model' => $model,
// 	]);
// }
return $this->render('index');
}
public function actionPayments()
{
	 // $model=new PaymentForm();
	// if ($model->load(Yii::$app->request->post()) && $model->save()) {
 //            return $this->goBack();
 //        }

	return $this->render('payments'
            
        );
}

public function actionLoans()
{
	$model=new LoansForm();

if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->Refresh();
        }

	return $this->render('loans', [
            'model' => $model,
        ]);
}


public function actionGetData()
{
	$model=new MiamalaaForm();
	$model->manipdata();
	$model->save();

if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->Refresh();
       }


}

public function actionProfile()
{
	$model=new MiamalaaForm();
	return $this->render('profile',['model' => $model,
        ]);


}

public function actionAccount()
{
	$model=new MiamalaaForm();
	return $this->render('account', ['model'=>$model]);
}

public function actionInventeries()
{
	$model=new MiamalaaForm();
	return $this->render('inventeries', ['model'=>$model]);
}

public function actionAddUser()
{
	$model=new MiamalaaForm();
	return $this->render('adduser', ['model'=>$model]);
}
public function actionReports()
{
	$model=new MiamalaaForm();
	return $this->render('reports', ['model'=>$model]);
}

public function actionManageCat()
{
	$model=new MiamalaaForm();
	return $this->render('managecat', ['model'=>$model]);
}
public function actionLogin()
    {
		
        // if (!Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
			
			//admin
			// $model->getUser();

			//saler
			
			$this->layout = 'main';
			return $this->render('index');
        }

        $model->password = '';
		

        return $this->render('login', [
            'model' => $model,
        ]);
    }




    public function actionLogout()
    {
        // Yii::$app->user->logout();
		// $this->layout = 'blank';
        // return $this->goHome();
		// $model = new LoginForm();
		// return $this->render('login', [
        //     'model' => $model,
        // ]);
    }
}
?>