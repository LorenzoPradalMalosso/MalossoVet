<?php
$tituloPagina = $titulo ?? 'MalossoVet';
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($tituloPagina, ENT_QUOTES, 'UTF-8') ?> | MalossoVet</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: #20312d;
            background: #f5f8f6;
            font-synthesis: none;
            text-rendering: optimizeLegibility;
            --green: #176b58;
            --green-dark: #105243;
            --ink-soft: #60716b;
            --line: #dce7e1;
        }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; }
        header { background: #fff; border-bottom: 1px solid var(--line); box-shadow: 0 2px 12px rgb(25 63 49 / 4%); }
        .topbar { max-width: 1120px; min-height: 76px; margin: 0 auto; padding: .8rem 1.25rem; display: flex; align-items: center; justify-content: space-between; gap: 1.5rem; }
        .brand { display: inline-flex; align-items: center; gap: .7rem; color: #173b32; text-decoration: none; font-size: 1.15rem; font-weight: 750; letter-spacing: -.03em; }
        .brand-mark { width: 36px; height: 36px; display: grid; place-items: center; border-radius: 12px; background: #e3f2eb; color: var(--green); font-size: 1.15rem; }
        header nav { display: flex; align-items: center; gap: .35rem; flex-wrap: wrap; }
        header nav a { padding: .6rem .8rem; border-radius: 8px; color: #52665e; text-decoration: none; font-size: .94rem; font-weight: 600; }
        header nav a:hover { background: #edf5f0; color: var(--green-dark); }
        main { max-width: 1120px; margin: 2.25rem auto; padding: 0 1.25rem; }
        h1, h2, h3 { color: #183b31; letter-spacing: -.035em; }
        h1 { margin: 0 0 .45rem; font-size: clamp(1.65rem, 3vw, 2.1rem); }
        p { color: var(--ink-soft); line-height: 1.6; }
        a { color: var(--green); }
        .card, .search, .empty-state, .table-wrap, .dashboard-card { background: #fff; border: 1px solid var(--line); border-radius: 14px; box-shadow: 0 5px 20px rgb(25 63 49 / 4%); }
        .card { padding: clamp(1.25rem, 3vw, 2rem); }
        .narrow { max-width: 620px; margin: 0 auto; }
        .narrow h1 { margin-bottom: 1.3rem; }
        form label { display: block; color: #344d44; font-weight: 650; font-size: .92rem; margin: 1rem 0 .4rem; }
        input, select, button, .button { font: inherit; min-height: 44px; padding: .65rem .85rem; border: 1px solid #cbd9d1; border-radius: 8px; }
        input, select { width: 100%; background: #fff; color: #20312d; }
        input:focus, select:focus { outline: 3px solid rgb(23 107 88 / 15%); border-color: var(--green); }
        button, .button { display: inline-flex; align-items: center; justify-content: center; width: auto; background: var(--green); border-color: var(--green); color: #fff; text-decoration: none; font-weight: 650; cursor: pointer; transition: background .15s ease, transform .15s ease; }
        button:hover, .button:hover { background: var(--green-dark); color: #fff; transform: translateY(-1px); }
        .button-secondary { background: #fff; color: var(--green); border-color: #bfd4c9; }
        .button-secondary:hover { background: #edf5f0; color: var(--green-dark); }
        .button-danger { background: #fff; border-color: #e8c4c1; color: #a13e38; }
        .button-danger:hover { background: #fff1ef; border-color: #dca6a1; color: #8e2f2a; }
        .page-heading, .inline-form, .form-actions, .actions { display: flex; align-items: center; gap: .75rem; flex-wrap: wrap; }
        .page-heading { justify-content: space-between; margin-bottom: 1.25rem; }
        .page-heading p { margin: .3rem 0 0; }
        .search { padding: 1rem 1.2rem; margin-bottom: 1.25rem; }
        .search label { margin-top: 0; }
        .inline-form input { flex: 1; min-width: 220px; width: auto; }
        .form-actions { margin-top: 1.4rem; }
        .form-actions a { font-weight: 600; padding: .5rem; }
        .table-wrap { overflow-x: auto; margin-top: 1rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: .9rem 1rem; border-bottom: 1px solid #e9efeb; text-align: left; vertical-align: top; }
        th { background: #f2f7f4; color: #50645b; font-size: .78rem; text-transform: uppercase; letter-spacing: .055em; white-space: nowrap; }
        tbody tr:last-child td { border-bottom: 0; }
        tbody tr:hover { background: #fbfdfb; }
        .actions { min-width: 145px; }
        .actions form { margin: 0; }
        .actions button { min-height: 36px; padding: .35rem .65rem; }
        .actions a { font-weight: 650; text-decoration: none; }
        .actions a:hover { text-decoration: underline; }
        .alert { padding: .8rem 1rem; background: #fff2f0; border: 1px solid #f0cfca; color: #852f2a; border-radius: 9px; }
        .empty-state { padding: 2rem; text-align: center; }
        .details { display: grid; grid-template-columns: 100px 1fr; gap: .6rem; padding: 1rem; background: #f4f8f5; border-radius: 10px; }
        .details dt { font-weight: 700; color: #496057; }
        .details dd { margin: 0; }
        .dashboard-intro { padding: clamp(1.4rem, 4vw, 2.5rem); border-radius: 16px; color: #fff; background: linear-gradient(120deg, #145845, #27866b); }
        .dashboard-intro h1, .dashboard-intro p { color: #fff; }
        .dashboard-intro p { margin-bottom: 0; color: #e1f2e9; }
        .dashboard-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 1rem; margin: 1.25rem 0; }
        .dashboard-card { padding: 1.35rem; text-decoration: none; transition: transform .15s ease, box-shadow .15s ease; }
        .dashboard-card:hover { transform: translateY(-3px); box-shadow: 0 10px 26px rgb(25 63 49 / 9%); }
        .dashboard-card h2 { margin: 0 0 .4rem; font-size: 1.15rem; }
        .dashboard-card p { margin: 0; font-size: .92rem; }
        .logout-form { display: flex; justify-content: flex-end; }
        footer { max-width: 1120px; margin: 3rem auto 0; padding: 1rem 1.25rem 2rem; color: #829189; font-size: .85rem; }
        @media (max-width: 700px) {
            .topbar { align-items: flex-start; flex-direction: column; gap: .55rem; }
            header nav { width: 100%; }
            header nav a { padding: .55rem .65rem; }
            main { margin-top: 1.4rem; }
            .dashboard-grid { grid-template-columns: 1fr; }
            .page-heading { align-items: flex-start; }
            th, td { padding: .7rem; }
        }
    </style>
</head>
<body>
    <header>
        <div class="topbar">
            <a class="brand" href="/"><span class="brand-mark" aria-hidden="true">✚</span>MalossoVet</a>
            <nav aria-label="Navegação principal">
                <a href="/">Início</a>
                <a href="/tutores">Tutores</a>
                <a href="/pets">Pets</a>
                <a href="/agendamentos">Agendamentos</a>
            </nav>
        </div>
    </header>
    <main>
