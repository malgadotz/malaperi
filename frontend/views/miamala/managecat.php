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
      <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#addIn" style="margin-left: 2px;"><i class="fa fa-plus fa-fw"> </i>Add New Category</button>

    </div><div class="tableBox " >
    <table id="dataTable" class="table table-bordered table-striped" style="z-index: -1">
      <thead>
        <th>#</th>
        <th>Name Of Product</th>
        <th>quantity Available</th>
        <th>Action</th>
      </thead>
     <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <i class="fa fa-edit fa-lg text-primary"></i>
              <?= Html:: a("update",['/miamala/maage-cat'],['class' => 'btn btn-success btn-xs']) ?>
              <i class="fa fa-trash fa-lg text-dark"></i>
              <?= Html:: a("Delete",['/miamala/manage-cat'],['class' => 'btn btn-danger btn-xs']) ?>
            </td>
          </tr>      
     </tbody>
    </table>
  </div>
</div>

