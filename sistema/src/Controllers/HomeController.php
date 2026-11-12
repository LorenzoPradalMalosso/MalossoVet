<?php
declare(strict_types=1);

namespace App\Controllers;

/**
 * Controller do painel principal da aplicacao.
 */
final class HomeController extends Controller
{
    public function index(): void
    {
        $this->renderizar('home/index', [
            'titulo'      => 'Painel principal',
            'nomeUsuario' => $_SESSION['usuario_nome'] ?? 'Usuario',
            'csrfToken'   => $this->obterCsrfToken(),
        ]);
    }
}
