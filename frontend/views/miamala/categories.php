<?php

use yii\helpers\Html;
use common\models\Seller;
use common\models\Categories;
use common\models\Admin;
$role=\Yii::$app->user->identity->role;
$isAdmin=false;
$id=\Yii::$app->user->identity->id;
if($role >9){ $isAdmin = true;}
?>
 <div class="card-header top-back">
   <ol class="breadcrumb ">
        <li><a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><?=$cat->cat_name;?></li>
    </ol>

    <div class="form-inline">  
  <input class=" form-control md fa fa-search fa-lg" id="tableSearch" type="text"
    placeholder="Search Here"><i class="fa fa-search fa-2x text-dark"> </i>
  </div></div>
  <div class="tableBox" >
    <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">
      <thead>
        <th>#</th>
        <th>Drug Name</th>
        <th>Stock</th>
        <th>Price</th>
        <th>Category</th>
        <th>Expire Date</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
      </thead>
     <tbody id="myTable">
     <?php 
     $a=1;
    
     foreach($model as $model): ?>
          <tr>
            <td><?php echo $a++;?></td>
            <td><?php echo $model->drug_name;?></td>
             <?php if ($model->quantity< 10) :?>
                <?php if ($model->quantity < 1): ?>
                <td class="text-status-unavailable">
                  <?php endif;?>
                  <?php if($model->quantity > 0):?>
                  <td class="text-warning">  
                    <?php endif;?>
            <?php else:?>
            <td class="text-status-available">
            <?php endif;?>
            <?php echo $model->quantity;?>
            </td>
            <td><?php echo $model->price;?></td>
            <td><?php echo Categories::findone(['cat_id'=>$model->cat_id])->cat_name;?></td>
            <td><?php echo $model->expire?></td>
            <td><?php echo $model->description?></td>
               <?php
               $status=false;
            $expire = date_create($model->expire);
            $today = date_create(date('Y-m-d'));
            $diff = date_diff($expire,$today);
            $total=$diff->format("%a");
            if($model->quantity < 1){?>

              <td class="text-center status-stocks text-white mauto"> Out of Stock             
            <?php }else{

            if( $expire< $today || $total < 1){
              $status=true;?>
                  <td class="text-center status-unavailable text-white"> Drug Expired             
                <?php }
                else if ($total < 20) {?>
              <td  class="text-center status-stock mauto text-white">
                <?php    echo $diff->format("%a"). ' Days To expire';?></td>  
               <?php }else{?>
              <td class="text-center status-available text-white">
              <?php    echo $diff->format("%a"). ' Days To expire';}}?></td>
              <?php
              if($isAdmin):
              ?><td colspan="center">
            <?= Html:: a("",['/miamala/update-drugs', 'drug_id'=>$model->inv_id],['class' => 'fa fa-edit fa-lg  text-primary btn-sm']) ?>
              <?= Html:: a("",['/miamala/delete-drug', 'inv_id'=>$model->inv_id],['class' => 'text-danger fa fa-trash fa-lg btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post'],
           ]) ?>
            </td>
            <?php else:?>
            <td colspan="center">
            <?php if($status || $model->quantity < 1):?>
              <?= Html:: a('',['/miamala/drugs'], ['class' => 'fa fa-spinner fa-lg fa-pulse btn-sm text-status-unavailable mauto'])?>
             <?php else:?>
            <?= Html:: a('' 
          ,['/miamala/sell-drug', 'drug_id'=>$model->inv_id], ['class' => 'fa fa-money fa-lg mauto text-primary btn-sm'])?>
          <?php endif;?>
          <?= Html:: a("",['/miamala/view-drug' , 'drug_id'=>$model->inv_id],['class' => 'btn  text-info  btn-sm fa fa-eye fa-lg']) ?>
             </td>
            <?php endif;?>
          </tr>
          <?php endforeach; ?>  
     </tbody>
    </table>
  </div>

    <!-- ending tag for content -->
