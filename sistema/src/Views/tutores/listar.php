<section>
    <div class="page-heading">
        <div>
            <h1><?= htmlspecialchars($titulo ?? 'Tutores', ENT_QUOTES, 'UTF-8') ?></h1>
            <p>Consulte, edite ou remova tutores cadastrados.</p>
        </div>
        <a class="button" href="/tutores/novo">Cadastrar tutor</a>
    </div>

    <form class="search" action="/tutores" method="get">
        <label for="q">Buscar por nome, e-mail ou telefone</label>
        <div class="inline-form">
            <input id="q" name="q" type="search" value="<?= htmlspecialchars($busca ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <button type="submit">Buscar</button>
            <?php if (!empty($busca)): ?><a href="/tutores">Limpar</a><?php endif; ?>
        </div>
    </form>

    <?php if (empty($tutores)): ?>
        <p class="empty-state">Nenhum tutor encontrado.</p>
    <?php else: ?>
        <div class="table-wrap">
            <table>
                <thead><tr><th>Nome</th><th>CPF</th><th>Telefone</th><th>E-mail</th><th>Ações</th></tr></thead>
                <tbody>
                <?php foreach ($tutores as $tutor): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)$tutor['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)($tutor['cpf'] ?? ''), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)$tutor['telefone'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string)$tutor['email'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="actions">
                            <a href="/tutores/editar?id=<?= (int)$tutor['id'] ?>">Editar</a>
                            <form action="/tutores/excluir" method="post" onsubmit="return confirm('Excluir este tutor, seus pets e os agendamentos relacionados?');">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                <input type="hidden" name="id" value="<?= (int)$tutor['id'] ?>">
                                <button class="button-danger" type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>
