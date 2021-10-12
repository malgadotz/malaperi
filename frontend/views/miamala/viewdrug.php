<?php
use yii\helpers\Html;
use common\models\Seller;
use common\models\Categories;
use common\models\Admin;
$role=\Yii::$app->user->identity->role;
$isAdmin=false;
if($role >9){ $isAdmin = true;}

?>
 <div class="card-header top-back">
   <ol class="breadcrumb ">
        <li><a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Drugs</li>
    </ol>
   <span style="font-size: 16pt;color: #333333"><i class="fa fa-book fa-2x text-info"> </i> </span>
        <?= Html:: a(' Drug Invoice'
          ,['/miamala/invoice'],['class' => ' btn bi bi-download fa-lg text-white btn-success pull-right'])?> 
          <?= Html:: a(' Go Back'
          ,['/miamala/drugs'],['class' => ' btn bi bi-arrow-return-left fa-lg text-white status-info pull-right'])?>        <?php 
if ($isAdmin):?>
    <?= Html:: a("  Add Drug",['/miamala/add-drug'],['class' => 'fa btn fa-plus-square fa-lg text-white btn-info pull-right']) ?>
<?php endif;?>
    </div>
    
<div class="tableBox  joi mauto half-5">
    <div class="btn-cool center block angelBlue text-info" style=";margin: auto;padding: 8px 4px;margin-top: 11px;">
      <h4 class="">MALAPERI STORE DRUG INVENTORY DETAILS</h4>
    </div>
      <table id="payment" class="table table-bordered table-striped" style="z-index: -1">
        <?php 
     $i=1;
     $sum=0;
    foreach($drug as $drug): ?>
      <tr>
        <td>Drug Name</td>
        <td><?php echo $drug->drug_name;?></td>
      </tr>
      <tr>
        <td>Drug Category</td>
       <td><?php echo Categories::findone(['cat_id'=>$drug->cat_id])->cat_name;?></
    </tr>
    <tr>
        <td>Drug Expire At</td>
         <td><?php echo $drug->expire?></td>
    </tr>
     <tr> 
        <td>Available Units</td>
        <td><?php echo $drug->quantity;?></td>
        </tr>
     <tr>
        <td>Selling Price</td>
         <td><?php echo $drug->price;?></td>
    </tr>
    
     <tr>
        <td>Description</td>
        <td><?php echo $drug->description;?></td>
    </tr>
     
          <?php endforeach; ?>  
    <tr class="bold text-black">
           
            <td><h4>TOTAL CURRENT DRUG STOCK NETWORTH AMOUNT</h4></td>     
            
            <td><h5><strong> <?php echo $drug->price * $drug->quantity;?></h5></strong></td>
    </tr>
    </table>
  </div>
 

  <!-- </div>  --> <!-- ending tag for content -->
