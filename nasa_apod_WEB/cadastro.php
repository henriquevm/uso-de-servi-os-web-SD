<?php
require_once('conexao.php');
/*
    if (isset($_POST["id_excluir"])) {

        try {  
            $sql = "DELETE FROM veiculo WHERE id_veiculo = ?";

            $stmt = $conexao->prepare($sql);
            $stmt->execute([$_POST["id_excluir"]]);
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APDO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet' href="style/principal.css">
    <style>
        .btn-excluir {
            height: 38px;
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <div class="container my-3 ">
        <div class="jumbotron mb-3 jumbotron-with-background">
            <h1>Astronomy Picture of the Day</h1>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listagem.php">As mais recentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sobre.php">Sobre</a>
                    </li>
                </ul>
            </div>
        </nav>

        <section>
            <header class="card-header p-3 mb-3 text-center">
                <h2>Encontre a imagem registrada no seu aniversário</h2>
            </header>
            <div class="text-center">
                <form method="POST" action="#">
                    Insira a data: &nbsp;<input type="text" name="data" placeholder="AAAA-MM-DD">
                    <input type="submit" value="ENVIAR">
                </form>
            </div>

            <?php

            require_once('conexao.php');
            $contador = 0;

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["data"])) {
    
                $sql = "SELECT date_apod, explanation_apod, title_apod, url_apod FROM nasa_apod.apod WHERE date_apod = ?";
                
                $stmt2 = $conexao->prepare($sql);
                
                if($stmt2->execute([$_POST["data"]]) && $rs2 = $stmt2->fetch(PDO::FETCH_OBJ)){

                    if (strpos($rs2->url_apod, 'apod') !== false) {
                        echo "<div class='card p-2 my-3'>";
                        echo "<div class='row'>";
                        echo "<div class='col-md-6'>";
                        echo "<img src='" . $rs2->url_apod . "' class='img-thumbnail img-fluid'>";
                        echo "</div>";
                        echo "<div class='col-md-6 p-3'>";
                        echo "<h3>" . $rs2->title_apod . "</h3>";
                        echo "<p>";
                        echo "<strong>" . "Data: " . "</strong>" . $rs2->date_apod . "<br>";
                        echo "</p>";
                        echo "<p>";
                        echo $rs2->explanation_apod;
                        echo "</p>";
                        echo "<p class='text-right'>";
                        //echo "<a href='editar.php?id=".$rs->id."' class='btn btn-primary'>"."Editar"."</a>";
                        //echo "<button type='button' data-toggle='modal' data-target='#modalConfirmacao' onclick=\"$('#id_excluir').val(".$rs->id.")\" class='btn btn-danger btn-excluir'>Excluir</a>";
                        echo "</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        $contador = $contador + 1;
                    }
                }
                //$showConfirmModal = true;
            }



            try {
                $stmt = $conexao->prepare("SELECT date_apod, explanation_apod, title_apod, url_apod FROM nasa_apod.apod WHERE date_apod = '2021-03-12'");

                if ($stmt->execute()) {
                    while ($contador != 1 && $rs = $stmt->fetch(PDO::FETCH_OBJ)) {

                        if (strpos($rs->url_apod, 'apod') !== false) {
                            echo "<div class='card p-2 my-3'>";
                            echo "<div class='row'>";
                            echo "<div class='col-md-6'>";
                            echo "<img src='" . $rs->url_apod . "' class='img-thumbnail img-fluid'>";
                            echo "</div>";
                            echo "<div class='col-md-6 p-3'>";
                            echo "<h3>" . $rs->title_apod . "</h3>";
                            echo "<p>";
                            echo "<strong>" . "Data: " . "</strong>" . $rs->date_apod . "<br>";
                            echo "</p>";
                            echo "<p>";
                            echo $rs->explanation_apod;
                            echo "</p>";
                            echo "<p class='text-right'>";
                            //echo "<a href='editar.php?id=".$rs->id."' class='btn btn-primary'>"."Editar"."</a>";
                            //echo "<button type='button' data-toggle='modal' data-target='#modalConfirmacao' onclick=\"$('#id_excluir').val(".$rs->id.")\" class='btn btn-danger btn-excluir'>Excluir</a>";
                            echo "</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            $contador = $contador + 1;
                        }
                    }
                } else {
                    echo "Erro: Não foi possível recuperar os dados do banco de dados";
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
            }

            ?>
        </section>

        <hr>
        <footer class="mb-5 text-center">
            <p>&copy; Instituto Federal do Sul de Minas Gerais – IFSULDEMINAS | Campus Poços de Caldas, MG.</p>
        </footer>
    </div>
    <!-- jQuery e JS do Bootstrap, utilizados no modal de confirmação da exclusão de um veículo -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</body>

</html>