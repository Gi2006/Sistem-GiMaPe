<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
     crossorigin="anonymous"></script>
     <link rel="stylesheet" href="../style.css">
     <script defer src="../js/header.js"></script>
     <link rel="stylesheet" href="../js/header.css">
</head>
<body class="fundo">
<main-header></main-header>

    <main>
        <form method="POST" action="../../controller/create/recebeDepartamento.php">
            <center>
                <div style="height: 18vh;"></div>
            <div class="centro" style="height: 350px; border: solid black 5px; width: 40%; padding: 35px 50px; border-radius: 20px;"> 
                <h1>DEPARTAMENTO</h1>   
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Digite departamento:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" name="txtNomeDepartamento" 
          aria-describedby="emailHelp" style="border: solid black 1px; width: 70%; border-radius: 0%;" required maxlength="70" size="70"><br><br>
          <label for="datetime">Data e Hora:</label>
              <input type="datetime-local" id="datetime" name="txtDataHora"><br><br>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div></center>
        
    </div>
      </form>
    </main>
    <footer>
            Gisele Araújo, Matheus Santos e Pedro Henrique.
    </footer>
    <script src="../js/script.js"></script>

</body>
</html>