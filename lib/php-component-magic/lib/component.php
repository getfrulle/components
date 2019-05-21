<?php
namespace JensTornell\ComponentMagic;

class Component {
  private $global;

  function init($id, $args) {
    $this->globalize($id);

    return $this->buffer($this->merge($args));
  }

  function globalize($id) {
    global $component_magic;

    if(is_string($component_magic['root'])) {
      $roots[0] = $component_magic['root'];
    } else {
      $roots = $component_magic['root'];
    }

    $this->id = $id;
    $this->global = $component_magic;

    foreach($roots as $root) {
      if(!file_exists($root . '/' . $this->filename())) continue;
      $this->filepath = $root . '/' . $this->filename();
      break;
    }
    $this->controller = (isset($this->global['controller'])) ? $this->global['controller'] : [];
  }

  function merge($args) {
    return array_merge($this->controller, $args);
  }

  function extension() {
    return pathinfo($this->id, PATHINFO_EXTENSION);
  }

  function filename() {
    return !empty($this->extension()) ? $this->id : $this->id . '/component.php';
  }

  function buffer($io_data) {
    ob_start();
    if(isset($io_data)) {
      extract($io_data);
      unset($io_data);
    }

    if(!isset($this->filepath)) return;

    include $this->filepath;
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
  }
}