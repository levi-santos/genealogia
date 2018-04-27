

<html>
<head>
   <title>Multiple Upload Ajax</title>
</head>
<body>
   <form id="formImage" style="display:none">
      <input type="file" id="fileUpload" name="fileUpload[]" multiple onchange="saveImages()">
   </form>

   <div id="btnFake" style="background:#CCC; width:100px; height:100px; cursor:pointer;"></div>

   <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="//malsup.github.io/jquery.form.js"></script>

   <script>
      document.getElementById('btnFake').addEventListener('click', function(){
         document.getElementById('fileUpload').click();
      });

      function saveImages()
      {
         $('#formImage').ajaxSubmit({
            url  : 'multiple-upload-ajax.php',
            type : 'POST'
         });
      }
   </script>
</body>
</html>
