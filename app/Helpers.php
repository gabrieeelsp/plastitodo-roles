<?php
  function setActive($path, $active = 'active'){
    return call_user_func_array('Request::is', (array) $path) ? $active : '';
  }

  function setMenuOpen($path, $menu_open = 'menu-open'){
    return call_user_func_array('Request::is', (array) $path) ? $menu_open : '';
  }
