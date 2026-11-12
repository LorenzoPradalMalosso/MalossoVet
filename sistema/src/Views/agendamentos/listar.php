<section>
    <div class="page-heading">
        <div><h1><?= htmlspecialchars($titulo ?? 'Agendamentos', ENT_QUOTES, 'UTF-8') ?></h1><p>Consultas ordenadas por data e horário.</p></div>
        <a class="button" href="/agendamentos/novo">Novo agendamento</a>
    </div>
    <?php if (empty($agendamentos)): ?>
        <p class="empty-state">Nenhum agendamento cadastrado.</p>
    <?php else: ?>
        <div class="table-wrap"><table>
            <thead><tr><th>Data</th><th>Hora</th><th>Serviço</th><th>Status</th><th>Tutor</th><th>Contato</th><th>Pet</th><th>Responsável</th><th></th></tr></thead>
            <tbody><?php foreach ($agendamentos as $item): ?>
                <tr>
                    <td><?= htmlspecialchars((string)$item['data_agendamento'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars(substr((string)$item['hora_agendamento'], 0, 5), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$item['servico'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$item['status'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$item['tutor_nome'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$item['tutor_telefone'], ENT_QUOTES, 'UTF-8') ?><br><?= htmlspecialchars((string)$item['tutor_email'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars((string)$item['pet_nome'], ENT_QUOTES, 'UTF-8') ?> (<?= htmlspecialchars((string)$item['pet_especie'], ENT_QUOTES, 'UTF-8') ?>, <?= htmlspecialchars((string)$item['pet_raca'], ENT_QUOTES, 'UTF-8') ?>)</td>
                    <td><?= htmlspecialchars((string)$item['responsavel_nome'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><a href="/agendamentos/editar-data?id=<?= (int)$item['id'] ?>">Alterar data</a></td>
                </tr>
                <?php if (!empty($item['observacao'])): ?><tr><td colspan="9"><strong>Observação:</strong> <?= htmlspecialchars((string)$item['observacao'], ENT_QUOTES, 'UTF-8') ?></td></tr><?php endif; ?>
            <?php endforeach; ?></tbody>
        </table></div>
    <?php endif; ?>
</section>
