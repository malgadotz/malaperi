<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\MiamalaaForm;
use frontend\models\Users;
use frontend\models\Drugs;
use frontend\models\Sales;
use frontend\models\SignupForm;use frontend\models\ResetPassword;
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
use kartik\mpdf\Pdf;
use \Mpdf\Mpdf;
use Yii;
class MiamalaController extends Controller
{
<<<<<<< HEAD
	public function behaviors()
=======
    public function behaviors()
>>>>>>> 8bd6ef6268d29e5b762016e5ff8050192de06852
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
<<<<<<< HEAD
                        'actions' => ['login'],
                        'allow' => true,
                        
                    ],

                    //rule2
                    [
                        'actions' => ['logout','index','add-drug','home','add-user','inventeries','profile','reports','account'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    //rule3
=======
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => [

                            'add-drug','update-drug','delete-drug','delete-cat','manage-cat','add-cat','update-cat','add-seller','login','logout','inventory'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                     [
                        'actions' => ['sell-drug','invoice','print'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout','index','drugs','sales-report','reports','profile','account','drugs-category'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
>>>>>>> 8bd6ef6268d29e5b762016e5ff8050192de06852
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
<<<<<<< HEAD
                    'logout' => ['post'],
=======
                    // 'logout' => ['post'],
>>>>>>> 8bd6ef6268d29e5b762016e5ff8050192de06852
                ],
            ],
        ];
    }

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

public function actionIndex()
{
        $models = Categories::find()->all();   
        $drug = Drugs::find()->all();
        return $this->render('index', ['models' => $models, 'drug' => $drug, ]);
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
        $path = Yii::getAlias('@frontend') .'/web/photo/';
        
        $model->pic = UploadedFile::getInstance($model, 'pic');

        if ($model->pic && $model->validate()) {
            $model->pic->saveAs($path . $model->pic->baseName . '.' . $model->pic->extension);
        }
        $model->pic= $model->pic->baseName . '.' . $model->pic->extension;
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
	$model=new ResetPassword();
    
    $new=User::findone(['id'=> $id]);
    $model->name=$new->username;
    if ($model->load(Yii::$app->request->post()))

     {  
     if($new->validatePassword($model->oldpassword))
     {  
        $new->username=$model->name;
        $new->setPassword($model->newppassword);
        $new->save();
        Yii::$app->session->setFlash('success', 'Login updated succesfully Successfully');
        return $this->goBack();
    }
    else
    {
        $model->addError("oldpassword", "Old Password Incorrect");
    }
    }
	return $this->render('account', ['model'=>$model, 'new'=>$new]);
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
public function actionAddDrug()
{
    $model = new Drugs();
    $category = Categories::find()->all();
     if ($model->load(Yii::$app->request->post())) 
    {
        
        $model->admin_id=Admin::findone(['log_id' => yii::$app->user->getId()])->id;
        $model->save();
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
           $model->addError("quantity", "Quantity Exceeds Availabe Stock"); 
        }
        else if($model->amount != $drug->price * $model->quantity)
        {
           $model->amount = $drug->price * $model->quantity;

        }
        else if ($model->amount == $drug->price * $model->quantity)
        {
        $drug->save();
        $model->save();
        // $model->cat_idgetCat()
        Yii::$app->session->setFlash('success', 'Drug has been Sold Successfully');                 
        return $this->goBack();
        }
    }

    return $this->render('selldrug', [
        'model' => $model, 'drug' =>$drug
    ]);
}


public function actionDeleteDrug($inv_id)
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

public function actionSalesReport()
{
    $sales=Sales::find()->all();
    $content= $this->renderPartial('salesreport', ['sales'=>$sales]);
   $pdf = new Pdf([
        'mode' => Pdf::MODE_CORE, 
        'format' => Pdf::FORMAT_A4, 
        'orientation' => Pdf::ORIENT_LANDSCAPE, 
        'destination' => Pdf::DEST_BROWSER, 
        'content' => $content,  
        'cssFile' => '@frontend/web/css/malipo.css',
        'cssInline' => '.kv-heading-1{font-size:18px}', 
        'options' => ['title' => 'Medical Store Sales Report'],
        'methods' => [ 
            // 'SetHeader'=>['SALES REPORT'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    return $pdf->render();
}
public function actionInvoice()
{
        $model=Drugs::find()->all();
    $content= $this->renderPartial('drugreport', ['model'=>$model,]);
    $pdf = new Pdf([
        'mode' => Pdf::MODE_CORE, 
        'format' => Pdf::FORMAT_A4, 
        'orientation' => Pdf::ORIENT_LANDSCAPE, 
        'destination' => Pdf::DEST_BROWSER, 
        'content' => $content,  
        'cssFile' => '@frontend/web/css/malipo.css',
        'cssInline' => '.kv-heading-1{font-size:18px}', 
        'options' => ['title' => 'Medical Store Sales Report'],
        'methods' => [ 
            // 'SetHeader'=>['SALES REPORT'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    return $pdf->render();
}

public function actionPrint($sale_id)
 {
    // get your HTML raw content without any layouts or scripts
    $sales=Sales::findone([$sale_id]);
    $content= $this->renderPartial('salesreport', ['sales'=>$sales]);
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        'mode' => Pdf::MODE_CORE, 
        'format' => Pdf::FORMAT_A4 ,
        'orientation' => Pdf::ORIENT_LANDSCAPE, 
        'destination' => Pdf::DEST_BROWSER, 
        'content' => $content,
        'cssFile' => '@frontend/web/css/malipo.css',
        'cssInline' => '.kv-heading-1{font-size:18px}', 
        'options' => ['title' => 'Medical Store Sales Report'],
        'methods' => [ 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    
    // return the pdf output as per the destination setting
    return $pdf->render(); 
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
public function actionAddSeller()
{
    $model = new SignupForm();   
    $seller =new Seller(); 
    if ($model->load(Yii::$app->request->post()) && $model->signup()) 
    {
  $path = Yii::getAlias('@frontend') .'/web/photo/';
        $model->pic = UploadedFile::getInstance($model, 'pic');
        if ($model->pic && $model->validate()) {
            $model->pic->saveAs($path . $model->pic->baseName . '.' . $model->pic->extension);
        }
        $seller->pic= $model->pic->baseName . '.' . $model->pic->extension;
        $seller->log_id = User::findone(['email'=>$model->email])->id;
        $seller->mobile=$model->mobile;
        $seller->save();
        Yii::$app->session->setFlash('success', 'User has been Added Successfully');
        return $this->goHome();
    }   return $this->render('adduser', [
        'model' => $model,'seller'=>$seller
    ]);
}
public function actionLogin()
    {
        $this->layout = 'blank';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login())
         {
			$this->layout = 'main';
<<<<<<< HEAD
        //     $session =Yii::$app->session;
        // $session['login']=$model->username;
        $id=\Yii::$app->user->identity->id;
        
       
    //    if(Admin::findone(['log_id'=>$id]))
    //     return $this->goHome();
     
    //     if( Seller::findone(['log_id'=>$id]))
    //     {
            return $this->goHome();
        
    //      }
=======
            return $this->goHome();
>>>>>>> 8bd6ef6268d29e5b762016e5ff8050192de06852
        }
        $model->password = '';
	
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
<<<<<<< HEAD
    {$this->layout = 'blank';
        Yii::$app->user->logout();
		
=======
    {
       
        Yii::$app->user->logout();
         $this->layout = 'blank';
>>>>>>> 8bd6ef6268d29e5b762016e5ff8050192de06852
        return $this->goHome();
    }

}
?>