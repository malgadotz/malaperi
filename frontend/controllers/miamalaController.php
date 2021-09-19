<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\MiamalaaForm;
use yii;
class MiamalaController extends Controller
{
	 // public $layout='miamalaLayout';
// public $layout='miamalaLayout';
public function actionHome()
{
	
	return $this->render('login');
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


}
?>