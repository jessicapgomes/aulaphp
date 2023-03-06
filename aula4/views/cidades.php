<section>
    <div class="row">
        <div class="col-md-6">
            <h2>Cadastrar Cidade</h2>
            <form action="/cidades/<?=$acao?>" method="post">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?=(isset($cidade['nome'])) ? $cidade['nome'] : ''?>">
                </div>
                <button type="submit" class="btn btn-primary"><?=$botao?></button>
            </form>
        </div>
        <div class="col-md-6">
            <h2>Cidades</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cidades as $v): ?>
                        <tr>
                            <td><?=$v['id']?></td>
                            <td><?=$v['nome']?></td>
                            <td><a href="/cidades/edit/<?=$v['id']?>"><i class="fa fa-pencil"></i></a></td>
                            <td><a href="/cidades/delete/<?=$v['id']?>"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>