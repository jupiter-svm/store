<?php /* Smarty version Smarty-3.1.19, created on 2014-07-23 10:58:12
         compiled from "..\views\admin\adminLeftcolumn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1208653c8d7525a2907-52171993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67a57c50effafc500015548678ce8e06613fefa3' => 
    array (
      0 => '..\\views\\admin\\adminLeftcolumn.tpl',
      1 => 1406098687,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1208653c8d7525a2907-52171993',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53c8d7525a3692_89119059',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c8d7525a3692_89119059')) {function content_53c8d7525a3692_89119059($_smarty_tpl) {?>

<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div><br />
        <a href="/admin/">Главная</a><br />
        <a href="/admin/category/">Категории</a><br />
        <a href="/admin/products/">Товар</a><br />
        <a href="/admin/orders/">Заказы</a>
    </div>
    <div class="menuCaption"><a href="/">На главную</a></div>
</div>
<br /><?php }} ?>
