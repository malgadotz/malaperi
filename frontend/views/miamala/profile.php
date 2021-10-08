<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use common\models\Seller;
$url1=Yii::$app->homeUrl;
$id=\Yii::$app->user->identity->id;
$seller=Seller::findone(['log_id'=>$id]);
$form = ActiveForm::begin([
    'id' => 'active-form',
    'options' => [
		'class' => '',
		'enctype' => 'multipart/form-data'
	],
])?>
     
   <div class="content">
       <ol class="breadcrumb ">
        <li><a href=<?=$url1;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Update Profile Picture</li>
    </ol>
   <div class="card  mauto half">
    <div class="card-header bg-info">
    <h3 class="text-center btn-block"><i class="fa fa-user-plus text-white"></i> Update Profile Picture</h3>
    </div>
    <div class="card-body">
    <?php if($seller):?>
    <?= $form->field($model, 'mobile')->textInput(['promp'=>'+255'])?>
    <?php endif;?>
<?= $form->field($model, 'pic')->fileInput()?>
                <div class="form-group">
                    <?= Html::submitButton('Confirm Change', ['class' => 'btn btn-success btn-block btn-flat '  , 'name' => 'contact-button'])?>
                </div>
            <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>