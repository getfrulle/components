# Components - Plugin for IO CMS

**Load template with controller**

```php
global $component_magic;
$component_magic['root'] = [$options_dir, $components_dir];

echo render('--about', ['render_data' => 'Render data']);
```

**Controller**

```php
return function($component, $args) {
  return [
    'hello' => 'world'
  ];
};
```

**Component call**

```php
<?= component('gallery', ['foo', 'bar']); ?>
```

## Libraries used

- https://github.com/jenstornell/php-component-magic