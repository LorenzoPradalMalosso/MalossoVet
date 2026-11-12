<section>
    <div class="page-heading">
        <div><h1><?= htmlspecialchars($titulo ?? 'Pets', ENT_QUOTES, 'UTF-8') ?></h1><p>Pets cadastrados e seus tutores.</p></div>
        <a class="button" href="/pets/novo">Cadastrar pet</a>
    </div>
    <?php if (empty($pets)): ?>
        <p class="empty-state">Nenhum pet cadastrado.</p>
    <?php else: ?>
        <div class="table-wrap"><table>
            <thead><tr><th>Nome</th><th>Espécie</th><th>Raça</th><th>Nascimento</th><th>Tutor</th></tr></thead>
            <tbody><?php foreach ($pets as $pet): ?>
                <tr>
                    <td><?= htmlspecialchars((string)$pet['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$pet['especie'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$pet['raca'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$pet['data_nascimento'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$pet['tutor_nome'], ENT_QUOTES, 'UTF-8') ?></td>
                </tr>
            <?php endforeach; ?></tbody>
        </table></div>
    <?php endif; ?>
</section>
