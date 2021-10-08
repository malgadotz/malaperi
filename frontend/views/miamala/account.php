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
   <div class="content">
       <ol class="breadcrumb ">
        <li><a href=<?=$url1;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Account settings</li>
    </ol>
   <div class="card  mauto half">
    <div class="card-header bg-info">
    <h3 class="text-center btn-block"><i class="fa fa-user-plus text-white"></i> Update Login Info</h3>
    </div>
    <div class="card-body">
    
    

<?= $form->field($model, 'name')->textInput(['prompt' =>$model->name, 'readOnly'=> true]) ?>

<?= $form->field($model, 'oldpassword')->passwordInput() ?>
<?= $form->field($model, 'newpassword')->passwordInput() ?>
<?= $form->field($model, 'newppassword')->passwordInput() ?>

                <div class="form-group">
                    <button class="btn btn-success">Update Profile</button>
                </div>
            <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>