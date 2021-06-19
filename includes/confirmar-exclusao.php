<main>
  <section>
    <a href="index.php">
      <button class="btn btn-success shadow-sm">Voltar</button>
    </a>
  </section>
  <div class=" py-3 text-center">
    <h2 class="mt-3">Excluir devedor</h2>

    <form method="POST">

      <div class="form-group">
        <p>Você deseja realmente excluir este devedor <strong><?= $Devedor->nome ?></strong> ?</p>
      </div>

      <div class="container">
        <a href="index.php">
          <button type="button" class="btn btn-success shadow-sm">Cancelar</button>
        </a>

        <div class="mt-3">
          <button type="submit" name="excluir" class="btn btn-danger shadow-sm">Excluir</button>
        </div>
      </div>
  
  </form>
  </div>
</main>