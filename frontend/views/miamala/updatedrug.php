<?php
namespace frontend\controllers;
use yii\base\Model;
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
        <li class="active">Update Drug Details</li>
    </ol>
   <div class="card  mauto half">
    <div class="card-header bg-primary">
    <h3 class="text-center btn-block"><i class="fa fa-user-plus text-white"></i> Update Drug Details</h3>
    </div>
    <div class="card-body">
    
    <?= $form->field($drug, 'drug_name')->textInput(['autofocus' => true,'prompt' =>$drug->drug_name]) ?>

<?= $form->field($drug, 'quantity')->textInput(['prompt' =>$drug->quantity]) ?>
<?= $form->field($drug, 'price')->textInput(['prompt' =>$drug->price]) ?>
<?= $form->field($drug, 'expire')->textInput(['prompt' =>$drug->expire]) ?>
<?= $form->field($drug, 'cat_id')->dropDownList(
    ArrayHelper::map(Categories::find()->all(),'cat_id','cat_name'), ['prompt' =>Categories::findone(['cat_id'=>$drug->cat_id])->cat_name]) ?>
<?= $form->field($drug, 'description')->textarea(['rows' => 6, 'prompt' =>$drug->description]) ?>
                <div class="form-group">
                    <button class="btn btn-success">Update Drug</button>
                </div>
            <?php ActiveForm::end(); ?>
            </div>
            </div>
        </div>