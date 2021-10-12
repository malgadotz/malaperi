<?php

namespace frontend\controllers;

use yii\base\Model;
use common\widgets\Alert;
use common\models\User;
use common\models\Seller;
use common\models\Admin;
use yii\helpers\Html;
use yii;
?>
   <div class="card-header top-back">
       <ol class="breadcrumb ">
        <li><a href=<?=yii::$app->homeUrl?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Home</li>
    </ol>
    
    <!-- //errow message -->
   <span style="font-size: 14pt;color: #333333"><i class="fa fa-book fa-2x text-info"> </i> </span>
 <!-- <div class="form-inline pull-left">  
        <input class=" form-control" id="tableSearch" type="text"
        placeholder="Search Category"> 
      </div> -->
      <?php if(\Yii::$app->user->identity->role > 9):?>
      <?= Html:: a(" Manage Categories",['/miamala/manage-cat'],['class' => ' btn fa fa-gear btn-primary btn-sm pull-right nostyle text-white']) ?>
        <?php endif;?>
   
    </div>
<div class="mauto card half-5 back" >
  <div class="row card-body tyuo joi " >
<!-- //fetch data starts here -->
<?php foreach($models as $models): ?>
  <div class="box2 col-md-3 " id="myTable">
        <div class="center">
         <img src="photo/<?php echo $models->cat_pic;?>" style="width: 155px; height: 122px;" class='img-thumbnail'>
        </div>
      <hr style="margin: 7px;">
      <!-- <span style="padding: 11px"><strong style="font-size: 10pt">Name</strong><span class="pull-right" style="color:blue;margin-right: 11px;"> -->
      <?= Html:: a($models->cat_name,['/miamala/drugs-category', 'drug_id'=>$models->cat_id],['class' => 'btn btn-primary btn-block btn-flat']) ?>
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
