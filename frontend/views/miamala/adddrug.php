<?php

namespace frontend\controllers;
use dosamigos\datepicker\DatePicker;
// use yii\jui\DatePicker;
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
        <li class="active">Add New Drug</li>
    </ol>
    <span style="font-size: 14pt;color: #333333"><i class="fa fa-book fa-2x text-dark"> </i></span>
      <?= Html:: a(" Go Back",['/miamala/drugs'],['class' => 'fa fa-arrow-backward btn btn-primary btn-sm pull-right text-white']) ?>
 </div>
    <div class="container">
   <div class="card  mauto joi md">
    <div class="card-header bg-info">
    <h3 class="text-center btn-block">  <i class="fa fa-plus text-white"></i>   Add Drug   <i class="fa fa-plus text-white">  </i></h3>
    </div>
    <div class="card-body">
     <div class="form-group">
    <?= $form->field($model, 'drug_name')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'quantity')->textInput()?>
    <?= $form->field($model, 'price')->textInput() ?>
    <?= $form->field($model, 'expire')->widget(
        DatePicker::className(), [
             'inline' => false, 
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
    ]
    ]);?>
    <?= $form->field($model, 'cat_id')->dropDownList(
        ArrayHelper::map(Categories::find()->all(),'cat_id','cat_name'), ['prompt' => 'select Category']) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>
    <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-flat '  , 'name' => 'contact-button' ,

            'data' => [
                'confirm' => 'Are  you Sure you want to Add this drug and its detalis?',
                'method' => 'post'],
           ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
   </div>
    </div>
    </div>
    </div>

    
         