<?php /* Smarty version Smarty-3.1.19, created on 2014-07-28 17:36:00
         compiled from "..\views\default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1289453b6537f72d422-67893718%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da9a816272ef1c29ccf3d12e5d88091fa492f942' => 
    array (
      0 => '..\\views\\default\\header.tpl',
      1 => 1406554494,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1289453b6537f72d422-67893718',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53b6537f811789_44572743',
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b6537f811789_44572743')) {function content_53b6537f811789_44572743($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
/css/main.css" type="css" />
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.css" type="css" />
    <link rel="stylesheet" href="/css/bootstrap/css/bootstrap-responsive.css" type="css" />
    <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
/js/main.js"></script>
</head>
<body>
    <div class="container containter-fluid">
        <div class="row">
            <div class="span12" id="header">
                <div>
                    <h1>My shop - Интернет магазин</h1>
                </div>   
            </div>
        </div>
        
  
     <div class="row">    
         <div class="span6 block" id="leftColumn">
            <?php echo $_smarty_tpl->getSubTemplate ('leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

         </div>
    
    
  
         <div class="span6 block">
            <div id="centerColumn">
    <?php }} ?>
