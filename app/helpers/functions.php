<?php
function excerpt(?string $text, int $length = 150): string
{
    $text = $text ?? '';
    if (function_exists('mb_strimwidth')) {
        return mb_strimwidth($text, 0, $length, '...');
    }
    return strlen($text) > $length ? substr($text, 0, $length - 3) . '...' : $text;
}

/** Escapa texto para salida segura en HTML */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/** Construye una URL absoluta del sitio a partir de una ruta relativa */
function base_url(string $path = ''): string
{
    return rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
}

/** Construye la URL de un archivo estático dentro de /assets */
function asset(string $path): string
{
    return base_url('assets/' . ltrim($path, '/'));
}

/** URL de una imagen: si viene de /uploads usa esa carpeta, si no, usa /assets/img */
function image_url(?string $filename, string $fallback = 'img/service-1.jpg'): string
{
    if (empty($filename)) {
        return asset($fallback);
    }
    if (str_starts_with($filename, 'http://') || str_starts_with($filename, 'https://')) {
        return $filename;
    }
    return UPLOADS_URL . '/' . ltrim($filename, '/');
}

/** Guarda un mensaje flash en sesión para mostrarlo tras una redirección */
function flash(string $type, string $message): void
{
    $_SESSION['flash'][$type] = $message;
}

/** Recupera y limpia los mensajes flash guardados */
function get_flash(): array
{
    $flash = $_SESSION['flash'] ?? [];
    unset($_SESSION['flash']);
    return $flash;
}

/** Sube una imagen a /uploads y devuelve el nombre de archivo generado, o null si no se envió archivo */
function upload_image(string $inputName, ?string $previous = null): ?string
{
    if (empty($_FILES[$inputName]['name']) || $_FILES[$inputName]['error'] !== UPLOAD_ERR_OK) {
        return $previous;
    }

    $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
    $ext = strtolower(pathinfo($_FILES[$inputName]['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed, true)) {
        flash('error', 'Formato de imagen no permitido. Usa jpg, png, webp o gif.');
        return $previous;
    }

    $newName = uniqid('img_', true) . '.' . $ext;
    $destination = UPLOADS_PATH . '/' . $newName;

    if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $destination)) {
        // borra la imagen anterior si existía y era un archivo subido
        if ($previous && file_exists(UPLOADS_PATH . '/' . $previous)) {
            @unlink(UPLOADS_PATH . '/' . $previous);
        }
        return $newName;
    }

    return $previous;
}

/** Genera un slug amigable a partir de un texto (para URLs de servicios) */
function slugify(string $text): string
{
    $text = strtolower(trim($text));
    $text = str_replace(
        ['á', 'é', 'í', 'ó', 'ú', 'ñ', 'ü'],
        ['a', 'e', 'i', 'o', 'u', 'n', 'u'],
        $text
    );
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);
    return trim($text, '-');
}

/** Repite el valor anterior de un campo de formulario tras un error de validación */
function old(string $key, string $default = ''): string
{
    return e($_POST[$key] ?? $default);
}
