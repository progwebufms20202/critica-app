<?php if (is_null($data[1]) || count($data[1]) === 0) { ?>
    <li>
        Nenhuma obra encontrada :(
    </li>
<?php } else { ?>
    <?php foreach ($data[1] as $critica) { ?>
        <li>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']->email == $critica->emailUsuario) { ?>
                <button type="button" style="color:white" class="close" aria-label="Close" onclick="openModal(<?= $critica->criticaID ?>)">
                    <span aria-hidden="true">×</span>
                </button>
            <?php } ?>
            <div class="review-header">
                <div class="flex">
                <span class="body-m flex"><?=$critica->titulo?>   
                <div class="separator"></div>
                <div class="estrelas">
                <label for="cm_star-1"><i class="fa"></i></label>
                <input type="radio" id="_star-1" name="nota" value="1" <?=$critica->nota == 1? 'checked': '' ?> disabled />
                <label for="cm_star-2"><i class="fa"></i></label>
                <input type="radio" id="_star-2" name="nota" value="2" <?=$critica->nota == 2? 'checked': '' ?> disabled />
                <label for="cm_star-3"><i class="fa"></i></label>
                <input type="radio" id="_star-3" name="nota" value="3" <?=$critica->nota == 3? 'checked': '' ?> disabled />
                <label for="cm_star-4"><i class="fa"></i></label>
                <input type="radio" id="_star-4" name="nota" value="4" <?=$critica->nota == 4? 'checked': '' ?> disabled/>
                <label for="cm_star-5"><i class="fa"></i></label>
                <input type="radio" id="_star-5" name="nota" value="5" <?=$critica->nota == 5? 'checked': '' ?> disabled />
              </div></span>
             
            </div>
            <div class="review-info">
                <span><?=$critica->data?></span>
                <div class="separator"></div>
                <span><?=$critica->nomeUsuario?></span>
            </div>

            <div >

            <p>
                <?= $critica->comentario ?>

            </p>
            
            </li>

    <?php } ?>
<?php } ?>

           
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Você realmente quer excluir sua crítica?</h5>
                        <button type="button" class="close" aria-label="Close" onclick="closeModal()">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <input type="hidden" name="critica/excluir" value="excluir">

                            <input id="inputID" type="hidden" name="criticaID" value="">
                            <input type="hidden" name="obraID" value=<?= $data[0]->obraID ?>>

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