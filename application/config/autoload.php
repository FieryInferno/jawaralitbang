<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages']   = array();
$autoload['libraries']  = array('database', 'session', 'form_validation', 'email', 'upload', 'pagination');
$autoload['drivers']    = array();
$autoload['helper']     = array('url', 'jawara_helper', 'form');
$autoload['config']     = array();
$autoload['language']   = array();
$autoload['model']      = array('ModelLogin', 'ModelLitbang', 'ModelBakesbangpol', 'ModelPeneliti', 'ModelGuest');
