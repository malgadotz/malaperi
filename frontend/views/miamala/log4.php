<?php
namespace frontend\controllers;
use\yii\Widgets;
use yii\base\Model;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use frontend\models\Users;
use yii;
?>
<div style="background: url('img/login.jpg');background-size: 100%">
	<div class="login-box">

  	<div class="well well-sm center" style="width: 45%;margin: auto;padding:4px 11px;margin-top: 111px;text-align: center;">
  		<h3 class="center">Login</h3>
  	</div>
  <!-- /.login-logo -->
  <div class="well well-sm" style="width: 45%;margin:auto;padding: 22px;margin-top: 22px;z-index: 6">
    <p class="login-box-msg">Sign in to start your session</p>



    <?php $form = ActiveForm::begin(['id' => 'login']); ?>

    <div class="form-group ">
<?= $form->field($model, 'username')->textInput( ['class' => 'form-control']) ?>
<!-- <span class="fa fa-envelope form-control-feedback"></span></div> -->
<div class="form-group ">
<?= $form->field($model, 'password')->passwordInput( ['class' => 'form-control']) ?>
<!-- <span class="fa fa-lock form-control-feedback"></span> -->
</div>
<!-- <div class="form-group ">
/* //$form->field($model, 'rememberMe')->checkbox() 
</div> -->
<!-- 
<div style="color:#999;margin:1em 0">
    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
    <br>
    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
</div> -->

<div class="form-group">
    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
</div>

<?php ActiveForm::end(); ?>


<!-- 
		<form method="post">
      <div class="form-group ">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        
      </div>

		  <div class="form-group ">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        
      </div>

          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>


									<a class="btn btn-block" style="bacground-color:green;" href="Register.php" role="button">Register today</a>

  </div>

	</div> -->
  <br>
  <div class="alert alert-danger" id="error"  style="width: 25%;margin: auto;display: none;"></div>
  <div style="position: fixed;;top:0;background: rgba(0,0,0,0.7); width: 100%;height: 100%;z-index: -1"></div>

  <!-- /.login-box-body -->
</div>

</form>
</div>


 
