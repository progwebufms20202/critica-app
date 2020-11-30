
      function showPreview(event) {
        if (event.target.files.length > 0) {
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
          preview.style.display = "block";
        }
      }

      function submit() {
 
        var input = document.getElementById("file-ip-1");
        var img = document.getElementById("file-ip-1-preview");

        input.value = img.src;



      }