<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;

class RestoreDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:restore {index=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restore database from file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file = $this->backupFile();

        if (!$file) {
            return $this->info('Not found backup file');
        }

        $confirm = $this->confirm('All current data will be deleted. Do you want to continue?');

        if (!$confirm) {
            return;
        }

        $database = env('DB_DATABASE');
        $userName = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $filePath = storage_path(config('filesystems.path.backup_database')) . '/' . $file;

        // gunzip < file_path_to_write_to.sql.gz | mysql --user=user_name --password=your_pass database_name

        $this->deleteAllTable();

        $shellCommand = 'gunzip < '
            . $filePath
            . ' | mysql '
            . ' --user="' . $userName . '"'
            . ' --password="' . $password . '" '
            . $database;

        $process = new Process($shellCommand);
        $process->run();
        $this->info('Restore database ' . $database . ' from file ' . $file . ' success!');
    }

    protected function backupFile()
    {
        $index = (int)$this->argument('index');

        $files = Storage::disk('backup-database')->files();
        $filesCount = count($files);

        if ($filesCount && $index < $filesCount) {
            return $files[$index];
        }

        return null;
    }

    protected function deleteAllTable()
    {
        $colname = 'Tables_in_' . env('DB_DATABASE');
        $tables = DB::select('SHOW TABLES');
        $droplist = [];

        foreach ($tables as $table) {
            $droplist[] = $table->$colname;
        }

        if (count($droplist)) {
            $droplist = implode(',', $droplist);

            DB::beginTransaction();
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            DB::statement("DROP TABLE $droplist");
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
            DB::commit();
        }


        $this->info('Delete all table of database ' . env('DB_DATABASE'));
    }
}
