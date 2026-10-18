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

        file_put_contents($path, $content);
        config([$file => $data]);
    }

    public static function read(string $file): array
    {
        return config($file, []);
    }
}
