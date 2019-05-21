<?php
// Render
function render($component, $args = null) {
  JensTornell\ComponentMagic\autoload($component);
  JensTornell\ComponentMagic\controller($component, $args);
  
  return component($component);
}


// Component
function component($id, $args = []) {
  $Component = new JensTornell\ComponentMagic\Component();
  return $Component->init($id, $args);
}