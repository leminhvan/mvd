<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();


$autoload['libraries'] = array('database', 'ion_auth', 'session', 'template', 'menu');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'form', 'string', 'notify_helper', 'date');

$autoload['config'] = array();

$autoload['language'] = array('normal');

$autoload['model'] = array('prefs_model');
