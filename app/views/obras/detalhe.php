<!DOCTYPE html>
<html lang="en">

<head>
  <title>Detalhe</title>

  <head>

    <?php include('app/views/shared/header.php') ?>

    <main class="container">
      <section id="page-details" class="content">
        <header>
          <div>
          

            <h1><?= $data[0]->titulo ?></h1>
            <div class="body-m piece-info">
              <span>+ <?= $data[0]->classificacaoIndicativa ?></span>
              <div class="separator"></div>

              <?php if  ($data[0]->duracao != 0) { ?>                 
                <span><?= $data[0]->duracao ?> min</span>
                <div class="separator"></div>
             <?php } ?>
             
             <?php if  ($data[0]->episodios != 0) { ?>                 
                <span><?= $data[0]->episodios ?> episódio(s)</span>
                <div class="separator"></div>
             <?php } ?>
             
             <?php if  ($data[0]->temporadas != 0) { ?>                 
                <span><?= $data[0]->temporadas ?> temporada(s)</span>
                <div class="separator"></div>
             <?php } ?>
             
             <?php if  ($data[0]->paginas != 0) { ?>                 
                <span><?= $data[0]->paginas ?> página(s)</span>
                <div class="separator"></div>
             <?php } ?>
             
              <span><?= $data[0]->genero ?></span>
              <div class="separator"></div>
              <span><?= $data[0]->dataLancamento ?></span>
            </div>

            <div class="plot">
              <h3>Enredo</h3>
              <p class="body-m">
                <?= $data[0]->enredo ?>
              </p>
            </div>
          </div>
          <img class="responsive-img" src="publico/servidor/<?= $data[0]->imagem ?>" \>          
        </header>

        <div>
          <header class="review-section">
            <h3>Críticas dos usuários</h3>
            <button class="btn-primary" onclick="openModaldetalhe()">Adicionar crítica</button>
          </header>

          <ul class="reviews">
            <?php include('app/views/shared/cards-critica.php') ?>
          </ul>
        </div>
      </section>
    </main>


    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?= $data[0]->titulo ?></h5>
            <button type="button" class="close" aria-label="Close" onclick="closeModaldetalhe()">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
              <input type="hidden" name="critica/method" value="inserir">   
                
              <input  type="hidden" name="obraID" value=<?=$data[0]->obraID?>>        
              <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
              <div class="estrelas">
                <label for="cm_star-1"><i class="fa"></i></label>
                <input type="radio" id="cm_star-1" name="nota" value="1" checked />
                <label for="cm_star-2"><i class="fa"></i></label>
                <input type="radio" id="cm_star-2" name="nota" value="2" />
                <label for="cm_star-3"><i class="fa"></i></label>
                <input type="radio" id="cm_star-3" name="nota" value="3" />
                <label for="cm_star-4"><i class="fa"></i></label>
                <input type="radio" id="cm_star-4" name="nota" value="4" />
                <label for="cm_star-5"><i class="fa"></i></label>
                <input type="radio" id="cm_star-5" name="nota" value="5" />
              </div>
              <input  class="regular-input" id="titulo" name="titulo" placeholder="Título da minha crítica" required  autocomplete="off"></input>
              <textarea class="textarea" id="comentario" name="comentario" placeholder="Crítica" required  autocomplete="off"></textarea>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeModaldetalhe()">Close</button>
            <button type="submit" class="buttonClass btn-primary ">Enviar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-backdrop fade show" id="backdrop1" style="display: none;"></div>




    <script type="text/javascript" src="publico/scripts/obra-detalhe.js"></script>
    </body>

</html>