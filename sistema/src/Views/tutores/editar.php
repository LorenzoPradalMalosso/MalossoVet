<section class="card narrow">
    <h1><?= htmlspecialchars($titulo ?? 'Editar tutor', ENT_QUOTES, 'UTF-8') ?></h1>
    <form action="/tutores/atualizar" method="post">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="id" value="<?= (int)$tutor['id'] ?>">
        <label for="nome">Nome completo</label>
        <input id="nome" name="nome" maxlength="128" value="<?= htmlspecialchars((string)$tutor['nome'], ENT_QUOTES, 'UTF-8') ?>" required>
        <label for="cpf">CPF</label>
        <input id="cpf" name="cpf" inputmode="numeric" value="<?= htmlspecialchars((string)($tutor['cpf'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
        <label for="telefone">Telefone</label>
        <input id="telefone" name="telefone" maxlength="128" value="<?= htmlspecialchars((string)$tutor['telefone'], ENT_QUOTES, 'UTF-8') ?>">
        <label for="email">E-mail</label>
        <input id="email" name="email" type="email" maxlength="128" value="<?= htmlspecialchars((string)$tutor['email'], ENT_QUOTES, 'UTF-8') ?>">
        <div class="form-actions"><button type="submit">Salvar alterações</button><a href="/tutores">Cancelar</a></div>
    </form>
</section>
