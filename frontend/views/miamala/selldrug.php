<?php
namespace frontend\controllers;
use yii\base\Model;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use common\models\Categories;
use yii;
$url1=Yii::$app->homeUrl;
$form=ActiveForm::begin([
'id' => 'profile'
])
   ?>  
    <div class="card-header top-back">
       <ol class="breadcrumb ">
        <li><a href=<?=$url1;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Sell Drug</li>
        </ol>
        <span style="font-size: 14pt;color: #333333"><i class="fa fa-book fa-2x text-dark"> </i></span>
      <?= Html:: a(" Go Back",['/miamala/drugs'],['class' => 'fa fa-arrow-backward btn btn-primary btn-sm pull-right text-white']) ?>
    </div>

   <div class="container">
   <div class="card  mauto joi md">
    <div class="card-header bg-info">
    <h3 class="text-center btn-block"><i class="fa fa-money text-white"></i> Sell Drug <i class="fa fa-money text-white"></i></h3>
    </div>
    <div class="card-body">
       
        <div class="form-group ">
        <?= $form->field($drug, 'drug_name')->textInput(['prompt' =>$drug->drug_name, 'readOnly' =>true] ) ?>
        <div class="form-group">
        <?= $form->field($drug, 'quantity')->textInput(['prompt' =>$drug->quantity, 'readOnly' =>true]) ?>
        </div>
        <div class="form-group">
        <?= $form->field($drug, 'price')->textInput(['prompt' =>$drug->price, 'readOnly' =>true]) ?>
        </div>
        <div class="form-group ">
        <?= $form->field($model, 'quantity')->textInput()?>
        </div>
        <div class="form-group ">
        <?= $form->field($model, 'amount')->textInput(['readOnly'=>true])?>
        </div>
        
                <div class="form-group">
                    <button class="btn btn-info float-left">Generate Cost</button> 
                    <?= Html::submitButton('Sell Item', ['class' => 'btn btn-success  btn-flat float-right'  , 'name' => 'contact-button' ,
            'data' => [
                'confirm' => 'Transaction cann\'t be Reverted. Are you sure you want to Sell this item?',
                'method' => 'post'],
           ]) ?>
                </div>

            <?php ActiveForm::end(); ?>
    </div>
    </div>
    </div>
    </div>
      ,
            