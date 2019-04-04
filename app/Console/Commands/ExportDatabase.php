<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Carbon\Carbon;

class ExportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export database to file';

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
        $dateTime = Carbon::now(); // Lấy thời gian hiện tại
        $dateTimeString = $dateTime->format('Y_m_d_H_i_s'); // Tạo chuỗi thời gian

        /* Tạo đường dẫn đến file database export. Lưu ý đường dẫn này phải là đường dẫn tuyệt đối cho nó chắc cú. */
        $fileName = 'database_' . $dateTimeString . '.sql.gz';
        $filePath = storage_path(config('filesystems.path.backup_database'));

        /* Lấy các thông tin cấu hình database từ file env */
        $database = env('DB_DATABASE');
        $userName = env('DB_USERNAME');
        $password = env('DB_PASSWORD');

        $shellCommand = 'mysqldump '
            . $database
            . ' --password="' . $password . '"'
            . ' --user="' . $userName . '"'
            . ' --single-transaction | gzip'
            . ' > ' . $filePath . '/' . $fileName;

        /* Tạo đối tượng Process, chạy shell command và thông báo lên màn hình */
        $process = new Process($shellCommand);
        $process->run();
        $this->info('Export database ' . $database . ' to file ' . $fileName . ' success!');
    }
}
