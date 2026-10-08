<?php

class Router
{
    private array $routes = ['GET' => [], 'POST' => []];

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, callable $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] === 'POST' ? 'POST' : 'GET';
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

        if (BASE_URL !== '' && strpos($uri, BASE_URL) === 0) {
            $uri = substr($uri, strlen(BASE_URL));
        }

        $uri = '/' . trim($uri, '/');

        // 1) Coincidencia exacta
        if (isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]);
            return;
        }

        // 2) Coincidencia con parámetros dinámicos, ej: /servicio/{slug}
        foreach ($this->routes[$method] as $pattern => $handler) {
            if (strpos($pattern, '{') === false) {
                continue;
            }
            $regex = '#^' . preg_replace('/\{[a-zA-Z_]+\}/', '([^/]+)', $pattern) . '$#';
            if (preg_match($regex, $uri, $matches)) {
                array_shift($matches);
                call_user_func_array($handler, $matches);
                return;
            }
        }

        http_response_code(404);
        $settings = Setting::allAsArray();
        require VIEWS_PATH . '/partials/header.php';
        require VIEWS_PATH . '/404.php';
        require VIEWS_PATH . '/partials/footer.php';
    }
}
