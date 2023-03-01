<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clientes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <div class="container mt-5">
    <h1 class="mb-4">Clientes</h1>
    <div class="row mb-4">
      <div class="col-lg-4">
        <form method="post" action="?acao=<?=$acao?>">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?=(isset($cliente)) ? $cliente['nome'] : '' ?>">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=(isset($cliente)) ? $cliente['email'] : '' ?>">
          </div>
          <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="<?=(isset($cliente)) ? $cliente['cidade'] : '' ?>">
          </div>
          <div class="mb-3">
            <label for="apresentacao" class="form-label">Apresentação</label>
            <textarea class="form-control" id="apresentacao" name="apresentacao" rows="3"><?=(isset($cliente)) ? $cliente['apresentacao'] : '' ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary"><?=$botao?></button>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Cidade</th>
              <th scope="col">Apresentação</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($clientes as $cliente) : ?>
              <tr>
                <th scope="row"><?= $cliente['id'] ?></th>
                <td><?= $cliente['nome'] ?></td>
                <td><?= $cliente['email'] ?></td>
                <td><?= $cliente['cidade'] ?></td>
                <td><?= $cliente['apresentacao'] ?></td>
                <td>
                  <div class="btn-group" role="group" aria-label="Ações">
                    <a href="?acao=editar&id=<?= $cliente['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                    <a href="?acao=deletar&id=<?= $cliente['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</a>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
