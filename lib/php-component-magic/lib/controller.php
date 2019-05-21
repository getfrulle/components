<?php
namespace JensTornell\ComponentMagic;

function controller($component, $args) {
  global $component_magic;

  if(is_string($component_magic['root'])) {
    $roots[0] = $component_magic['root'];
  } else {
    $roots = $component_magic['root'];
  }

  foreach($roots as $root) {
    $filepath = $root . '/' . $component . '/controller.php'; // Root
        
    if(!file_exists($filepath)) continue;
    
    $controller = include($filepath);
    $component_magic['controller'] = $controller($component, $args);
    return;
  }
}