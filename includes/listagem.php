<?php

  $mensagem = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

      case 'error':
        $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
  }

  $resultados = '';
  foreach($devedores as $devedor){
    $resultados .= '<tr>
                      <td>'.$devedor->id.'</td>
                      <td>'.$devedor->nome.'</td>
                      <td>'.$devedor->cpf.'</td>
                      <td>'.date('d/m/Y',strtotime($devedor->data_nascimento)).'</td>
                      <td>'.$devedor->endereco.'</td>
                      <td>'.$devedor->descricao_titulo.'</td>
                      <td>'.$devedor->valor.'</td>
                      <td>'.date('d/m/Y',strtotime($devedor->data_vencimento)).'</td>
                      <td>'.date('d/m/Y à\s H:i:s',strtotime($devedor->updated)).'</td>
                      <td>
                        <a href="editar.php?id='.$devedor->id.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id='.$devedor->id.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhuma devedor encontrado
                                                       </td>
                                                    </tr>';

?>
<main>
   <?=$mensagem?>
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success shadow-sm">Novo devedor</button>
        </a>
    </section>

    <section>
        <table class="table table-bordered bg-light mt-3 shadow-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">CPF</th>
                    <th scope="col">DATA NASCIMENTO</th>
                    <th scope="col">ENDEREÇO</th>
                    <th scope="col">DESCRIÇÃO</th>
                    <th scope="col">VALOR</th>
                    <th scope="col">DATA VENCIMENTO</th>
                    <th scope="col">UPDATED</th>
                    <th scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
            <?=$resultados?>
            </tbody>
        </table>
    </section>

</main>