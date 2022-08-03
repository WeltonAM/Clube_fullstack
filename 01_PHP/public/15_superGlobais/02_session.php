<?php 

// session_destroy();
unset($_SESSION['name']); // excluir sessão


if (isset($_SESSION['name'])) {
    echo "Sessão existe: {$_SESSION['name']}";
} else {
    echo "Sessão não existe";
}
