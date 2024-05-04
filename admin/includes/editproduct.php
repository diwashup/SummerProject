<?php
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','sp');
if(isset($_POST['submit'])){
    $pname=$_POST['pname'];
    $pdesc=$_POST['desc'];
    $pprice=$_POST['price'];
    $pqty=$_POST['qty'];
    $id=$_POST['id'];
    $sql="UPDATE product set Name='$pname',Description='$pdesc',Price='$pprice',Quantity='$pqty' where Product_id='$id'";
    mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn)==1){
        header('location:products.php');
    }
    else{
        echo "Data update failed".mysqli_error($conn);
    }
}
$sql1="select * from product where Product_id =$id";
$res=mysqli_query($conn,$sql1);
$data=mysqli_fetch_assoc($res);



?>
<div class="container">
 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Category</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="#" enctype="multipart/form-data">
                <label for="">Name</label>
                    <input type="text" name="pname" value="<?php echo $data['pname'];?>" class="form-control" >
                <label for="">Description</label>
                    <input type="text"  name="des" value="<?php echo $data['pdesc'];?>"class="form-control" >
                <label for="">Price</label>
                    <input type="text"  name="price" value="<?php echo $data['price'];?>"class="form-control" >
               
                <label for="">Quantity</label>
                    <input type="text"  name="qty" value="<?php echo $data['qty'];?>"class="form-control" >
                <input type="submit" name="submit">
                </form>
            </div>
        </div>
    </div>
 </div>
</div>
