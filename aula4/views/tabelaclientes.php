<section>
    <h2>Clientes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Cidade</th>
                <th>Apresentação</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clientes as $v): ?>
                <tr>
                    <td><?=$v['nome']?></td>
                    <td><?=$v['email']?></td>
                    <td><?=$v['cidade']?></td>
                    <td><?=$v['apresentacao']?></td>
                    <td><a href="/clientes/edit/<?=$v['id']?>"><i class="fa fa-pencil"></i></a></td>
                    <td><a href="/clientes/delete/<?=$v['id']?>"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</section>