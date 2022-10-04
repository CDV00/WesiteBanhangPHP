<?php
    $categorys=$data['categorys'];
    $paging =$data['paging'];


?>


<a class="btn btn-primary" href="#" role="button">Tất cả nhóm</a>
<div class="row button btn-warning">
  <?php
      if(!empty($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
  ?>
</div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">CatId</th>
      <th scope="col">CatName</th>
      <th scope="col">Status</th>
      <th scope="col">Trash</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i=1;
      foreach($categorys as $c){
    ?>

    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td><?php echo $c['catId'] ?></td>
      <td><?php echo $c['catName'] ?></td>

      <td>
        <a href="<?php echo BASE_URL?>admincategory/categoryToggleStatus/<?php echo $c['catId']?>">
          <?php 
            if($c['status']==1)
              echo'<i class="fas fa-check text-primary"></i>'; 
            else 
              echo'<i class="fas fa-times text-danger"></i>'; 
          ?>
        </a>
      </td>

      <td><?php echo $c['trash'] ?></td>
      <td>
        <a href="<?php echo BASE_URL?>admincategory/categoryToggleTrash/<?php echo $c['catId']?>" onclick="return confirm('Bạn có chắc chăn xóa sản phảm này?');">Xóa</a> |
        <a href='<?php echo BASE_URL.'admincategory/updateCategory/'.$c['catId']?>'>Sửa</a>
      </td>
    </tr>
    <?php }?>

  </tbody>
</table>
<?php $paging->createLinks()?>
