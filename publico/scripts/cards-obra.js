
    function a(obraID) {
        
        window.location.href="index.php?Obra/detalhe="+obraID;
                                        
    }
    function openModal( id) {      
        console.log('tesobrate');
        document.getElementById("inputID").value = id;
        document.getElementById("backdrop").style.display = "block"
        document.getElementById("exampleModal").style.display = "block"
        document.getElementById("exampleModal").className += "show"
    }

    function closeModal() {
        document.getElementById("backdrop").style.display = "none"
        document.getElementById("exampleModal").style.display = "none"
        document.getElementById("exampleModal").className += document.getElementById("exampleModal").className.replace("show", "")
    }
    // Get the modal
    var modal = document.getElementById('exampleModal');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal()
        }


    }

        
      function showPreview(event) {
        if (event.target.files.length > 0) {
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
          preview.style.display = "block";
        }
      }
