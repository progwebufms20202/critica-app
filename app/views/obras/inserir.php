<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cadastro</title>

  <head>


    <?php include('app/views/shared/header.php') ?>


    <main class="container">
      <section id="page-cadastro-obra" class="content">
        <!-- <form class="bg-white shadow-md rounded px-8 py-10 mb-4" method="POST"> -->
        <form class="form-obra" method="POST" enctype="multipart/form-data">
          <section class="escolhaimagem">
            <div class="center">
              <div class="form-input">
                <label for="file-ip-1">Escolha a imagem</label>
                <input name=imagem type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);" />
                <div class="preview">
                  <img id="file-ip-1-preview" />
                </div>
              </div>
            </div>
          </section>

          <div class="insert">
            <input id="titulo" name="titulo" type="text" placeholder="Titulo"  required for="titulo"  autocomplete="off"/>

          </div>

          <div class="insert">
            <select id="categoria" name="categoria">
              <option class=".option" value="Filme" selected>Filme</option>
              <option class=".option" value="Serie">Série</option>
              <option class=".option" value="Livro">Livro</option>
            </select>
          </div>

          <div class="insert">
            <input id="duracao" name="duracao" type="text" placeholder="Duração (minutos)" for="duracao" required pattern="[0-9]+$" autocomplete="off"/>
          </div>

          <div class="insert">
            <input id="genero" name="genero" type="text" placeholder="Gênero" required  autocomplete="off"/>
          </div>

          <div class="insert">
            <input id="dataLancamento" name="dataLancamento" type="text" placeholder="Data de Lançamento (__/__/__)" required pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" min="2012-01-01" max="2014-02-18"  autocomplete="off"/>
          </div>

          <div class="insert">
          <input id="classificacaoIndicativa" name="classificacaoIndicativa" type="text" placeholder="Classificação Indicativa (número)" required pattern="[0-9]+$" min="1" max="18"  autocomplete="off"/>
          </div>

          <div class="insert">
            <textarea id="enredo" name="enredo" placeholder="Enredo" required  autocomplete="off"></textarea>
          </div>
          <input onsubmit="submit()" type="submit" class="botaocadastrar" value="Cadastrar" required  autocomplete="off"/>
        </form>
      </section>
    </main>



    <script>


      function showPreview(event) {        
        if (event.target.files.length > 0) {
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
          preview.style.display = "block";
        }
      }
    </script>
    </body>

</html>



