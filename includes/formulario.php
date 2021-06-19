<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success shadow-sm">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="POST">

        <div class="row">

                <div class="col-md-6 mb-3">
                  <label class="col-form-label">Nome</label>
                  <input type="text" class="form-control" name="nome" autocomplete="off" value="<?=$Devedor->nome?>">
                </div>
                <div class="col-md-2 mb-3">
                  <label class="col-form-label">CPF</label>
                  <input type="text" class="form-control" name="cpf" autocomplete="off" value="<?=$Devedor->cpf?>">
                </div>
                <div class="col-md-4 mb-3">
                  <label class="col-form-label">Data Nascimento</label>
                  <input type="date" class="form-control" name="data_nascimento" autocomplete="off" value="<?=$Devedor->data_nascimento?>">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="col-form-label">Endereço</label>
                  <input type="text" class="form-control" name="endereco" autocomplete="off" value="<?=$Devedor->endereco?>">
                </div>
                <div class="col-md-2 mb-3">
                  <label class="col-form-label">Valor</label>
                  <input type="text" class="form-control" name="valor" autocomplete="off" value="<?=$Devedor->valor?>">
                </div>
                <div class="col-md-4 mb-3">
                  <label class="col-form-label">Data Vencimento</label>
                  <input type="date" class="form-control" name="data_vencimento" autocomplete="off" value="<?=$Devedor->data_vencimento?>">
                </div>
                <div class="col-md-6 mb-3">
                  <label class="col-form-label">Descrição</label>
                  <textarea name="descricao_titulo" class="form-control" rows="3"><?=$Devedor->descricao_titulo?></textarea>
                </div>
                
                
              </div>

            <div class="col-md-8">
              <button type="submit" class="btn btn-success shadow-sm">Enviar</button>
            </div>
    </form>
</main>