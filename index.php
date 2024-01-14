<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dados Exemplares</title>
</head>
<body>
    <form action="" method="post">
        <h1>Gerador de dados falsos</h1>
        <input type="submit" value="Gerar dados!" name="requisicao">

        <div class="containerFakeDatas">
            <p class="nome"></p>
            <p class="telefone"></p>
            <p class="endereco"></p>
        </div>
    </form>
</body>
</html>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        width: 100vw;
        height: 100vh;
        background: #f5ffcf;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    form{
        background: #f5ffcf;
        width: 50vw;height: 45vmax;
        box-shadow: 0 0 25px grey;
        border-radius: 3px;
        display: flex;flex-direction: column;
        align-items: center;justify-content: center;
        gap: 50px;
    }
    h1{
        font-family: Arial, Helvetica, sans-serif;
        transform: translateY(-5%);
        font-size: 2vmax;
        margin: 2.5%;text-align: center;
    }
    .containerFakeDatas{
        padding: 5%;
        scale: 1.5;
    }
    p{
        background: #9f8bff;color: white;width:15vw;height: 5vh;text-align: center;padding: 1.5%;margin-top: 2.5%;
        font-size: 1.05vmax;
    }
    .endereco,.nome{height: auto}
    input{
        width: 10vmax;
        height: 2.5vmax;
        outline: none;
        border: none;
        margin-bottom: 5%;
        border-radius: 3px;
        background: #374AAC;
        color: #fafafa;
        cursor: pointer;transition: .5s ease;
        font-size: 1.2vmax;
    }
    input:hover{background: #fafafa;color: #374AAC;filter: drop-shadow(5px 5px 5px black);}
</style>

<?php
include 'dado.php';

$dado=new Dado();
if(isset($_POST['requisicao'])){

   echo '<script>console.log(\''.$dado->getQtdDados().'\')</script>';
   $_SESSION['nome']=$dado->getNome();
   echo '<script>document.querySelector(".nome").innerText = \'' . $_SESSION['nome'] . '\'</script>';

    $_SESSION['endereco'] = $dado->getEndereco();
    $_SESSION['endereco']=str_replace(array("\n", "\r"), ' ', $_SESSION["endereco"]);
    echo '<script>document.querySelector(".endereco").innerText = \'' . $_SESSION['endereco'] . '\'</script>';

    $_SESSION['telefone']=$dado->getTelefone();
    echo '<script>document.querySelector(".telefone").innerText = \'' . $_SESSION['telefone'] . '\'</script>';
}
?>

