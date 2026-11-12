<section class="dashboard-intro">
    <h1>Olá, <?= htmlspecialchars($nomeUsuario ?? 'Usuário', ENT_QUOTES, 'UTF-8') ?>!</h1>
    <p>Bem-vindo ao painel da clínica. Escolha uma área para continuar.</p>
</section>

<section class="dashboard-grid" aria-label="Áreas do sistema">
    <a class="dashboard-card" href="/tutores">
        <h2>Tutores</h2>
        <p>Consulte, pesquise e mantenha os dados dos responsáveis.</p>
    </a>
    <a class="dashboard-card" href="/pets">
        <h2>Pets</h2>
        <p>Veja os animais cadastrados e seus tutores.</p>
    </a>
    <a class="dashboard-card" href="/agendamentos">
        <h2>Agendamentos</h2>
        <p>Acompanhe consultas e atualize datas e horários.</p>
    </a>
</section>

<form class="logout-form" action="/logout" method="post">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '', ENT_QUOTES, 'UTF-8') ?>">
    <button class="button-secondary" type="submit">Sair do sistema</button>
</form>
