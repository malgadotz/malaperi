<?php
namespace frontend\controllers;
use yii\base\Model;
use dosamigos\datepicker\DatePicker;
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
        <li class="active">Update Drug Details</li>
    </ol>
    <span style="font-size: 14pt;color: #333333"><i class="fa fa-book fa-2x text-info"> </i></span>
      <?= Html:: a(" Go Back",['/miamala/drugs'],['class' => 'fa fa-arrow-left btn btn-primary btn-sm pull-right text-white']) ?>
  
     </div>
 <div class="container">
   <div class="card  mauto joi md">
    <div class="card-header bg-info">
    <h3 class="text-center btn-block"><i class="fa fa-edit text-white"></i> Update Drug Details  </h3>
    </div>
    <div class="card-body">
       
        <div class="form-group ">
            <?= $form->field($drug, 'drug_name')->textInput(['autofocus' => true,'prompt' =>$drug->drug_name]) ?>
            <?= $form->field($drug, 'quantity')->textInput(['prompt' =>$drug->quantity]) ?>
            <?= $form->field($drug, 'price')->textInput(['prompt' =>$drug->price]) ?>
            <?= $form->field($drug, 'expire')->widget(
                DatePicker::className(), [
                     'inline' => false, 
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
            ]);?>
            <?= $form->field($drug, 'cat_id')->dropDownList(
                ArrayHelper::map(Categories::find()->all(),'cat_id','cat_name'), ['prompt' =>Categories::findone(['cat_id'=>$drug->cat_id])->cat_name]) ?>
            <?= $form->field($drug, 'description')->textarea(['rows' => 3, 'prompt' =>$drug->description]) ?>
            <div class="form-group">
                
 <?= Html::submitButton('Update', ['class' => 'btn btn-success  btn-flat btn-block'  ,

            'data' => [
                'confirm' => 'Are  you Sure you want to Update thiese drug detalis?',
                'method' => 'post'],
           ]) ?>
            </div>
            <?php ActiveForm::end(); ?>
    </div>
    </div>
 </div>
</div>
       