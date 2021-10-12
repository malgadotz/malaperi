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
        <li><a href=<?=yii::$app->homeUrl?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Home</li>
    </ol>
    </div>

   <div class="content2">
    <!-- //errow message -->
    
   <span style="font-size: 16pt;color: #333333">Categories </span>
      <?php if($userwho == 'admin'):?>
      <?= Html:: a(" Manage Categories",['/miamala/manage-cat'],['class' => ' btn fa fa-gear btn-primary btn-sm pull-right nostyle text-white']) ?>
        <?php endif;?>
    </div>

<div class="mauto card half-5">
  <div class="row mauto card-body">
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
      
      <span style="padding: 11px"><strong style="font-size: 10pt">Quantity Left</strong><span class="pull-right" style="color:blue;margin-right: 11px">
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
$(document).ready(function () {
  $("#anythingSearch").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

// Filter table

$(document).ready(function(){
  $("#tableSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


$(document).ready(function () {
  $('#modalButton').click(function(){
    $('#modal').modal('show')
    .find('#modalContent')
    .load($(this).attr('value'));
  });
}
);