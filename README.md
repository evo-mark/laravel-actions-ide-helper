# Laravel Actions IDE Helper

This packages generates IDE helpers for [Laravel Actions v2](https://github.com/lorisleiva/laravel-actions). Feedback appreciated. Discussion at https://github.com/lorisleiva/laravel-actions/issues/117.

## Installation

```
composer require --dev evo-mark/laravel-actions-ide-helper
```

## Usage

```
php artisan ide-helper:actions
```

By default this scans `app/Actions` and writes `_ide_helper_actions.php` in your project root.

### Options

Scan other directories or write elsewhere for a single run:

```
php artisan ide-helper:actions --path=app/Domain/Billing --path=modules/Users/Actions --output=_ide_helper_actions.php
```

`--path` can be repeated. Relative paths are resolved from your project root.

### Configuration

To change the defaults permanently, publish the config file:

```
php artisan vendor:publish --tag=actions-ide-helper-config
```

Then edit `paths` and `output` in `config/actions-ide-helper.php`. Command-line options override the config.
