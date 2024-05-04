<?php include('C:/xampp/htdocs/SP/admin/includes/header.php');?>
<?php
$conn=mysqli_connect('localhost','root','','sp');
if(!$conn){
    die("Connection failed: ". mysqli_connect_errno());
}
if(isset($_POST['submit'])){
    $name=$_POST['pname'];
    $description=$_POST['des'];
    $price=$_POST['price'];
    $file=$_FILES['image'];
    $quantity=$_POST['qty'];

    // print_r($file);
    $filename=$file['name'];
    $filepath=$file['tmp_name'];
    $fileerror=$file['error'];
    
    if($fileerror==0){
        $destfile='images/'.$filename;
        // echo "$destfile";
        move_uploaded_file($filepath,$destfile);

        $sql="INSERT INTO product(Name,Description,Price,Image,Quantity) values('$name','$description','$price','$destfile','$quantity')";

        $query=mysqli_query($conn,$sql);

        if($query){
         //header('lcoation:index.php');
        }
        else{
            echo "Not inserted";
        }

    }

}
else{
    // echo "No button has been clicked";
}
?>

<div class="container">
 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Product</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="#" enctype="multipart/form-data">
                <label for="">Name</label>
                    <input type="text" name="pname" class="form-control" >
                <label for="">Description</label>
                    <input type="text"  name="des" class="form-control" >
                <label for="">Price</label>
                    <input type="text"  name="price" class="form-control" >
                <label for="">Image</label>
                    <input type="file" name="image" class="form-control" >
                <label for="">Quantity</label>
                    <input type="text"  name="qty"class="form-control" >
                <input type="submit" name="submit">
                </form>
            </div>
        </div>
    </div>
 </div>
</div>
