<?php
namespace frontend\controllers;
use yii\base\Model;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use common\models\User;
use yii;

$url1=yii::$app->homeUrl;
$form=ActiveForm::begin([
'method'=>'post',
'action'=>'/miamala/account'

])
   ?>  
   <ol class="breadcrumb ">
        <li><a href=<?=yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Account settings</li>
    </ol>
   <div class="card  mauto half">
    <div class="card-header bg-primary">
    <h3 class="text-center btn-block"><i class="fa fa-user fa-lg text-white">Update User-Account Informations</i></h3>
    </div>
    <div class="card-body">
     

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email')->passwordInput() ?>                
              
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
     