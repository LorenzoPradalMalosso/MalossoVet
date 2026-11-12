<section class="card narrow">
    <h1><?= htmlspecialchars($titulo ?? 'Novo agendamento', ENT_QUOTES, 'UTF-8') ?></h1>
    <?php if (empty($tutores) || empty($pets)): ?>
        <p class="alert">Cadastre pelo menos um tutor e um pet antes de criar um agendamento.</p>
        <div class="form-actions"><a class="button" href="/tutores/novo">Cadastrar tutor</a><a class="button" href="/pets/novo">Cadastrar pet</a></div>
    <?php else: ?>
        <form action="/agendamentos/salvar" method="post">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '', ENT_QUOTES, 'UTF-8') ?>">
            <label for="tutor_id">Tutor</label>
            <select id="tutor_id" name="tutor_id" required><option value="">Selecione</option>
                <?php foreach ($tutores as $tutor): ?><option value="<?= (int)$tutor['id'] ?>"><?= htmlspecialchars((string)$tutor['nome'], ENT_QUOTES, 'UTF-8') ?></option><?php endforeach; ?>
            </select>
            <label for="pet_id">Pet</label>
            <select id="pet_id" name="pet_id" required><option value="">Selecione</option>
                <?php foreach ($pets as $pet): ?><option value="<?= (int)$pet['id'] ?>"><?= htmlspecialchars((string)$pet['nome'], ENT_QUOTES, 'UTF-8') ?> — <?= htmlspecialchars((string)$pet['tutor_nome'], ENT_QUOTES, 'UTF-8') ?></option><?php endforeach; ?>
            </select>
            <label for="data_agendamento">Data</label><input id="data_agendamento" name="data_agendamento" type="date" required>
            <label for="hora_agendamento">Horário</label><input id="hora_agendamento" name="hora_agendamento" type="time" required>
            <label for="servico">Serviço</label><input id="servico" name="servico" maxlength="128" required>
            <div class="form-actions"><button type="submit">Salvar agendamento</button><a href="/agendamentos">Cancelar</a></div>
        </form>
    <?php endif; ?>
</section>
