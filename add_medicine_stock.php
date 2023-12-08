<?php
 include_once 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manage Medicines</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/manage_medicine.js"></script>
    <script src="js/validateForm.js"></script>
    <script src="js/restrict.js"></script>
  </head>
  <body>
    <!-- including side navigations -->
    <?php include("sections/sidenav.html"); ?>

    <div class="container-fluid">
      <div class="container">

        <!-- header section -->
        <?php
          require "php/header.php";
          createHeader('shopping-bag', 'Manage Medicines', 'Add New Medicine');
        ?>
        <!-- header section end -->

        <!-- form content -->
        <div class="row">

        <form action="" method="post" class="container">
      <table class="table table-responsive">
            <tr>
            <td>
                    <label for="">Name</label>
                </td>
                <td class="form-group col-md-10">
                <select name="combo" style="border-radius: 6px;">
                    <option value="" >Choose Medicine From Below
                   
                    <?php
                       
                        $sql = "SELECT NAME FROM medicines";
                        $result = mysqli_query($con, $sql);
                    
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    echo '<option value="'.$row['NAME'].'">'.$row['NAME'].'</option>';
                                }
                            }

                    ?>

                    </option>
                </select>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label for="">Batch ID</label>
                </td>
                <td class="form-group col-md-6">
                <input type="text" name="batch_id" class="form-control" placeholder="Enter Batch Id" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">EXPIRY_DATE</label>
                </td>
                <td class="form-group col-md-6">
                <input type="text" name="expiry_date" class="form-control" placeholder="Enter Expiry Date" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Quantity</label>
                </td>
                <td class="form-group col-md-6">
                <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" value="">
                </td>
            </tr>
          
            <tr>
                <td>
                    <label for="">MRP</label>
                </td>
                <td class="form-group col-md-6">
                <input type="number" name="mrp" class="form-control" placeholder="Enter MRP" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Rate</label>
                </td>
                <td class="form-group col-md-6">
                <input type="number" name="rate" class="form-control" placeholder="Enter Rate" value="">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="update" class="btn btn-info" title="Click for Update"><span><i class="fa-solid fa-file-pen"></i></span> Submit</button>

                    
                </td>
            </tr>
        </table>
        <?php
if(isset($_POST['update']))
{
$name = $_POST['combo'];
$batch_id = $_POST['batch_id'];
$expiry_date = $_POST['expiry_date'];
$quantity = $_POST['quantity'];
$mrp = $_POST['mrp'];
$rate = $_POST['rate'];

$sq1 = "INSERT INTO medicines_stock(NAME,BATCH_ID,EXPIRY_DATE,QUANTITY,MRP,RATE)
VALUES('".$name."','".$batch_id."','".$expiry_date."','".$quantity."','".$mrp."','".$rate."')";
$query = mysqli_query($con,$sq1);
if($query) 
{
    echo "New Medicine Added Successfully";
} 
  else {
    echo "Error Inserting";
  }
}

?>
      </form>


        </div>
        <!-- form content end -->
        <hr style="border-top: 2px solid #ff5252;">
      </div>
    </div>
  </body>
</html>
