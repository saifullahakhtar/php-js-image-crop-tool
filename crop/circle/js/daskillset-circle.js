    window.addEventListener('DOMContentLoaded', function () {
      var avatar = document.getElementById('avatar');
      var image = document.getElementById('image');
      var input = document.getElementById('input');
      var slider = document.getElementById("myRange");
      var output = document.getElementById("demo");
      var $progress = $('.progress');
      var $progressBar = $('.progress-bar');
      var $alert = $('.alert');
      var $modal = $('#modal');
      var cropper;
      var rot = 0;
      var zom = 0;

      $('[data-toggle="tooltip"]').tooltip();

      input.addEventListener('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
          input.value = '';
          image.src = url;
          $alert.hide();
          $modal.modal('show');
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) 
        {
          file = files[0];

          if (URL)
          {
            done(URL.createObjectURL(file));
          } 
          else if (FileReader) 
          {
            reader = new FileReader();
            reader.onload = function (e) {
              done(reader.result);
            };
            reader.readAsDataURL(file);
          }
        }

      });

      // AREA CODE FOR CROPING

      $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
          ready: function () {
            croppable = true;
            var data = {height:200,width:200};
            cropper.setData(data);
            cropper.setCropBoxData(data);
          },
        });
      }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
      });


  slider.oninput = function() {
    var newval;
    output.innerHTML = this.value;
    newval = this.value;
    if(newval > rot)
    {
      rot = newval - rot;
      cropper.rotate(rot);
    }
    else
    {
      rot = rot - newval;
      cropper.rotate(-rot);
    }
    rot = this.value;

}

      // CROP IMAGE CODE
      function getRoundedCanvas(sourceCanvas) 
      {
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        var width = sourceCanvas.width;
        var height = sourceCanvas.height;

        canvas.width = width;
        canvas.height = height;
        context.imageSmoothingEnabled = true;
        context.drawImage(sourceCanvas, 0, 0, width, height);
        context.globalCompositeOperation = 'destination-in';
        context.beginPath();
        context.ellipse(width/2, height/2, 100, 100, 0,0, 2 * Math.PI,true);
        context.fill();
        return canvas;
      }

      document.getElementById('crop').addEventListener('click', function () {
        var initialAvatarURL;
        var canvas;

        $modal.modal('hide');

        if (cropper) 
        {
          canvas = cropper.getCroppedCanvas({
            width: 200,
            height: 200,
          });

          canvas = getRoundedCanvas(canvas);

          initialAvatarURL = avatar.src;
          avatar.src = canvas.toDataURL();
          $progress.show();
          $alert.removeClass('alert-success alert-warning');
          canvas.toBlob(function (blob) {
            var formData = new FormData();

            formData.append('avatar', blob/*, 'avatar.jpg'*/);
            $.ajax('upload.php', {
              method: 'POST',
              data: formData,
              processData: false,
              contentType: false,


              xhr: function () {
                var xhr = new XMLHttpRequest();

                xhr.upload.onprogress = function (e) {
                  var percent = '0';
                  var percentage = '0%';

                  if (e.lengthComputable) {
                    percent = Math.round((e.loaded / e.total) * 100);
                    percentage = percent + '%';
                    $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                  }
                };

                return xhr;
              },

              success: function () {
                $alert.show().addClass('alert-success').text('Upload successfully');
              },

              error: function () {
                avatar.src = initialAvatarURL;
                $alert.show().addClass('alert-warning').text('Upload error');
              },

              complete: function () {
                $progress.hide();
              },
            });
          });
        }
      });

    });