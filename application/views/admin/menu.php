<?php

//master main menu
$main_menu = array(
    array(
      'text' => 'Dashboard',
      'url'  => site_url('admin/dashboard')
    ),
    array(
      'text' => 'Murottal',
      'url'  => site_url('admin/murottal')
    ),
    array(
      'text' => 'Ayat',
      'url'  => site_url('admin/ayat')
    ),
    array(
      'text' => 'Ayat Audio',
      'url'  => site_url('admin/ayat_general')
    ),
    array(
      'text' => 'Ayat Hafalan',
      'url'  => site_url('admin/ayat_hafalan')
    ),
);


//master user menu
$user_menu = array(
    array(
      'text' => 'My Account',
      'url'  => site_url('admin/account')
    ),
    array(
      'text' => 'All Account',
      'url'  => site_url('admin/account/all')
    ),
);

$group = 1; // 1=>admin 
if ( ! $CI->ion_auth->in_group( $group ) ) {

  //If logged user is not admin. 
  //We delete the all acount menu.
  //So, they can't access all accunt page
  
  unset( $user_menu[1] );
} 
?>

<!-- Sidebar Menu -->
<ul class="sidebar-menu">
  <li class="header">Main</li>
  <?php
    foreach( $main_menu as $menu ) {
      $text = $menu['text'];
      $url = $menu['url'];
      echo "<li><a href='$url'><i class='fa fa-link'></i> <span>$text</span></a></li>";
    }
  ?>
  <li class="header">User</li>
  <?php
    foreach( $user_menu as $menu ) {
      $text = $menu['text'];
      $url = $menu['url'];
      echo "<li><a href='$url'><i class='fa fa-link'></i> <span>$text</span></a></li>";
    }
  ?>
</ul><!-- /.sidebar-menu -->