<!-- Top File Attached -->
<?php include("attach/top.php"); ?>

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

<center class="col-md-12">
<div id="done col-md-4" style="margin: auto;">
  <div class="" style="margin-top: 20px;">

    <!-- Uplaod Image -->
    <label class="label" data-toggle="tooltip" title="">
      <img class="rounded" id="avatar" src="images/upload.jpg" alt="No Image" style="width: auto;height: 300px;">
      <input type="file" class="sr-only" id="input" name="image" accept="image/*">
    </label>

    <!-- Uploading Progress -->
    <div class="progress">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
    </div>
    
    <!-- Alert -->
    <div class="alert" role="alert"></div>

    <!-- Button -->
    <center class="col-md-12">
      <div class="col-md-12" style="border: 1px solid #bfbcbc5c; margin: 20px 0px;"></div>
        <a href="see-images.php" class="btn btn-primary btn-lg">See Cropped Images <i class="icofont-arrow-right"></i></a>
    </center>
  
    <!-- Crop Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Crop the image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <!-- Modal Body -->
          <div class="modal-body">
            <div class="img-container" style="margin-bottom: 10px;">
              <img id="image" src="images/a.jpg">
            </div>
            <input type="range" min="0" max="360" value="0" class="slider" id="myRange" style="margin-top: 10px;">
          </div>

          <!-- Rotation Hidden Value -->
          <p style="display:none">Value: <span id="demo"></span></p>

          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="crop">Crop</button>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>
</center>

<!-- ----------------------------- -->

</div>
</div>

<!-- Footer START -->
<div class="col-md-12 fixed-bottom" style="height: 50px; background-color: #3d3d3d; line-height: 50px; color: white;"><center>Designed & Developed By DaSkillSet</center></div>
<!-- Footer END -->

<script src="js/cropscript.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="js/daskillset-square.js"></script>
</body>
</html>
