<?php
use yii\helpers\Html;
?>

<div class="card-header top-back">
<ol class="breadcrumb ">
        <li><a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Manage Categories</li>
    </ol>
  
    <!-- //errow message -->
   
      <span style="font-size: 14pt;color: #333333"><i class="fa fa-search fa-2x text-dark"> </i></span>
      <?= Html:: a(" Add New Category",['/miamala/add-cat'],['class' => 'fa fa-plus btn btn-primary btn-sm pull-right text-white']) ?>
  
      <!-- SEARCH BOX -->
    <div class="form-inline pull-left">  
  <input class=" form-control md fa fa-search fa-lg" id="tableSearch" type="text"
    placeholder="Type To Search">
  </div></div>
    <div class="tableBox " >
    <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">
      <thead>
        <th>#</th>
        <th>Name Of Product</th>
        <th>Drugs Types Available</th>
        <th>quantity Available</th>
        <th>Action</th>
      </thead>
     <tbody id="myTable">
     <?php 
     $i=1;
     foreach($model as $model): ?>
          <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $model->cat_name;?></td>
            <td> <?php $sum=0;
       foreach($drug as $drugs): ?>
              <?php if($model->cat_id == $drugs->cat_id):  
              $sum=$sum+1;
              ?>
              <?php endif; ?>
              <?php endforeach; ?>  
              <?php echo $sum;?>
            </td>
            <td><?php $su=0;
       foreach($drug as $drugs): ?>
        <?php if($model->cat_id == $drugs->cat_id):  
          $su=$su+$drugs->quantity;
          ?>
          <?php endif; ?>
          <?php endforeach; ?>  
      <?php echo $su;?>
        </td>
            <td>
              <?= Html:: a("",['/miamala/drugs-category', 'drug_id'=>$model->cat_id],['class' => 'fa fa-eye fa-lg text-primary btn-sm']) ?>
              <?= Html:: a("",['/miamala/update-cat' , 'cat_id'=>$model->cat_id],['class' => 'fa fa-edit fa-lg   btn-sm']) ?>
              
              <?= Html:: a("",['/miamala/delete-cat', 'cat_id'=>$model->cat_id],['class' => 'fa fa-trash fa-lg text-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this Category and its associated Drugs?',
                'method' => 'post'],
           ]) ?>
            </td>
          </tr>      
          <?php endforeach; ?>  
     </tbody>
    </table>
  </div>
</div>

