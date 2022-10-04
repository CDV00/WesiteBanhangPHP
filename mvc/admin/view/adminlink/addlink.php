
<div class="col-md-9">
    <h2>ADD PRODUCT</h2>
    <div class="row btn-warning">
        <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
    </div>
    <div class="row">
        <form action="" method=post enctype="multipart/form-data">
            <table>
                <tr>
                    <td class="col-md-3">
                        <label for="inputTitle">Title</label>
                    </td>
                    <td><input type="text" name="inputTitle" required></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputPosition">Position</label>
                    </td>
                    <td><input type="text" name="inputPosition"></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputFileUpload">Image</label>
                    </td>
                    <td><input type="file" name="inputFileUpload"></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputLink">Link</label>
                    </td>
                    <td><input type="text" name="inputLink"></td>
                </tr>

                
                <tr>
                    <td class="col-md-3">
                        <label for="inputOrders">Orders</label>
                    </td>
                    <td>
                        <input type="number" name="inputOrders" step="1" min=0>
                    </td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputTrash">Trash</label>
                    </td>
                    <td>
                        <select name="inputTrash" id="inputTrash"require>
                          
                            <option value="0">không</option>
                            <option value="1">trash</option>
                        
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td class="col-md-3">
                        <label for="inputStatus">Status</label>
                    </td>
                    <td>
                        <select name="inputStatus" id="inputStatus"require>
                          
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện</option>
                        
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
        <p> </p>
    </div>
</div>