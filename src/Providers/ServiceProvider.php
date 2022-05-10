<?php

namespace Golchha21\Options\Providers;

use Golchha21\Options\Options;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as SP;

class ServiceProvider extends SP
{
    const CONFIG_PATH = __DIR__ . '/../config/Options.php';
    const DB_PATH = __DIR__.'/../database/migrations';

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                self::CONFIG_PATH => config_path('Options.php'),
            ], 'config');

            $this->publishes([
                self::DB_PATH => database_path('migrations'),
            ], 'migrations');

        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(self::CONFIG_PATH, 'options');

        $this->app->bind('option', function ($app) {
            return new Options();
        });

        collect($this->getDirectives())->each(function ($item, $key) {
            Blade::directive($key, $item);
        });
    }

    /**
     * @return array
     */
    private function getDirectives(): array
    {
        return [

            /*
            |---------------------------------------------------------------------
            | @option, @option_exists
            |---------------------------------------------------------------------
            */

            'option' => function ($expression) {
                return "<?php echo option({$expression}); ?>";
            },

            'option_exists' => function ($expression) {
                return "<?php echo option_exists({$expression}); ?>";
            },
        ];
    }
}
