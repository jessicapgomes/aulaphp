<section>
    <h2>Cadastrar Cliente</h2>
    <form>
        <div class="form-group">
            <label for="nome">Nome completo</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <select class="form-control" id="cidade" name="cidade" required>
                <option value="">Selecione uma cidade</option>
                <option value="1">Florianópolis</option>
                <option value="2">Joinville</option>
                <option value="3">Blumenau</option>
                <option value="4">Chapecó</option>
                <option value="5">Criciúma</option>
                <option value="6">São José</option>
                <option value="7">Itajaí</option>
                <option value="8">Lages</option>
                <option value="9">Palhoça</option>
                <option value="10">Brusque</option>
            </select>
        </div>
        <div class="form-group">
            <label for="apresentacao">Apresentação</label>
            <textarea class="form-control" id="apresentacao" name="apresentacao" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</section>