<?php
require_once 'config/databases.php';

// Analyser l'URL pour déterminer le contrôleur et l'action à utiliser
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($url, '/'));

// Obtenir le nom du contrôleur et l'action (méthode)
$controllerName = !empty($segments[0]) ? $segments[0] : 'Home';
$actionName = isset($segments[1]) ? $segments[1] : 'index';

// Capitaliser le premier caractère du nom du contrôleur (convention de nommage)
$controllerName = ucfirst(strtolower($controllerName)) . 'Controller';

// Chemin vers le fichier du contrôleur
$controllerFile = "controllers/" . $controllerName . ".php";

// Vérifier si le fichier du contrôleur existe
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // Instancier le contrôleur
    $controller = new $controllerName();

    // Vérifier si l'action (méthode) existe dans le contrôleur
    if (method_exists($controller, $actionName)) {
        call_user_func_array([$controller, $actionName], []);
    } else {
        // Gérer l'erreur - méthode non trouvée
        echo "Erreur 404: Méthode non trouvée";
    }
} else {
    // Gérer l'erreur - contrôleur non trouvé
    echo "Erreur 404: Contrôleur non trouvé";
}
?>
