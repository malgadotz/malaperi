<?php
use yii\helpers\Html;
?>

<div class="content">
<ol class="breadcrumb ">
        <li><a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Manage Categories</li>
    </ol>
   </div>
   <div class="content2">
    <!-- //errow message -->
    <div>


      <span style="font-size: 16pt;color: #333333">Categories </span>
      <?= Html:: a(" Add New Category",['/miamala/add-cat'],['class' => 'fa fa-plus btn btn-primary btn-sm pull-right text-white']) ?>

    </div><div class="tableBox " >
    <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">
      <thead>
        <th>#</th>
        <th>Name Of Product</th>
        <th>Drugs Types Available</th>
        <th>quantity Available</th>
        <th>Action</th>
      </thead>
     <tbody>
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
             
              <?= Html:: a("",['/miamala/update-cat' , 'cat_id'=>$model->cat_id],['class' => 'fa fa-edit fa-lg   btn-sm']) ?>
              
              <?= Html:: a("",['/miamala/delete-cat', 'cat_id'=>$model->cat_id],['class' => 'fa fa-trash fa-lg text-danger btn-sm']) ?>
            </td>
          </tr>      
          <?php endforeach; ?>  
     </tbody>
    </table>
  </div>
</div>

