<?php
class Route
{
    private static $middlewareStack = []; // Stack untuk menyimpan middleware

    // Menangani HTTP GET request
    public static function get(string $path, $callback, $middlewares = [])
    {
        self::handle('GET', $path, $callback, $middlewares);
    }

    // Menangani HTTP POST request
    public static function post(string $path, $callback, $middlewares = [])
    {
        self::handle('POST', $path, $callback, $middlewares);
    }

    // Menangani HTTP DELETE request
    public static function delete(string $path, $callback, $middlewares = [])
    {
        self::handle('DELETE', $path, $callback, $middlewares);
    }

    // Menambahkan middleware ke dalam stack
    public static function middleware($middleware)
    {
        self::$middlewareStack[] = $middleware;
        return new self(); // Mengembalikan objek Route itu sendiri untuk chaining
    }

    // Mengeksekusi grup rute dengan callback yang diberikan
    public static function group($callback)
    {
        // Eksekusi callback di dalam grup
        $callback();

        // Hapus semua middleware dari stack setelah grup selesai dieksekusi
        self::$middlewareStack = [];
    }

    // Method utama untuk menangani request
    private static function handle(string $method, string $path, $callback, $middlewares = [])
    {
        $URI = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        // Memeriksa apakah metode HTTP dan URI cocok dengan path yang diberikan
        if ($_SERVER['REQUEST_METHOD'] === $method && self::matchRoute($path, $URI)) {
            // Menggabungkan middleware dari grup dan rute saat ini
            $allMiddlewares = array_merge(self::$middlewareStack, $middlewares);

            // Eksekusi semua middleware
            foreach ($allMiddlewares as $middleware) {
                if ($middleware === '') {
                    // Panggil checkLogin dari AuthMiddleware jika middleware adalah 'auth'
                    if (!AuthMiddleware::checkLogin()) {
                        return; // Menghentikan eksekusi selanjutnya jika tidak login
                    }
                } elseif (is_callable($middleware)) {
                    $middleware(); // Eksekusi middleware kustom jika callable
                }
            }

            // Ekstrak parameter dari URI
            $params = self::extractParams($path, $URI);

            // Eksekusi fungsi callback (aksi dari controller) dengan parameter yang diberikan
            echo call_user_func_array($callback, $params);
        }
    }

    // Memeriksa apakah URI cocok dengan path rute yang diberikan (termasuk penanganan parameter)
    private static function matchRoute(string $route, string $URI): bool
    {
        // Menggunakan ekspresi reguler untuk mencocokkan pola rute
        $pattern = preg_replace('/\/{([a-zA-Z0-9_-]+)}/', '/([^/]+)', $route);
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = "/^$pattern$/";

        return preg_match($pattern, $URI);
    }

    // Ekstrak nilai parameter dari URI berdasarkan pola rute
    private static function extractParams(string $route, string $URI): array
    {
        preg_match_all('/{([a-zA-Z0-9_-]+)}/', $route, $matches);
        $paramNames = $matches[1];
        $pattern = preg_replace('/\/{([a-zA-Z0-9_-]+)}/', '/([^/]+)', $route);
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = "/^$pattern$/";

        preg_match($pattern, $URI, $values);
        array_shift($values); // Hapus nilai pertama karena itu adalah URI lengkap yang cocok

        return array_combine($paramNames, $values);
    }
}
