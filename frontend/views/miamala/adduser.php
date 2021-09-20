<?php
namespace frontend\controllers;
use yii\base\Model;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use common\models\MiamalaForm;
use yii;
$url1=Yii::$app->homeUrl;


$form=ActiveForm::begin([
'id' => 'profile'

])
   ?>  
   <div class="content">
       <ol class="breadcrumb ">
        <li><a href=<?=$url1;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Register New User</li>
    </ol>
   <div class="card  mauto half">
    <div class="card-header bg-primary">
    <h3 class="text-center btn-block"><i class="fa fa-users fa-lg text-white">Register New User-Account</i></h3>
    </div>
    <div class="card-body">
     <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'context') ?>

                <?= $form->field($model, 'amount') ?>

                  
<?= $form->field($model, 'date') ?>
              
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>