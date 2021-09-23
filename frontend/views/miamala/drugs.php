<?php

use yii\helpers\Html;
?>
 <div class="content">
   <ol class="breadcrumb ">
        <li><a href=<?=Yii::$app->homeUrl;?>><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Drugs</li>
    </ol>
  <div class="tableBox" >
    <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">
      <thead>
        <th>#</th>
        <th>Name</th>
        <th>Unit</th>
        <th>Price Per Unit</th>
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
            <td><?php echo $model->unit;?></td>
            <td><?php echo $model->price;?></td>
            <td><?php echo $model->expire?></td>
            <td><?php echo $model->description?></td>
              <td colspan="center"><i class="fa fa-trash fa-lg text-danger"></i><?= Html:: a("Delete Item",['/miamala/deletedrug', 'inv_id'=>$model->inv_id],['class' => 'btn btn-danger btn-xs']) ?></td>
          </tr>
          <?php endforeach; ?>  
     </tbody>
    </table>
  </div>

  </div>  <!-- ending tag for content -->
