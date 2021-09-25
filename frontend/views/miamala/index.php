<?php
namespace frontend\controllers;
use yii\base\Model;
use common\widgets\Alert;
use common\models\User;
use common\models\Seller;
use common\models\Admin;
use yii\helpers\Html;
use yii;


$id=\Yii::$app->user->identity->id;
$userwho="user";
$user;
if(Admin::findone(['log_id'=>$id]))
{ 
$userwho = "admin";
$user=Admin::findone(['log_id'=>$id]);
}
else 
{
  $userwho= "seller";
  $user=Seller::findone(['log_id'=>$id]);
  
}
?>

<div class="content">
<ol class="breadcrumb ">
        <a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a>
        <li class="active">Home</li>
    </ol>
   </div>
   <div class="content2">
    <!-- //errow message -->
    <div class="">
   <span style="font-size: 16pt;color: #333333">Categories </span>
      <?php if($userwho == 'admin'):?>
      <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addIn"><i class="fa fa-gear  fa-fw"> </i><?= Html:: a("Manage Categories",['/miamala/manage-cat'],['class' => 'nostyle text-white']) ?></button>
        <?php endif;?>
    </div>

  
<!-- //fetch data starts here -->
<?php foreach($models as $models): ?>

  
      <div class="box2 col-md-3">
        <div class="center">
         <img src="photo/<?php echo $models->cat_pic;?>" style="width: 155px;height: 122px;" class='img-thumbnail'>
        </div>
        
      <hr style="margin: 7px;">
      <span style="padding: 11px"><strong style="font-size: 10pt">Name</strong><span class="pull-right" style="color:blue;margin-right: 11px;">
      <?= Html:: a($models->cat_name,['/miamala/drugs-category', 'drug_id'=>$models->cat_id],['class' => 'btn btn-primary btn-xs']) ?>
    </span>
      </span>
      
      <hr style="margin: 7px;">
      
      <span style="padding: 11px"><strong style="font-size: 10pt">Available Drugs</strong><span class="pull-right" style="color:blue;margin-right: 11px">
      <?php $sum=0;
       foreach($drug as $drugs): ?>
        <?php if($models->cat_id == $drugs->cat_id):  
          $sum=$sum+1;
          ?>
          <?php endif; ?>
          <?php endforeach; ?>  
      <?php echo $sum;?>
      </span>      
    </span>  
    <hr style="margin: 7px;">
      
      <span style="padding: 11px"><strong style="font-size: 10pt">Available Qty</strong><span class="pull-right" style="color:blue;margin-right: 11px">
      <?php $su=0;
       foreach($drug as $drugs): ?>
        <?php if($models->cat_id == $drugs->cat_id):  
          $su=$su+$drugs->quantity;
          ?>
          <?php endif; ?>
          <?php endforeach; ?>  
      <?php echo $su;?>
      </span>      
    </span>    
       </div>
    
  <!-- //end php -->
  <?php endforeach; ?>
  <!-- //fetch data starts here -->
  </div>
</div>