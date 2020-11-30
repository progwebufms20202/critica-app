 <?php if (is_null($data) || count($data) === 0) { ?>
     <tr>
         <td colspan="3" class="border text-center h-24">Nenhuma obra encontrada :(</td>
     </tr>
 <?php } else { ?>
     <?php foreach ($data as $obra) { ?>


        <div>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']->email == $obra->emailUsuario) { ?>
                 <button class="x"type="button" style="color:white" class="close" aria-label="Close" onclick="openModal(<?= $obra->obraID ?>)">
                     <span aria-hidden="true">×</span>
                 </button>
        <?php } ?>

     
         <button id=obraID onclick="a(<?= $obra->obraID ?>);">

             
             <div class="card">
                 <img id="imgCardObra" src="publico/servidor/<?= $obra->imagem ?>" \>

                 <div class="card-container">
                     <div class="card-titulo">
                         <?= $obra->titulo ?>


                     </div>
                 </div>

             </div>

         </button>
        </div>
     
     <?php } ?>
 <?php } ?>

 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Você realmente quer excluir esta obra?</h5>
                 <button type="button" class="close" aria-label="Close" onclick="closeModal()">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="POST">
                     <input type="hidden" name="obra/excluir" value="excluir">

                     <input id="inputID" type="hidden" name="obraID" value="">


                     <div class="container">
                         <button type="submit" class=" margin buttonClass btn-primary ">Sim</button>
                         <button type="button" class=" margin buttonClass btn-secondary" onclick="closeModal()">não</button>

                     </div>

             </div>
             </form>
         </div>
     </div>
 </div>
 </div>
 <div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
 <script type="text/javascript" src="publico/scripts/cards-critica.js"></script>
 <script type="text/javascript" src="publico/scripts/cards-obra.js"></script>