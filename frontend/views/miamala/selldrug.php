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
   <div class="content">
       <ol class="breadcrumb ">
        <li><a href=<?=$url1;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Sell Drug</li>
    </ol>
    </div>

   <div class="card  mauto half">
    <div class="card-header bg-primary">
    <h3 class="text-center btn-block"><i class="fa fa-user-plus text-white"></i>Sell  Drug</h3>
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
                    <button class="btn btn-success float-right">Confirm Sell</button>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>