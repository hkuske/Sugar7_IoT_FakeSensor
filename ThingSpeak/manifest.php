<?php
/*
  IoT Fake Sensor for ThingSpeak
 */

$manifest = array (
  'acceptable_sugar_versions' => 
  array (
    0 => '7.*.*',
    1 => '8.*.*',
    2 => '9.*.*',
    3 => '10.*.*',
  ),
  'acceptable_sugar_flavors' => 
  array (
    0 => 'PRO',
    1 => 'CORP',
    2 => 'ENT',
    3 => 'ULT',
  ),
  'readme' => '',
  'key' => '',
  'author' => 'kuske',
  'description' => 'Scheduler: ThingSpeak_Fake',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'ThingSpeak_Fake',
  'published_date' => '2019-05-01 00:00:00',
  'type' => 'module',
  'version' => '9.0.0',
  'remove_tables' => 'false',
);

$installdefs = array (
  'id' => 'ThingSpeak_Fake',
  'copy' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/custom/',
      'to' => 'custom/',
    ),
  ),
);
