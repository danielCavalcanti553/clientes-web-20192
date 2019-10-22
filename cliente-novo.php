<?php
  if($_POST){
    // INCLUIR O ARQUIVO DE CONEXÃO
    include "includes/conexao.php";
    include "includes/funcoes.php";

    // CAPTURAR OS DADOS DO POST
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $msg = "E-mail inválido";
    
    }else if(!validaCPF($cpf)){  
      $msg = "CPF inválido";
    }else{

      // CRIAR O SQL
      $sql = "INSERT INTO cliente VALUES
        (default,'{$nome}','{$telefone}','{$email}','{$cpf}')";

      // Tenta cadastrar, retorna true ou false
      $resposta = $conn->query($sql);

      // se true, verdadeiro, cadastro efetuado
      if($resposta === true){
        $msg = "Cadastrado com sucesso!";
      }else{
        $msg = "Erro ao cadastrar!". $conn->error;
      }

    }
  }
?>

<?php include "includes/header.php"; ?>
    
   <div class="container">
   <h1>Cadastro de Clientes</h1>

   <form class="form-horizontal" method="post" action="cliente-novo.php">
  <fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefone">Telefone</label>  
  <div class="col-md-4">
  <input id="telefone" name="telefone" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cpf">CPF</label>  
  <div class="col-md-4">
  <input id="cpf" name="cpf" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Cadastrar</button>
  </div>
</div>

</fieldset>
</form>

  <div>
    <?php if(isset($msg)) echo $msg; // se existir $msg, imprima ?>
  </div>


    </div>

<?php include "includes/footer.php"; ?>