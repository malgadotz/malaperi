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
   <div class="card-header top-back">
       <ol class="breadcrumb ">
        <li><a href=<?=$url1;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Register New Seller</li>
       </ol>
     
     
  </div>
  <br>
    <div class="container">
   <div class="card  mauto joi md">
    <div class="card-header bg-info">
    <h3 class="text-center btn-block"><i class="fa fa-user-plus text-white"></i> Add Seller <i class="fa fa-money text-white"></i></h3>
    </div>
    <div class="card-body">
     <div class="form-group">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'mobile')->textInput()?>
            <!-- <?= $form->field($model, 'pic')->fileInput()?> -->
            <?= $form->field($model, 'pic', [
            'template' =>'
            <div class="custom-file">
            {label}
            {input}
            {error}
            </div>
            ',
            'inputOptions'=>['class'=>'custom-file-input'],
            'labelOptions' => ['class' => 'custom-file-label']
             ])->fileInput(['type'=>'file']) ?>
            <?= $form->field($model, 'newpassword')->passwordInput() ?>
            <?= $form->field($model, 'newppassword')->passwordInput() ?>


              
    <div class="form-group">
<?= Html::submitButton('Add Seller', ['class' => 'btn btn-success btn-block btn-flat '  , 'name' => 'contact-button' ,

            'data' => [
                'confirm' => 'New Seller will be Registered?',
                'method' => 'post'],
           ]) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>

