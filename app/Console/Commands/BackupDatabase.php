<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class BackupDatabase extends Command
{
    protected $signature = 'db:backup {--keep=7 : Jumlah backup yang disimpan}';

    protected $description = 'Backup SQLite database ke storage/app/backups';

    public function handle(): int
    {
        $dbPath = database_path('database.sqlite');

        if (! is_file($dbPath)) {
            $this->error('Database SQLite tidak ditemukan.');

            return self::FAILURE;
        }

        $backupDir = storage_path('app/backups');

        if (! File::isDirectory($backupDir)) {
            File::makeDirectory($backupDir, 0755, true);
        }

        $filename = 'database-'.date('Y-m-d-His').'.sqlite';
        $target = $backupDir.DIRECTORY_SEPARATOR.$filename;

        File::copy($dbPath, $target);

        $keep = (int) $this->option('keep');
        $backups = collect(File::files($backupDir))
            ->filter(fn ($file) => str_ends_with($file->getFilename(), '.sqlite'))
            ->sortByDesc(fn ($file) => $file->getMTime())
            ->slice($keep);

        foreach ($backups as $old) {
            File::delete($old->getPathname());
        }

        $this->info("Backup tersimpan: {$filename}");
        $this->info('Ukuran: '.round(File::size($target) / 1024, 1).' KB');

        return self::SUCCESS;
    }
}
