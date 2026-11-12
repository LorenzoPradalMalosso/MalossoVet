<section class="card narrow">
    <h1><?= htmlspecialchars($titulo ?? 'Novo tutor', ENT_QUOTES, 'UTF-8') ?></h1>
    <?php if (!empty($erro)): ?><p class="alert" role="alert"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>

    <form action="/tutores/salvar" method="post">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <label for="nome">Nome completo</label>
        <input id="nome" name="nome" maxlength="128" required>
        <label for="cpf">CPF</label>
        <input id="cpf" name="cpf" inputmode="numeric" autocomplete="off" required>
        <label for="telefone">Telefone</label>
        <input id="telefone" name="telefone" type="tel" maxlength="128" required>
        <label for="email">E-mail</label>
        <input id="email" name="email" type="email" maxlength="128">
        <div class="form-actions"><button type="submit">Salvar tutor</button><a href="/tutores">Cancelar</a></div>
    </form>
</section>
