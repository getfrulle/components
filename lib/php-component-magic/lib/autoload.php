<?php
namespace JensTornell\ComponentMagic;

function autoload($component) {
  global $component_magic;

  if(is_string($component_magic['root'])) {
    $roots[0] = $component_magic['root'];
  } else {
    $roots = $component_magic['root'];
  }

  foreach($roots as $root) {
    $filepath = $root . '/' . $component . '/autoload.php'; // ROOT

    if(!file_exists($filepath)) continue;

    include($filepath);
    return;
  }
}