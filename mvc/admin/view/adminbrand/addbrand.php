
<div class="col-md-9">
    <h2>ADD BRAND</h2>
    <div class="row btn-warning">
        <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
    </div>
    <div class="row">
        <form action="" method=post enctype="multipart/form-data">
            <table>
                <tr>
                    <td class="col-md-3">
                        <label for="inputBrandName">Brand Name</label>
                    </td>
                    <td><input type="text" name="inputBrandName" required></td>
                </tr>
                <tr>
                    <td class="col-md-3">
                        <label for="inputAlias">Alias</label>
                    </td>
                    <td><input type="text" name="inputAlias"></td>
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
    </div>
</div>