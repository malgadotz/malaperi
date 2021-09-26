<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\MiamalaaForm;
use frontend\models\Users;
use frontend\models\Drugs;
use frontend\models\Sales;
use frontend\models\SignupForm;
use common\models\LoginForm;
use common\models\User;
use common\models\Seller;
// use common\models\Sales;
use common\models\Admin;
// use frontend\models\Categories;
use common\models\Categories;
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
	
        $models = Categories::find()->all();
        // $usernow=User::findone(['id'=> yii::$app->user->getId()]);
        // $admin = Admin::findone(['log_id'=> yii::$app->user->getId()]);
        $drug = Drugs::find()->all();
        return $this->render('index', ['models' => $models, 'drug' => $drug, ]);
}
public function actionPayments()
{
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
    $id=\Yii::$app->user->identity->id;
    $seller=Seller::findone(['log_id'=>$id]);
    $admin=Admin::findone(['log_id'=>$id]);
    if($seller)
    {
        $model=$seller;
    }
    else
    {
        $model=$admin;
    }
    if($model->load(Yii::$app->request->post()))
    {
        $folder = Yii::getAlias('@frontend') .'/web/photo/';
        
        $model->pic = UploadedFile::getInstance($model, 'pic');
            $picname= $model->pic->baseName . '.' . $model->pic->extension;
            $path=$folder.$picname;
        if ($model->pic && $model->validate()) {
            $model->pic->saveAs($path);
        }
        $model->pic= $picname;
        $model->save();
          
            Yii::$app->session->setFlash('success', 'Profile  Updated Successfully');
            return $this->goBack();
        
    }

	return $this->render('profile',['model' => $model,
        ]);
}

public function actionAccount()
{
    $id=\Yii::$app->user->identity->id;
	$model=User::findone(['id'=> $id]);
    if ($model->load(Yii::$app->request->post())) {
        $model->username=$model->username;
    //    $model->setPassword($model->email);
        $model->save();
        Yii::$app->session->setFlash('success', 'Profile updated succesfully Successfully');
        return $this->goBack();
    }

	return $this->render('account', ['model'=>$model]);
}
public function actionDrugs()
{
	$model=Drugs::find()->all();
    $admin=Admin::find()->all();
    $usernow=User::findone(['id'=> yii::$app->user->getId()]);
	return $this->render('drugs', ['model'=>$model, 'admin'=>$admin, 'usernow'=>$usernow]);
}
public function actionDrugsCategory($drug_id)
{
	$model=Drugs::findall(['cat_id'=>$drug_id]);
    $cat=Categories::findone(['cat_id'=>$drug_id]);
	return $this->render('categories', ['model'=>$model, 'cat'=>$cat]);
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


public function actionUpdateDrug($drug_id)
{
  
    $drug = Drugs::findone(['inv_id' =>$drug_id]);
    
    if ($drug->load(Yii::$app->request->post())) 
    {
        $drug->save();        
        Yii::$app->session->setFlash('success', 'Drug has been Updated Successfully');                 
        return $this->goBack();
    }

    return $this->render('updatedrug', [ 'drug'=>$drug,
    ]);
}


public function actionSellDrug($drug_id)
{
    $model = new Sales();
    $drug = Drugs::findone(['inv_id'=>$drug_id]);

    if ($model->load(Yii::$app->request->post())) 
    {

        $seller=Seller::findone(['log_id' =>\yii::$app->user->identity->id])->id;
        // $model->getData();
        $model->seller_id=$seller;
        $model->drug_id=$drug->inv_id;
        $drug->quantity=$drug->quantity-$model->quantity;
        if($drug->quantity < 0)
        {
            Yii::$app->session->setFlash('warning', 'Quantity Exceeds Available'); 
            return $this->refresh();                        
        }
        $drug->save();
        $model->save();
        // $model->cat_idgetCat()
        Yii::$app->session->setFlash('success', 'Drug has been Sold Successfully');                 
        return $this->goBack();
    }

    return $this->render('selldrug', [
        'model' => $model, 'drug' =>$drug
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
	$report=Sales::find()->all();
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
    $admin=Admin::findone(['log_id'=>\yii::$app->user->identity->id])->log_id;
    if($model->load(Yii::$app->request->post()))
    {
        $path = Yii::getAlias('@frontend') .'/web/photo/';
        $model->user_id=$admin;
        $model->cat_pic = UploadedFile::getInstance($model, 'cat_pic');

        if ($model->cat_pic && $model->validate()) {
            $model->cat_pic->saveAs($path . $model->cat_pic->baseName . '.' . $model->cat_pic->extension);
        }
        $model->cat_pic= $model->cat_pic->baseName . '.' . $model->cat_pic->extension;
        $model->save();
          
            Yii::$app->session->setFlash('success', 'Drug Category been Added Successfully');
            return $this->goHome();
        
    }
        return $this->render('addcategory', ['model'=>$model]);
    
}

public function actionUpdateCat($cat_id)
{
    $cat=Categories::findone(['cat_id'=>$cat_id]);
    if($cat->load(Yii::$app->request->post()))
    {
        $path = Yii::getAlias('@frontend') .'/web/photo/';
        
        $cat->cat_pic = UploadedFile::getInstance($cat, 'cat_pic');

        if ($cat->cat_pic && $cat->validate()) {
            $cat->cat_pic->saveAs($path . $cat->cat_pic->baseName . '.' . $cat->cat_pic->extension);
        }
        $cat->cat_pic= $cat->cat_pic->baseName . '.' . $cat->cat_pic->extension;
        $cat->save();
          
            Yii::$app->session->setFlash('success', 'Drug Category been Updated Successfully');
            return $this->goBack();
        
    }
        return $this->render('updatecategory', ['cat'=>$cat]);
    
}






public function actionLogin()
    {
		
        // if (!Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }

        $this->layout = 'blank';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login())
         {
			$this->layout = 'main';
        //     $session =Yii::$app->session;
        // $session['login']=$model->username;
        $id=\Yii::$app->user->identity->id;
        
       
       if(Admin::findone(['log_id'=>$id]))
        return $this->goHome();
     
        if( Seller::findone(['log_id'=>$id]))
        {
            return $this->goHome();
        
         }
        }
        $model->password = '';
	
        return $this->render('login', [
            'model' => $model,
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
    //     $uploadPath = Yii::getAlias('@frontend') .'/photo/';
    
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