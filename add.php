<?php 
include('header.php');
$page_active = "home";
include('nav.php'); 
?>

<?php

$error = '';
$departments = array("cs","it","se");
$success = '';

if(isset($_POST['submit'])){
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $department = filter_var($_POST['department'],FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
}
    if(empty($name) or empty($email) or empty($department) or empty($password)){
    $error = "PLZ Type All Fields";
    }
else{
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        
        $department = strtolower($department);

        if(in_array($department,$departments))
        {
            if(strlen($password) >= 6){
                $db = new Database();

                $hashPass = $db->enc_password($password);

                $sql = "INSERT INTO employees(`name`,`email`,`department`,`password`) VAlUES ('$name','$email','$department','$hashPass')";
                
                $success = $db->insert($sql);

            }else{
                $error = "plz type valid pass";
            }

        }
        else{
            $error = "this department not found";   
        }

    }else{
        $error = "plz type a valid email";
    }
}

?>

<div class="container">
        <div class="row">
        <div class="col-sm-12">
        <h2 class="p-3 col text-center mt-5 text-white bg-primary">  Add New Employee </h2>
</div>
        
        <div class="col-sm-12">
            <?php if($error != ''):?>
        <!-- ##### lw error msh fady etb3holy laken lw fady 3ady w ewsel le success ######-->
        <h2 class="p-2 col text-center mt-5  alert alert-danger"> <?php echo $error; ?>  </h2>
        <?php endif;?>
            <?php if($success != ''):?>
        <h2 class="p-2 col text-center mt-5  alert alert-danger"> <?php echo $success; ?>  </h2>
        <?php endif;?>
                
<div class="container" style="margin: bottom 100px;">
<div class="row">
<div class="col-sm-12">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name"  placeholder="Enter name">
            </div>
            
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" name="department" class="form-control" id="department"  placeholder="Enter department">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>


        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
                
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<body style="background-color: grey;"></body>
<?php include('footer.php'); ?>
