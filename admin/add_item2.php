<?php
include "..//dbcon.php";
include "navbar.php";

if (isset($_SESSION["admin"])) {
    $name = $_SESSION["admin"];
} else {
    header("location:index.php");
}
$sql = "SELECT * FROM `category`";
$all_categories = mysqli_query($con,$sql);
if (isset($_POST['submit'])) 
{
    $name = mysqli_real_escape_string($con,$_POST['item_name']); 
     $id = mysqli_real_escape_string($con,$_POST['cat_id']); 
    $sql =  "INSERT INTO `items`(`item_id`,`item_name`,`item_price`,`item_desc`, `cat_id`) VALUES ('$name','$id')";

}
?>
<html>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
    <main class="body-content">
        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">
            <div class="row">
                 <div class="col-xl-6 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                        <div class="ms-panel-header">
                            <h6>Add Items</h6>
                        </div>
                        <div class="ms-panel-body">
                            <form  action="" method="POST" class="needs-validation clearfix" novalidate>

                            <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom18">Item id</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="validationCustom18" placeholder="Item Name" value="Pizza" required type="text" id="item_name" name="item_name">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom18">Item Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="validationCustom18" placeholder="Item Name" value="Pizza" required type="text" id="item_name" name="item_name">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom22">Select Catagory</label>
                                        <div class="input-group">
                                            <select class="form-control" id="validationCustom22" name="category" required>
                                            
                                            <?php 

                while ($category = mysqli_fetch_array($all_categories,MYSQLI_ASSOC)):; 
            ?>
                                                <option value="<?php echo $category["cat_id"];?>"> <?php echo $category["cat_name"]; ?> </option>
                                                <?php 
                endwhile; 
            ?> 

                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a Catagory.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom25">Price</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="validationCustom25" placeholder="100 rs" required type="text" id="item_price" name="item_price">
                                            <div class="invalid-feedback">
                                                Price
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom12">Description</label>
                                        <div class="input-group">
                                            <textarea rows="5" id="validationCustom12" class="form-control" placeholder="Message" required type="text" id="item_desc" name="item_desc"></textarea>
                                            <div class="invalid-feedback">
                                                Please provide a message.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12 mb-3">
                                        <label for="validationCustom12">Item Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="validatedCustomFile">
                                            <label class="custom-file-label" for="validatedCustomFile">Upload Images...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div> -->
                                </div>
                        </div>
                        <div class="ms-panel-header new">
                            <button class="btn btn-secondary d-block" type="submit">Save</button>
                        </div>
                    </div>




                    </form>

                </div>
            </div>

        </div>


        </div>
        </div>
        </div>
        </form>

        </div>
        </div>

        </div>



        </div>
        </div>


    </main>

</body>

</html>