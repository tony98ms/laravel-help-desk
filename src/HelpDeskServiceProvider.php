<?php

namespace TonyStore\HelpDesk;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;


class HelpDeskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/help-desk.php', 'help-desk');
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/help-desk.php' => config_path('help-desk.php'),
        ], 'help-desk-config');
        $this->publishes([
            __DIR__ . '/../database/migrations/create_ticket_priorities_table.php.stub' => $this->getMigrationFileName('create_ticket_priorities_table.php', 1),
            __DIR__ . '/../database/migrations/create_ticket_types_table.php.stub' => $this->getMigrationFileName('create_ticket_types_table.php', 2),
            __DIR__ . '/../database/migrations/create_ticket_states_table.php.stub' => $this->getMigrationFileName('create_ticket_states_table.php', 3),
            __DIR__ . '/../database/migrations/create_ticket_categories_table.php.stub' => $this->getMigrationFileName('create_ticket_categories_table.php', 4),
            __DIR__ . '/../database/migrations/create_tickets_table.php.stub' => $this->getMigrationFileName('create_tickets_table.php', 5),
            __DIR__ . '/../database/migrations/create_ticket_comments_table.php.stub' => $this->getMigrationFileName('create_ticket_comments_table.php', 6),
            __DIR__ . '/../database/migrations/create_ticket_files_table.php.stub' => $this->getMigrationFileName('create_ticket_files_table.php', 7),
        ], 'migrations-help-desk');
    }
    protected function getMigrationFileName($migrationFileName, $number): string
    {
        $timestamp = date('Y_m_d_His') . $number;

        $filesystem = $this->app->make(Filesystem::class);
        return Collection::make($this->app->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem, $migrationFileName) {
                return $filesystem->glob($path . '*_' . $migrationFileName);
            })
            ->push($this->app->databasePath() . "/migrations/{$timestamp}_{$migrationFileName}")
            ->first();
    }
}
