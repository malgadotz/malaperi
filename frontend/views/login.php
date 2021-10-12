<?php

namespace frontend\controllers;

use yii\Widgets;
use yii\base\Model;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use frontend\models\Users;
use yii;

?>


<?php $form = ActiveForm::begin([
    'method'=>'post',
    'id'=>'login'
]); ?>


<style>
  h3{
    color: white;

  }
  .primarycolor{
    background: #3D56B2;
  }

  .heaf{
    width: 45%; 
    margin: auto; 
    padding:4px 11px; 
    margin-top: 111px; 
    border-radius:0px;
    text-align: center; 
    border:0px;
  }

  .inside{
    width: 45%; 
    margin:auto; 
    padding: 22px; 
    margin-top:0; 
    z-index: 6 ; 
    border:0px; 
    border-radius:0px;
  }

  .box1{
    height:200px;
  }
</style>


<div class="login-box box1">

  	<div class="well well-sm center primarycolor heaf">
  		<h3 class="center">MALAPERI MEDICAL STORE | MS </h3>
  	</div>

  <!-- /.login-logo -->
  <div class="well well-sm inside">
    <!-- <p class="login-box-msg">Sign in to start your session</p> -->
    <div class="form-group ">
      <?= $form->field($model, 'username')->textInput( ['class' => 'form-control']) ?>
      <!-- <span class="fa fa-envelope form-control-feedback"></span></div> -->
    </div>

    <div class="form-group ">
      <?= $form->field($model, 'password')->passwordInput( ['class' => 'form-control']) ?>
      <!-- <span class="fa fa-lock form-control-feedback"></span> -->
    </div>

    <div class="form-group">
        <?= Html::submitButton('Sign In', ['class' => 'btn primarycolor text-white btn-block btn-flat', 'id' => 'login-button']) ?>
    </div>

</div>

<?php ActiveForm::end(); ?>






