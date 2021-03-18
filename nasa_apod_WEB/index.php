<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APDO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet' href="style/principal.css">
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

        <section class="card">
            <header class="card-header p-3">
                <h2>APDO</h2>
            </header>
            <div class="card-body p-3">
                <p>Um dos sites mais populares da NASA é o Astronomy Picture of the Day. Na verdade, este site é um dos sites mais populares em todas as agências federais. Tem o apelo popular de um vídeo de Justin Bieber. Este ponto de extremidade estrutura as imagens APOD e os metadados associados para que possam ser reaproveitados para outros aplicativos. Além disso, se o parâmetro concept_tags for definido como True, as palavras-chave derivadas da explicação da imagem serão retornadas. Essas palavras-chave podem ser usadas como hashtags geradas automaticamente para feeds do Twitter ou Instagram; mas geralmente ajudam na descoberta de imagens relevantes. A documentação completa para esta API pode ser encontrada no repositório Github da API APOD.</p>
            </div>
        </section>

        <hr>
        <footer class="mb-5 text-center">
            <p>&copy; Instituto Federal do Sul de Minas Gerais – IFSULDEMINAS | Campus Poços de Caldas, MG.</p>
        </footer>
    </div>
    
</body>
</html>