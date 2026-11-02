<?php

it('generates the helper from custom paths and output', function () {
    $out = sys_get_temp_dir() . '/ide_helper_actions_' . uniqid() . '.php';

    $this->artisan('ide-helper:actions', ['--path' => [__DIR__ . '/stubs/Object'], '--output' => $out])
        ->assertSuccessful();

    expect(file_get_contents($out))->toContain('ObjectAction');

    unlink($out);
});
