<?php
    $links = $data['links'];
    $paging = $data['paging'];

?>


<a class="btn btn-primary" href="#" role="button">Tất cả sản phẩm</a>
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
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Position</th>
      <th scope="col">Link</th>
      <th scope="col">Trash</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i=1;
      foreach($links as $l){
    ?>

    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td><?php echo $l['id'] ?></td>
      <td><?php echo $l['title'] ?></td>
      <td><?php echo $l['Position'] ?></td>
      <td><?php echo $l['link'] ?></td>
      <td><?php echo $l['Trash'] ?></td>

      <td>
        <a href="<?php echo BASE_URL?>adminlink/linkToggleStatus/<?php echo $l['id']?>">
          <?php 
            if($l['status']==1)
              echo'<i class="fas fa-check text-primary"></i>'; 
            else 
              echo'<i class="fas fa-times text-danger"></i>'; 
          ?>
        </a>
      </td>
      <td>
        <a href="<?php echo BASE_URL?>adminlink/linkToggleTrash/<?php echo $l['id']?>" onclick="return confirm('Bạn có chắc chăn xóa link này?');">Xóa</a> |
        <a href='<?php echo BASE_URL.'adminlink/updatelink/'.$l['id']?>'>Sửa</a>
      </td>
    </tr>
    <?php }?>

  </tbody>
</table>
<?php $paging->createLinks()?>
