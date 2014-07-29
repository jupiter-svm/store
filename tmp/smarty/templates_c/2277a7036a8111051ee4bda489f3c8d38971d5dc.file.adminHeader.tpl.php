<?php /* Smarty version Smarty-3.1.19, created on 2014-07-29 15:03:43
         compiled from "..\views\admin\adminHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2273753c8d752506d86-69362550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2277a7036a8111051ee4bda489f3c8d38971d5dc' => 
    array (
      0 => '..\\views\\admin\\adminHeader.tpl',
      1 => 1406631822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2273753c8d752506d86-69362550',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53c8d752596db0_20831393',
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c8d752596db0_20831393')) {function content_53c8d752596db0_20831393($_smarty_tpl) {?>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css" />
        <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.css" type="css" />
        <link rel="stylesheet" href="/css/bootstrap/css/bootstrap-responsive.css" type="css" />
        <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/admin.js"></script>
    </head>
    
    <body>
        <div class="container containter-fluid">
        <div class="row">
            <div class="span12" id="header">
                <div id="header">
                    <h1>Управление сайтом</h1>
                </div>   
            </div>
        </div>
            
        <div class="row">    
             <div class="span6 block" id="leftColumn">
                <?php echo $_smarty_tpl->getSubTemplate ('adminLeftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

             </div>
    
        
  
         <div class="span6 block">
            <div><?php }} ?>
