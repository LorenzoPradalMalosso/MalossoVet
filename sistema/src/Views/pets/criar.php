<section class="card narrow">
    <h1><?= htmlspecialchars($titulo ?? 'Cadastrar pet', ENT_QUOTES, 'UTF-8') ?></h1>
    <?php if (!empty($erro)): ?><p class="alert" role="alert"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
    <?php if (empty($tutores)): ?>
        <p class="alert">Cadastre um tutor antes de cadastrar um pet.</p>
        <a class="button" href="/tutores/novo">Cadastrar tutor</a>
    <?php else: ?>
        <form action="/pets/salvar" method="post">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <label for="tutor_id">Tutor responsável</label>
            <select id="tutor_id" name="tutor_id" required>
                <option value="">Selecione um tutor</option>
                <?php foreach ($tutores as $tutor): ?>
                    <option value="<?= (int)$tutor['id'] ?>"><?= htmlspecialchars((string)$tutor['nome'], ENT_QUOTES, 'UTF-8') ?></option>
                <?php endforeach; ?>
            </select>
            <label for="nome">Nome do pet</label><input id="nome" name="nome" maxlength="128" required>
            <label for="especie">Espécie</label><input id="especie" name="especie" maxlength="128" required>
            <label for="raca">Raça</label><input id="raca" name="raca" maxlength="128">
            <label for="data_nascimento">Data de nascimento</label><input id="data_nascimento" name="data_nascimento" type="date" required>
            <div class="form-actions"><button type="submit">Salvar pet</button><a href="/pets">Cancelar</a></div>
        </form>
    <?php endif; ?>
</section>
