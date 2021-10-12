<?php
use yii\helpers\Html;
use common\models\Seller;
use common\models\Categories;
use common\models\Admin;
$role=\Yii::$app->user->identity->role;
$isAdmin=false;
$isSeller=false;
$id=\Yii::$app->user->identity->id;
if($role >9){ $isAdmin = true;}
else{ $isSeller=true;}
?>
 <div class="card-header top-back">
   <ol class="breadcrumb ">
        <li><a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Drugs</li>
  </ol>
   <span style="font-size: 16pt;color: #333333"><i class="fa fa-search fa-lg text-info"> </i></span>
        <?= Html:: a(' Drugs Invoice'
          ,['/miamala/invoice'],['class' => ' btn fa fa-file-pdf-o fa-lg text-white btn-success pull-right'])?>         <?php 
if ($isAdmin):?>
        <?= Html:: a(' Inventory Report'
          ,['/miamala/inventory'],['class' => ' btn fa fa-file-pdf-o fa-lg text-white status-info pull-right'])?>
        <?= Html:: a("  Add Drug",['/miamala/add-drug'],['class' => 'fa btn fa-plus-square fa-lg text-white btn-info pull-right']) ?>
<?php endif;?>
     <!-- SEARCH BOX -->
      <div class="form-inline pull-left">  
        <input class=" form-control" id="tableSearch" type="text"
        placeholder="Search Inventory Here"> 
      </div>

  </div>
  <div class="tableBox joi">
    <table id="dataT" class=" table table-bordered table-striped" style="z-index: -1">
      <thead>
        <th>#</th>
        <th>Drug Name</th>
        <th>Stock</th>
        <th>Price (TSH)</th>
        <th>Category</th>
        <th>Expire Date</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
      </thead>
      <tbody id="myTable">
        <?php 
     $a=1;
     $amount=0;
     $quantity=0;
     foreach($model as $model): ?>
      <?php $status='available';?>
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
              <td class="text-center status-stocks text-white"> Out of Stock             
            <?php }else{
            if( $expire< $today || $total < 1){
              $status=true;?>
                  <td class="text-center status-unavailable text-white">Drug Expired             
                <?php }
                else if ($total < 20) {?>
              <td class="text-center status-stock text-white">
                <?php    echo $diff->format("%a"). ' Days To expire';?></td>  
               <?php }else{?>
              <td class="text-center status-available text-white">
              <?php    echo $diff->format("%a"). ' Days To expire';}}?></td>

              <!-- ACTION -->

              <td colspan="center">
              <?php
        if($isAdmin):?>
            
            <?= Html:: a("",['/miamala/update-drugs', 'drug_id'=>$model->inv_id],['class' => 'fa fa-edit fa-lg  text-primary btn-sm']) ?>
              <?= Html:: a("",['/miamala/delete-drug', 'inv_id'=>$model->inv_id],['class' => 'text-danger fa fa-trash fa-lg btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post'],
           ]) ?>
            
        <?php else:?>
            
            <?php if($status || $model->quantity < 1):?>
              <?= Html:: a('',['/miamala/drugs'], ['class' => 'fa fa-spinner fa-lg fa-pulse btn-sm text-status-unavailable mauto'])?>
             <?php else:?>
            <?= Html:: a('' 
          ,['/miamala/sell-drug', 'drug_id'=>$model->inv_id], ['class' => 'fa fa-money fa-lg mauto text-primary btn-sm'])?>
          <?php endif;?>
          <?= Html:: a("",['/miamala/view-drug' , 'drug_id'=>$model->inv_id],['class' => 'btn  text-info  btn-sm fa fa-eye fa-lg'])?>
            <?php endif;?>
            </td>
          </tr>
          <?php 
          $quantity=$quantity + $model->quantity;
          $amount=$amount + $model->price * $model->quantity;
          endforeach; 
          if($isAdmin):?>
          <tr class="bold">
            <strong><td></td><td>Total </td><td>Stock:</td><td><?php echo $quantity;?></td><td>Price(Value):</td><td><?php echo $amount;?></td><td>Inventory Status</td></strong>
          </tr>  
          <?php endif;?>
     </tbody>
    </table>
  </div>

  </div>  <!-- ending tag for content -->
<!-- <script>
  // Filter table

$(document).ready(function(){
  $("#tableSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> -->