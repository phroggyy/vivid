# Vivid for Laravel

A drop-in flat-file blog system for Laravel

## Installation

```bash
composer require phroggyy/vivid:0.1-dev
```

## Usage

In a service provider, such as your `AppServiceProvider`, add

```php
Vivid::admin();
Vivid::routes();
```
