
   
      function openModaldetalhe() {
        document.getElementById("backdrop1").style.display = "block"
        document.getElementById("exampleModal1").style.display = "block"
        document.getElementById("exampleModal1").className += "show"
      }

      function closeModaldetalhe() {
        document.getElementById("backdrop1").style.display = "none"
        document.getElementById("exampleModal1").style.display = "none"
        document.getElementById("exampleModal1").className += document.getElementById("exampleModal1").className.replace("show", "")
      }
      // Get the modal
      var modal = document.getElementById('exampleModal1');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          closeModaldetalhe()
        }
      }