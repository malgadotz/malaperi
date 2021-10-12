<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$url1=Yii::$app->homeUrl;

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
        <li class="active"><?=$cat->cat_name;?></li>
    </ol>
    <span style="font-size: 14pt;color: #333333"><i class="fa fa-book fa-2x text-info"> </i></span>
    <?= Html:: a(" Go Back",['/miamala/manage-cat'],['class' => 'fa fa-long-arrow-left btn btn-primary btn-sm pull-right text-white']) ?>
     </div>
  <div class="container">
   <div class="card  mauto joi md">
    <div class="card-header bg-info">
    <h3 class="text-center btn-block"><i class="fa fa-edit text-white"></i> Update Category  <i class="fa fa-object-group text-white"></i></h3>
    </div>
    <div class="card-body">
        <div class="form-group ">
        <?= $form->field($cat, 'cat_name')->textInput(['autofocus' => true, 'prompt'=>$cat->cat_name])?>
        <?= $form->field($cat, 'cat_pic')->fileInput(['prompt'=>$cat->cat_pic])?>
        <div class="form-group">
        <?= Html::submitButton('Update Drug Category', ['class' => 'btn btn-success btn-block btn-flat '  , 'name' => 'contact-button']) ?>
        </div>
<?php ActiveForm::end(); ?>
    </div>
    </div>
</div>
</div>

