$(document).ready(function() {
    $('#summernote').summernote({
        height:'200px',
        callbacks:{
            onImageUpload: function (image) {
                  uploadImage(image[0]);
            },
            onMediaDelete : function (target) {
                  deleteImage(target[0].dataset.filename);
            }
        }
    });
  });
    function uploadImage(image) {
        var data = new FormData();
        data.append("image",image)
        $.ajax({
          headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            type: "POST",
            url: '{{ route("editor.fileUpload") }}',
            data: data,
            cache: false,
              contentType: false,
              processData: false,
            success: function (res) {

              $('#summernote').summernote("insertImage",res.url,res.fileName);
            },
            error: function (data) {
              console.log(data);
              }
        });
      }

      function deleteImage(filename) {
          $.ajax({
              headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
              type: "POST",
              url: '{{ route("editor.fileDelete")}}',
              data: {filename:filename,
              },
              cache: false,
              success: function (response) {
                  console.log(response);
              },
              error: function (data) {
                  console.log(data);
              }
          });
      }
