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
     
   <div class="card-header top-back">
       <ol class="breadcrumb ">
        <li><a href=<?=$url1;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Update Profile Picture</li>
    </ol>
    <span style="font-size: 14pt;color: #333333"><i class="fa fa-book fa-2x text-info"> </i></span>
      
</div>
<br>
   <div class="card joi mauto md">
    <div class="card-header bg-info">
    <h3 class="text-center btn-block"><i class="fa fa-picture-o  text-white"></i> Update Profile Picture</h3>
    </div>
    <div class="card-body">
    <?php if($seller):?>
    <?= $form->field($model, 'mobile')->textInput(['promp'=>'+255'])?>
    <?php endif;?>
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
    ])->fileInput(['type'=>'file']) 
     ?>

                <div class="form-group">
                     <?= Html::submitButton('Update', ['class' => 'btn btn-success  btn-flat btn-block'  ,
            'data' => [
                'confirm' => 'This will Update Profile Picture. Do you Want to confirm?',
                'method' => 'post'],
           ]) ?>
                </div>
            <?php ActiveForm::end(); ?>
            </div>
            </div>
        