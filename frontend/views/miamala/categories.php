<?php

use yii\helpers\Html;
use common\models\Seller;
use common\models\Categories;
use common\models\Admin;


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
        <li><a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?=$cat->cat_name;?></li>
    </ol>
  <div class="tableBox" >
    <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">
      <thead>
        <th>#</th>
        <th>Drug Name</th>
        <th>Available Quantity</th>
        <th>Price</th>
        <th>Category</th>
        <th>Expire Date</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>

      </thead>
     <tbody>
     <?php 
     $a=1;
    
     foreach($model as $model): ?>
          <tr>
            <td><?php echo $a++;?></td>
            <td><?php echo $model->drug_name;?></td>
            <td><?php echo $model->quantity;?></td>
            <td><?php echo $model->price;?></td>
            <td><?php echo Categories::findone(['cat_id'=>$model->cat_id])->cat_name;?></td>
            <td><?php echo $model->expire?></td>
            <td><?php echo $model->description?></td>
               <?php
               $status='available';
            $expire = date_create($model->expire);
            $today = date_create(date('Y-m-d'));
            $diff = date_diff($expire,$today);
            $total=$diff->format("%a");
            if( $expire< $today){
              $status='expired';?>
                  <td class="bg-danger text-white"> ExPired             
                <?php }
                else if ($total < 20) {?>
              <td class="bg-warning text-white">
                <?php    echo $diff->format("%a"). ' Days To expire';?></td>  
               <?php }else{?>
              <td class="bg-info text-white">
              <?php    echo $diff->format("%a"). ' Days To expire';}?></td>
              <?php
              if($userwho == 'admin'):
              ?><td colspan="center">
            <?= Html:: a("",['/miamala/update-drug', 'drug_id'=>$model->inv_id],['class' => 'fa fa-edit fa-lg  text-primary btn-sm']) ?>
              <?= Html:: a("",['/miamala/delete-drug', 'inv_id'=>$model->inv_id],['class' => 'text-danger fa fa-trash fa-lg btn-sm']) ?>
            </td>
            <?php endif;?>
            <?php if($userwho == 'seller'):?>
              <td colspan="center">
            <?php if($status == 'expired'):?>
              <label class="btn fa fa-times fa-lg text-white btn-info bt-xs"> No stock</label>
             <?php else:?>
            <?= Html:: a('  Sell Item'   
          ,['/miamala/sell-drug', 'drug_id'=>$model->inv_id], ['class' => ' btn fa fa-check-square fa-lg text-white btn-primary bt-xs'])?>

             
             <?php endif;?>
             </td>
            <?php endif;?>

          </tr>
          <?php endforeach; ?>  
     </tbody>
    </table>
  </div>

  </div>  <!-- ending tag for content -->
