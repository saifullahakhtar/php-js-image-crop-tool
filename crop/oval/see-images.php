<!-- Top File Attached -->
<?php
include("attach/top.php");

// Attach Files
include("attach/connection.php");
include("attach/classes/queries.php");

// Run Queries
$queries = new Queries;
?>

</head>
<body>

<!-- CONTAINER -->
<div class="container">

<!-- ROW -->
<div class="row content-block">

<div class="col-md-12">
    <center class="title-design">
        <h2><img src="images/logo.png" width="500px"></h2>
    </center>
</div>

<div class="col-md-12" style="border: 1px solid #bfbcbc5c; margin: 20px 0px;"></div>

<!-- -------------------------------- -->

<center class="col-md-12 row">

<?php
// Get Images
$getImages = "SELECT * FROM image_crop WHERE value='Oval'";
$queries->query($getImages);
if($queries->count() > 0):
    while($fetchImages = $queries->fetch()):
        $imageID = $fetchImages->id;
        $image = $fetchImages->image;
        echo('<div class="col-md-3">');
        echo('<img src="images/cropped/'.$image.'">');
        echo('<form action="" method="POST">');
        echo('<input type="hidden" name="removeID" value="'.$imageID.'">');
        echo('<button class="btn btn-danger mt-2 mb-5" name="remove"><i class="icofont-ui-delete"></i> Delete</button>');
        echo('</form>');
        echo('</div>');
    endwhile;
else:
    echo('<center class="col-md-12" style="color: red;"><h3>No Image</h3></center>');
endif;

// Remove Image
if(isset($_POST['removeID'])):
    $remove = $_POST['removeID'];
    $removeIt = "DELETE FROM image_crop WHERE id='$remove'";
    if($queries->query($removeIt)):
       header("refresh: 0");
    endif;
endif;
?>

<!-- Button -->
<center class="col-md-12">
  <div class="col-md-12" style="border: 1px solid #bfbcbc5c; margin: 20px 0px;"></div>
    <a href="index.php" class="btn btn-primary btn-lg"><i class="icofont-arrow-left"></i> Back To Crop System</a>
</center>

</center>

<!-- ----------------------------- -->
</div>
</div>

<!-- Footer START -->
<div class="col-md-12 fixed-bottom" style="height: 50px; background-color: #3d3d3d; line-height: 50px; color: white;"><center>Designed & Developed By DaSkillSet</center></div>
<!-- Footer END -->

</body>
</html>
