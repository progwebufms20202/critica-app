
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



      function showPreview(event) {
        if (event.target.files.length > 0) {
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
          preview.style.display = "block";
        }
      }


      function hiddenInput(value) {
        var episodios = document.getElementById('episodios');
        var temporadas = document.getElementById('temporadas');
        var paginas = document.getElementById('paginas');
        var duracao = document.getElementById('duracao');
        episodios.value = null;
        temporadas.value = null
        paginas.value = null;
        duracao.value = null;
        episodios.required = false;
        paginas.required = false;
        duracao.required = false;
        temporadas.required = false;

        if (value == "Serie") {

          episodios.style.display = "flex";
          paginas.style.display = "none";
          duracao.style.display = "none";
          temporadas.style.display = "flex";

          episodios.required = true;
          temporadas.required = true;



        } else if (value == "Livro") {

          episodios.style.display = "none";
          paginas.style.display = "flex";
          duracao.style.display = "none";
          temporadas.style.display = "none";


          paginas.required = true;



        } else if (value == "Filme") {

          episodios.style.display = "none";
          paginas.style.display = "none";
          duracao.style.display = "flex";
          temporadas.style.display = "none";

          duracao.required = true;



        }

      }