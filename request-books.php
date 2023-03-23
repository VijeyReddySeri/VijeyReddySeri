<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_POST['update'])){    
$sid=$_SESSION['stdid'];  
$bookname=$_POST['bookname'];

$con=mysqli_connect('localhost','root','','library');

$run=mysqli_query($con,"INSERT INTO `requstforbook`(`sid`, `book`,`status`) VALUES ('$sid','$bookname',0)");


echo '<script>alert("Your request has been send!")</script>';
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Student Signup</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">My Profile</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           My Profile
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post">
<?php 
  $sid=$_SESSION['stdid'];

?>
<div class="form-group">
<label>Student ID : </label>
<input class="form-control" type="text" name="sid" value="<?php echo $sid;?>" required>
</div>

<div class="form-group">
<label>SELECT BOOK</label>
<select name="bookname" class="form-control" required>
<option value="">--select--</option>
<option 
<?php
$con=mysqli_connect('localhost','root','','library');
$run=mysqli_query($con,"SELECT `BookName`,`ISBNNumber` FROM `tblbooks`");
$i=1;
while($row=mysqli_fetch_array($run)){
   
?>

<option value="<?php echo $row['ISBNNumber']; ?>"><?php echo $row['BookName']; ?></option>

<?php } $i++; ?>



</select>
    </div>

                              
<button type="submit" name="update" class="btn btn-primary" id="submit">Submit </button>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
