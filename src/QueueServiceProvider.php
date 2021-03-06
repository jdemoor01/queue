<?php namespace NZTim\Queue;

use App;
use Illuminate\Support\ServiceProvider;

class QueueServiceProvider extends ServiceProvider
{
    protected $defer = false;

    protected $commands = [
        Commands\AddMigrationCommand::class,
        Commands\ProcessCommand::class,
        Commands\FailedCommand::class,
        Commands\ClearFailedCommand::class,
        Commands\ListCommand::class,
        Commands\Daemon::class,
        Commands\Pause::class,
        Commands\Resume::class,
        Commands\LogStatus::class,
        Commands\Status::class,
    ];

    public function register()
    {
        App::bind('queuemgr', function() {
            return App::make(QueueManager::class);
        });
        $this->commands($this->commands);
    }

    public function boot()
    {
        //
    }
}
