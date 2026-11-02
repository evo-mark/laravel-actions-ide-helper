<?php

namespace EvoMark\LaravelActionsIdeHelper\Commands;

use EvoMark\LaravelActionsIdeHelper\Service\ActionInfoFactory;
use EvoMark\LaravelActionsIdeHelper\Service\BuildIdeHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class LaravelActionsIdeHelperCommand extends Command
{
    public $signature = 'ide-helper:actions
                        {--path=* : Directory to scan for actions (repeatable). Defaults to the "paths" config value}
                        {--output= : File to write the helper to. Defaults to the "output" config value}';

    public $description = 'Generate a new IDE Helper file for Laravel Actions.';

    public function handle(): int
    {
        /** @var list<string> $paths */
        $paths = array_values(array_filter(
            (array) ($this->option('path') ?: config('actions-ide-helper.paths', ['app/Actions'])),
            is_string(...)
        ));
        $outputOption = $this->option('output');
        $output = is_string($outputOption) && $outputOption !== ''
            ? $outputOption
            : (string) config('actions-ide-helper.output', '_ide_helper_actions.php');

        $actionInfos = [];
        foreach ($paths as $path) {
            $path = $this->absolute($path);

            if (!is_dir($path)) {
                $this->warn("Skipping missing directory: {$path}");
                continue;
            }

            $actionInfos = array_merge($actionInfos, ActionInfoFactory::create($path));
        }

        $outfile = $this->absolute($output);

        file_put_contents($outfile, BuildIdeHelper::create()->build($actionInfos));

        $this->comment('IDE Helpers generated for Laravel Actions at ' . Str::of($outfile)->toString());

        return self::SUCCESS;
    }

    protected function absolute(string $path): string
    {
        $isAbsolute = Str::startsWith($path, ['/', '\\']) || preg_match('/^[A-Za-z]:[\\\\\/]/', $path) === 1;

        return rtrim($isAbsolute ? $path : base_path($path), '/\\');
    }
}
