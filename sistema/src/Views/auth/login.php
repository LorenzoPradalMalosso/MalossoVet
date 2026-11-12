<section class="card narrow">
    <h1><?= htmlspecialchars($titulo ?? 'Entrar', ENT_QUOTES, 'UTF-8') ?></h1>

    <?php if (!empty($erro)): ?>
        <p class="alert" role="alert"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <form action="/login" method="post">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '', ENT_QUOTES, 'UTF-8') ?>">

        <label for="email">E-mail</label>
        <input id="email" name="email" type="email" autocomplete="username" required>

        <label for="senha">Senha</label>
        <input id="senha" name="senha" type="password" autocomplete="current-password" required>

        <button type="submit">Entrar</button>
    </form>
</section>
