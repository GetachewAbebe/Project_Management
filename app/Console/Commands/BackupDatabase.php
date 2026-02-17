<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup {--filename= : Custom filename for the backup}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database to a file in storage/app/backups';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $connection = config('database.default');
        $dbConfig = config("database.connections.{$connection}");

        $date = now()->format('Y-m-d_H-i-s');
        $filename = $this->option('filename') ?: "backup_{$connection}_{$date}.sql";

        $backupDir = storage_path('app/backups');
        if (! file_exists($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        $filePath = "{$backupDir}/{$filename}";

        $this->info("Starting backup for '{$connection}' connection...");

        try {
            if ($dbConfig['driver'] === 'mysql') {
                $this->backupMysql($dbConfig, $filePath);
            } elseif ($dbConfig['driver'] === 'pgsql') {
                $this->backupPostgres($dbConfig, $filePath);
            } else {
                $this->error("Backup for driver '{$dbConfig['driver']}' is not supported yet.");

                return 1;
            }

            $this->info("Backup successfully created: {$filePath}");
            $this->info('Size: '.number_format(filesize($filePath) / 1024 / 1024, 2).' MB');

            return 0;
        } catch (\Exception $e) {
            $this->error('Backup failed: '.$e->getMessage());

            return 1;
        }
    }

    protected function backupMysql($config, $filePath)
    {
        $command = sprintf(
            'mysqldump --user=%s --host=%s --port=%s %s > %s',
            escapeshellarg($config['username']),
            escapeshellarg($config['host']),
            escapeshellarg($config['port']),
            escapeshellarg($config['database']),
            escapeshellarg($filePath)
        );

        $this->executeCommand($command, ['MYSQL_PWD' => $config['password']]);
    }

    protected function backupPostgres($config, $filePath)
    {
        $command = sprintf(
            'pg_dump -U %s -h %s -p %s %s > %s',
            escapeshellarg($config['username']),
            escapeshellarg($config['host']),
            escapeshellarg($config['port']),
            escapeshellarg($config['database']),
            escapeshellarg($filePath)
        );

        $this->executeCommand($command, ['PGPASSWORD' => $config['password']]);
    }

    protected function executeCommand($command, $env = [])
    {
        $process = Process::fromShellCommandline($command, null, $env);
        $process->setTimeout(300); // 5 minutes
        $process->run();

        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }
}
