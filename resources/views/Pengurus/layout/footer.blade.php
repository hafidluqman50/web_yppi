
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->{{-- 
    <div class="float-right d-sm-none d-md-block">
      Anything you want
    </div> --}}
    <!-- Default to the left -->
    <strong>Copyright &copy; YPPI-HUD Samarinda {{ date('Y') }}
  </footer>
</div>
<!-- ./wrapper -->

<script src="{{asset('backend-assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend-assets/dist/js/adminlte.js')}}"></script>
<script src="{{asset('backend-assets/dist/js/demo.js')}}"></script>
{{-- <script src="{{asset('backend-assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script> --}}
{{-- <script src="{{asset('backend-assets/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script> --}}
<script src="{{asset('backend-assets/plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{asset('backend-assets/plugins/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('backend-assets/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{ asset('backend-assets/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend-assets/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function(){
    $('.table').DataTable({scrollX:true});
    tinymce.init({
      selector:'textarea',
      height: 500,
      theme: 'modern',
      plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern help',
      toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor fontsizeselect fontselect | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
      image_advtab: true,
      fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
      image_class_list: [
          {title: 'Img Fluid', value: 'img-fluid'},
      ],
      image_upload_credential:true,
      automatic_uploads: true,
      // URL of our upload handler (for more details check: https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url)
      // images_upload_url: 'postAcceptor.php',
      // here we add custom filepicker only to Image dialog
      file_picker_types: 'image', 
      // and here's our custom image picker
      file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        
        // Note: In modern browsers input[type="file"] is functional without 
        // even adding it to the DOM, but that might not be the case in some older
        // or quirky browsers like IE, so you might want to add it to the DOM
        // just in case, and visually hide it. And do not forget do remove it
        // once you do not need it anymore.

        input.onchange = function() {
          var file = this.files[0];
          
          var reader = new FileReader();
          reader.onload = function () {
            // Note: Now we need to register the blob in TinyMCEs image blob
            // registry. In the next release this part hopefully won't be
            // necessary, as we are looking to handle it internally.
            var id = 'blobid' + (new Date()).getTime();
            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);

            // call the callback and populate the Title field with the file name
            cb(blobInfo.blobUri(), { title: file.name });
          };
          reader.readAsDataURL(file);
        };
        input.click();
      },
      templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
      ],
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ]
    });
  });
</script>
</body>
</html>