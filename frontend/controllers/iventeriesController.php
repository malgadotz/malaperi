<?php
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\MiamalaaForm;
use yii;
class IventeriesController extends Controller
{
// public $layout='miamalaLayout';
public function actionHome()
{
	$model=new MiamalaaForm();
	return $this->render('index',['model' => $model,
        ]);
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
	return $this->render('inventeries');
}
public function actionAbout()
{
	return $this->render('about');
}

}
?>