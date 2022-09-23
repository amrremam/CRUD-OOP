<?php include 'header.php' ?>
<?php  $page_active = "home"; ?>
<?php include 'nav.php' ?>

<?php   
        if(isset($_GET['id']) &&  is_numeric($_GET['id']) ):
        $row = $db->find('employees',$_GET['id']); 
        if($row): 
?>


<div class="container">
    <div class="row">
            <div class="col-sm-12">
                <h2 class="p-3 col text-center mt-5 text-white bg-primary">Delete Employees</h2>
            </div>
            <h2 class="p-2 col text-center mt-5  alert alert-success"> 
                <?php echo $db->delete("employees",$row['id']); ?>
            </h2>
        </div>
    </div>

<body style="background-color: grey;"></body>
    
    <?php  endif;  ?>
    <?php  endif;  ?>

<?php include('footer.php'); ?>