<?php

namespace App\Support;

class ConfigWriter
{
    /**
     * @param  array<string, mixed>  $data
     */
    public static function write(string $file, array $data): void
    {
        $path = config_path($file.'.php');

        $content = "<?php\n\nreturn ".var_export($data, true).";\n";

        if (file_put_contents($path, $content) === false) {
            throw new \RuntimeException("Gagal menulis config/{$file}.php — cek permission file di server.");
        }

        config([$file => $data]);

        $cached = dirname(__DIR__, 2).'/bootstrap/cache/config.php';

        if (is_file($cached) && ! @unlink($cached)) {
            throw new \RuntimeException('Gagal menghapus bootstrap/cache/config.php — jalankan php artisan config:clear.');
        }
    }

    public static function read(string $file): array
    {
        return config($file, []);
    }
}
