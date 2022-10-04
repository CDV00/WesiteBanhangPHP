<?php
 $oldcategory=$data['oldcategory'];

?>

<div class="col-md-9">
    <h2>UPDATE CATEGORY</h2>
    <div class="row btn-warning">
        <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
    </div>
    <div class="row">
        <form action="" method=post enctype="multipart/form-data">
            <table>


                <tr>
                    <td class="col-md-3">
                        <label for="inputCategoryName">CategoryName</label>
                    </td>
                    <td><input type="text" name="inputCategoryName" required value="<?php echo $oldcategory['catName'];?>"></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputAlias">Alias</label>
                    </td>
                    <td><input type="text" name="inputAlias" value="<?php echo $oldcategory['alias'];?>"></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputParentId">Parent Id</label>
                    </td>
                    <td><input type="text" name="inputParentId" value="<?php echo $oldcategory['parentId'];?>"></td>
                </tr>

                <tr>
                    <td class="col-md-3">
                        <label for="inputStatus">Status</label>
                    </td>
                    <td>
                        <select name="inputStatus" id="inputStatus"require>
                          
                            <option value="0"<?php if($oldcategory['status']==0)echo'selected'?>>Ẩn</option>
                            <option value="1"<?php if($oldcategory['status']==1)echo'selected'?>>Hiện</option>
                        
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputTrash">Trash</label>
                    </td>
                    <td>
                        <select name="inputTrash" id="inputTrash"require>
                          
                            <option value="0"<?php if($oldcategory['trash']==0)echo'selected'?>>Không</option>
                            <option value="1"<?php if($oldcategory['trash']==1)echo'selected'?>>Trash</option>
                        
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <input type="submit" name="submit" value="submit">
                    </td>
                    <td>
                        <input type="reset" name="reset" value="reset">
                    </td>
                </tr>
            </table>
        </form>
        <p> </p>
    </div>
</div>