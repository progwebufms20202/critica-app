<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>

    <head>

        <?php include('app/views/shared/header.php') ?>

        <main class="container">
            <section id="page-home" class="content">

                <section class="categorias">
                    <div class="cardCategoria">
                        <div class="circulo">
                            <img src="publico/imgs/2916383.svg"></img>
                        </div>
                        <a href='index.php?home/buscarObraPorCategoria=Filme' class="buttonClass btn-primary">Filmes</a>
                    </div>
                    <div class="cardCategoria">
                        <div class="circulo">
                            <img src="publico/imgs/2232688.svg"></img>
                        </div>
                        <a href='index.php?home/buscarObraPorCategoria=Livro' class="buttonClass btn-primary">Livros</a>
                    </div>
                    <div class="cardCategoria">
                        <div class="circulo">
                            <img src="publico/imgs/2586771.png"></img>
                        </div>
                        <a href='index.php?home/buscarObraPorCategoria=Serie' class="buttonClass btn-primary">Séries</a>
                    </div>
                </section>
                <section class="ultimoslancamentos">
                    <h2>Ultimos Lançamentos</h2>

                    <div class="ultimoslancamentos-cards" id="consulta-obras">
                        <?php include('app/views/shared/cards-obra.php') ?>

                    </div>


                </section>
        </main>

        </section>
        </main>       
        </body>

</html>