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
    $id = $_POST['id'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $msg = "E-mail inválido";
    
    }else if(!validaCPF($cpf)){  
      $msg = "CPF inválido";
    }else{

      // CRIAR O SQL
      $sql = "UPDATE cliente SET 
            nome = '{$nome}',
            telefone = '{$telefone}',
            email = '{$email}',
            cpf = '{$cpf}'
            WHERE pk_cliente = {$id}";

      // Tenta cadastrar, retorna true ou false
      $resposta = $conn->query($sql);

      // se true, verdadeiro, cadastro efetuado
      if($resposta === true){
        $msg = "Atualizado com sucesso!";
      }else{
        $msg = "Erro ao cadastrar!". $conn->error;
      }

    }
  }
?>

<?php
    include "includes/conexao.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM cliente WHERE pk_cliente ={$id}";
    $lista = $conn->query($sql);
    $cliente = $lista->fetch_assoc();

?>

<?php include "includes/header.php"; ?>
    


<div class="container">
   <h1>Dados do Cliente</h1>

   <form class="form-horizontal" method="post" action="cliente-visualizar.php?id=<?php echo $cliente['pk_cliente']; ?>">
  <fieldset>

  <input value="<?php echo $cliente['pk_cliente']; ?>" id="id" name="id" type="hidden">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="id">ID</label>  
  <div class="col-md-4">
  <input value="<?php echo $cliente['pk_cliente']; ?>" id="id" name="id" disabled="disabled" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome</label>  
  <div class="col-md-4">
  <input value="<?php echo $cliente['nome']; ?>" id="nome" name="nome" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefone">Telefone</label>  
  <div class="col-md-4">
  <input value="<?php echo $cliente['telefone']; ?>" id="telefone" name="telefone" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail</label>  
  <div class="col-md-4">
  <input value="<?php echo $cliente['email']; ?>" id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cpf">CPF</label>  
  <div class="col-md-4">
  <input  value="<?php echo $cliente['cpf']; ?>" id="cpf" name="cpf" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Atualizar</button>
  </div>
</div>

</fieldset>
</form>

  <div>
    <?php if(isset($msg)) echo $msg; // se existir $msg, imprima ?>
  </div>


    </div>
    

<?php include "includes/footer.php"; ?>