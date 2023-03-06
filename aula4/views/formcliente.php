<section>
    <h2><?=$titulo?></h2>
    <form method="post" action="<?=$acao?>">
        <div class="form-group">
            <label for="nome">Nome completo</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?=(isset($cliente['nome'])) ? $cliente['nome'] : ''?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=(isset($cliente['email'])) ? $cliente['email'] : ''?>" required>
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <select class="form-control" id="cidade" name="cidade" required>
                <option value="">Selecione uma cidade</option>
                <?php foreach($cidades as $v): ?>
                    <option value="<?=$v['id']?>" <?=($v['id'] == $cliente['cidade']) ? 'selected' : ''?>><?=$v['nome']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="apresentacao">Apresentação</label>
            <textarea class="form-control" id="apresentacao" name="apresentacao" rows="3" required><?=(isset($cliente['apresentacao'])) ? $cliente['apresentacao'] : ''?></textarea>
        </div>
        <button type="submit" class="btn btn-primary"><?=$botao?></button>
    </form>
</section>