<section class="card narrow">
    <h1><?= htmlspecialchars($titulo ?? 'Alterar agendamento', ENT_QUOTES, 'UTF-8') ?></h1>
    <dl class="details">
        <dt>Tutor</dt><dd><?= htmlspecialchars((string)$agendamento['tutor_nome'], ENT_QUOTES, 'UTF-8') ?></dd>
        <dt>Pet</dt><dd><?= htmlspecialchars((string)$agendamento['pet_nome'], ENT_QUOTES, 'UTF-8') ?></dd>
        <dt>Serviço</dt><dd><?= htmlspecialchars((string)$agendamento['servico'], ENT_QUOTES, 'UTF-8') ?></dd>
    </dl>
    <form action="/agendamentos/atualizar-data" method="post">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="id" value="<?= (int)$agendamento['id'] ?>">
        <label for="data_agendamento">Nova data</label>
        <input id="data_agendamento" name="data_agendamento" type="date" value="<?= htmlspecialchars((string)$agendamento['data_agendamento'], ENT_QUOTES, 'UTF-8') ?>" required>
        <label for="hora_agendamento">Novo horário (opcional)</label>
        <input id="hora_agendamento" name="hora_agendamento" type="time" value="<?= htmlspecialchars(substr((string)$agendamento['hora_agendamento'], 0, 5), ENT_QUOTES, 'UTF-8') ?>">
        <div class="form-actions"><button type="submit">Atualizar agendamento</button><a href="/agendamentos">Cancelar</a></div>
    </form>
</section>
