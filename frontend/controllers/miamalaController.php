<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\MiamalaaForm;
use frontend\models\Users;
use frontend\models\Drugs;
use frontend\models\SignupForm;
use common\models\LoginForm;
use common\models\User;
use common\models\Seller;
use common\models\Sales;
use common\models\Admin;
use frontend\models\Categories;
// use common\models\Categories;
use common\models\Drugss;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


use yii\web\Response;
use yii\web\UploadedFile;
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
    //                     'actions' => ['index','login','add-user','inventeries','profile','reports','account'],
    //                     'allow' => true,
    //                 ],

    //                 //rule2
    //                 [
    //                     'actions' => ['logout', 'login'],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                 ],
    //                 //rule3
    //             ],
    //         ],
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'logout' => ['post'],
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

        $models = Categories::find()->all();
        $usernow=User::findone(['id'=> yii::$app->user->getId()]);
        $admin = Admin::findone(['log_id'=> yii::$app->user->getId()]);;
        $drug = Drugs::find()->all();
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
return $this->render('index', ['models' => $models, 'drug' => $drug, 'admin'=>$admin,'usernow'=>$usernow]);
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
	$model=new User();
	return $this->render('account', ['model'=>$model]);
}

public function actionDrugs()
{
	$model=Drugs::find()->all();
    $admin=Admin::find()->all();
    $usernow=User::findone(['id'=> yii::$app->user->getId()]);
	return $this->render('drugs', ['model'=>$model, 'admin'=>$admin, 'usernow'=>$usernow]);
}

public function actionAddUser()
{
    $model = new SignupForm();
    
    $models =new Seller();
    
    if ($model->load(Yii::$app->request->post()) && $model->signup()) {
  
        $models->log_id = User::findone(['email'=>$model->email])->id;
        $models->save();
        Yii::$app->session->setFlash('success', 'User has been Added Successfully');

            // $seller = new Seller();
            // $userss = new User();
            // $seller->log_id=$userss->getId($model->username);            
        return $this->goHome();
    }

    return $this->render('adduser', [
        'model' => $model,
    ]);
}

public function actionAddDrug()
{
    $model = new Drugs();
    $category = Categories::find()->all();
    
    if ($model->load(Yii::$app->request->post())) 
    {
        // $model->getData();
        $model->user_id=yii::$app->user->getId();
        $model->save();
        // $model->cat_idgetCat()
        Yii::$app->session->setFlash('success', 'Drug has been Added Successfully');                 
        return $this->goHome();
    }

    return $this->render('adddrug', [
        'model' => $model, 'category'=>$category,
    ]);
}



public function actionDeletedrug($inv_id)
{
if($model = Drugs::findone($inv_id)->delete())
{
    Yii::$app->session->setFlash('success', 'Drug Deleted Successfully');
    return $this->goHome();
}


}
public function actionDeleteCat($cat_id)
{
if($model = Categories::findone($cat_id)->delete())
{
    Yii::$app->session->setFlash('success', 'Drug Category Deleted Successfully');
    return $this->goHome();
}
}

public function actionReports()
{
	$report=new Sales();
	return $this->render('reports', ['report'=>$report]);
}

public function actionManageCat()
{
	$model = Categories::find()->all();
    $drug = Drugs::find()->all();
	return $this->render('managecat', ['model'=>$model, 'drug'=>$drug]);
}
public function actionAddCat()
{
	$model=new Categories();
    // return $this->render('addcategory', ['model'=>$model]);
    if($model->load(Yii::$app->request->post()))
    {
        $model->user_id=yii::$app->user->getId();
        $model->cat_pic='gado.jpg';
        $model->cat_name='Name';
        $model->save();
        // User::getId();
        // =yii::$app->user->getId();
        // $model->cat_pict = UploadedFile::getInstance($model, 'cat_pict');
        // $modelName=$model->cat_name;
        //     $model->cat_pict->saveAs('uploads/' . $model->cat_pict->baseName . '.' . $model->cat_pict->extension);
        //  $model->cat_pic='uploads/' . $model->cat_pict->baseName . '.' . $model->cat_pict->extension;
          
            Yii::$app->session->setFlash('success', 'Drug Category been Added Successfully');
            return $this->goHome();
        
    }
    else
    {
        return $this->render('addcategory', ['model'=>$model]);
    }	
}
public function actionLogin()
    {
		
        // if (!Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }

        $this->layout = 'blank';
        $models = Categories::find()->all();
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login())
         {
			$this->layout = 'main';
			return $this->render('index');
        }

        $model->password = '';
		

        return $this->render('login', [
            'model' => $model,'models' => $models,
        ]);
    }




    public function actionLogout()
    {
        Yii::$app->user->logout();
		// $this->layout = 'blank';
        return $this->goHome();
		// $model = new LoginForm();
		// return $this->render('login', [
        //     'model' => $model,
        // ]);
    }


    // public function actionAddCat(){

    //     $model = new Categories();
    //     $uploadPath = Yii::getAlias('@root') .'/photo/';
    
    //     if ($model->load(Yii::$app->request->post()))
    //      {
    //         $file = \yii\web\UploadedFile::getInstanceByName('cat_pic');
    //       $original_name = $file->baseName;  
    //       $newFileName = \Yii::$app->security
    //                         ->generateRandomString().'.'.$file->extension;
    //        // you can write save code here before uploading.
    //         if ($file->saveAs($uploadPath . '/' . $newFileName)) {
    //             $model->cat_pic = $newFileName;
    //             // $model->original_name = $original_name;
    //             $model->user_id=yii::$app->user->getId();
    //             if($model->save(false))
    //             {
    //                 echo \yii\helpers\Json::encode($file);
    //                 Yii::$app->session->setFlash('success', 'Drug Category been Added Successfully');
    //                 return $this->goHome();
    //             }
    //             else{
    //                 echo \yii\helpers\Json::encode($model->getErrors());
    //                 Yii::$app->session->setFlash('failure', 'Failure');
    //                 return $this->goBack();
    //             }
    
    //         }
    //     }
    //     else {
    //         return $this->render('addcategory', ['model'=>$model]);
    //     }
    
    //     return false;
    // }
}
?>