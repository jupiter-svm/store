<?php /* Smarty version Smarty-3.1.19, created on 2014-07-03 15:07:30
         compiled from "..\views\default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1885253b3ef65276347-97346905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0487525b4e13abf1c5e8b02b7635b2cdca02f5b1' => 
    array (
      0 => '..\\views\\default\\header.tpl',
      1 => 1404385648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1885253b3ef65276347-97346905',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53b3ef652eb648_85244514',
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b3ef652eb648_85244514')) {function content_53b3ef652eb648_85244514($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
/css/main.css" type="css" />
</head>
<body>
    <div id="header">
        <h1>My shop - Интернет магазин</h1>
    </div>    
           
    <?php echo $_smarty_tpl->getSubTemplate ('leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
    
    
    <div id="centerColumn">
    <?php }} ?>
