<?php
namespace frontend\controllers;
use yii\base\Model;
use dosamigos\datepicker\DatePicker;
use common\models\User;
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
        <li class="active">Account settings</li>
    </ol>
    <span style="font-size: 14pt;color: #333333"><i class="fa fa-book fa-2x text-info"> </i></span>
    </div>
    <div class="container">
   <div class="card  mauto joi md">
    <div class="card-header bg-info">
    <h3 class="text-center btn-block"><i class="fa fa-edit text-white"></i> Update Login Information <i class="fa fa-lock text-white"></i></h3>
    </div>
    <div class="card-body">
    
    

<?= $form->field($model, 'name')->textInput(['prompt' =>$model->name, 'readOnly'=> true]) ?>

<?= $form->field($model, 'oldpassword')->passwordInput() ?>
<?= $form->field($model, 'newpassword')->passwordInput() ?>
<?= $form->field($model, 'newppassword')->passwordInput() ?>

                <div class="form-group">
                            <?= Html::submitButton('Update', ['class' => 'btn btn-success  btn-flat btn-block'  ,
            'data' => [
                'confirm' => 'This will Update Login password. Are  you Sure?',
                'method' => 'post'],
           ]) ?>
                </div>
            <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>
    </div>
        