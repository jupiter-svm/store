<?php /* Smarty version Smarty-3.1.19, created on 2014-07-25 10:52:07
         compiled from "..\views\admin\adminLeftcolumn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1208653c8d7525a2907-52171993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67a57c50effafc500015548678ce8e06613fefa3' => 
    array (
      0 => '..\\views\\admin\\adminLeftcolumn.tpl',
      1 => 1406271125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1208653c8d7525a2907-52171993',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53c8d7525a3692_89119059',
  'variables' => 
  array (
    'arUser' => 0,
  ),
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
    
    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <div id="userBox">
            <a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br />
            <a href="/user/logout/" onclick="logout();">Выход</a>
        </div>
    <?php } else { ?>
    
        <div id="userBox" class="hideme">
            <a href="#" id="userLink"></a><br />
            <a href="/user/logout/" onclick="logout();">Выход</a>
        </div>    
    <?php }?>
    <br />
    <div class="menuCaption"><a href="/">На главную</a></div>
</div>
<br /><?php }} ?>
