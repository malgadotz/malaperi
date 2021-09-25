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
              if($userwho == 'admin'):
              ?>
            
            <td colspan="center"><i class="fa fa-trash fa-lg text-danger"></i><?= Html:: a("Delete",['/miamala/deletedrug', 'inv_id'=>$model->inv_id],['class' => 'btn btn-danger btn-xs']) ?></td>
            <td colspan="center"><i class="fa fa-edit fa-lg text-danger"></i><?= Html:: a("Update",['/miamala/update-drug', 'drug_id'=>$model->inv_id],['class' => 'btn btn-success btn-xs']) ?></td>
            <?php endif;
            if($userwho == 'seller'):
              ?>
            
            <td colspan="center"><i class="fa fa-edit fa-lg text-white"></i><?= Html:: a("Sell Item",['/miamala/sell-drug', 'drug_id'=>$model->inv_id],['class' => 'btn btn-primary btn-xs']) ?></td>
            <?php endif;?>
            

          </tr>
          <?php endforeach; ?>  
     </tbody>
    </table>
  </div>

  </div>  <!-- ending tag for content -->
