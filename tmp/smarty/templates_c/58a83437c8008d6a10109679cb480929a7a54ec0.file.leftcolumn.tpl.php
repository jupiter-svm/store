<?php /* Smarty version Smarty-3.1.19, created on 2014-07-29 12:19:13
         compiled from "..\views\default\leftcolumn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1798353b6537f81ec77-13432900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58a83437c8008d6a10109679cb480929a7a54ec0' => 
    array (
      0 => '..\\views\\default\\leftcolumn.tpl',
      1 => 1406621948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1798353b6537f81ec77-13432900',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53b6537f875d43_12081608',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
    'itemChild' => 0,
    'arUser' => 0,
    'hideLoginBox' => 0,
    'cartCntItems' => 0,
    'isAdmin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b6537f875d43_12081608')) {function content_53b6537f875d43_12081608($_smarty_tpl) {?>
    
<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption"><i class="icon-home"></i>&nbsp;<a href="/">На главную</a></div><br />
        
        <!-- Переписать под ul-список -->
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <span class="hiMenu"><a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></span><br />

            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                <?php  $_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemChild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->key => $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
?>
                    <span class="lowMenu"><a href="/category/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/">--<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></span><br />
                <?php } ?>
            <?php }?>
            
        <?php } ?>
    </div>
    
    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <div id="userBox">
            <i class="icon-user"></i>&nbsp;<a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br />
            <i class="icon-off"></i>&nbsp;<a href="/user/logout/" onclick="logout();">Выход</a>
        </div>
    <?php } else { ?>
    
        <div id="userBox" class="hideme">
            <i class="icon-user"></i>&nbsp;<a href="#" id="userLink"></a><br />
            <i class="icon-off"></i>&nbsp;<a href="/user/logout/" onclick="logout();">Выход</a>
        </div>    
        
        <?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)) {?>
            <div id="loginBox" class="well">
                <div class="menuCaption">Авторизация</div>
                <input type="text" name="loginEmail" value="" id="loginEmail" placeholder="Логин" /><br />
                <input type="password" name="loginPwd" value="" id="loginPwd" placeholder="Пароль" /><br />
                <input type="button" class="btn btn-block btn-success" value="Войти" onclick="login();" />
            </div>

            <div id="registerBox" class="well">
                <div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>                
                <div id="registerBoxHidden">
                    E-mail:<br />
                    <input type="email" id="email" name="email" value="" required/><br />
                    Пароль:<br />
                    <input type="password" id="pwd1" name="pwd1" value="" /><br />
                    Повторить пароль:<br />
                    <input type="password" id="pwd2" name="pwd2" value="" /><br />
                    <input type="button" class="btn btn-block btn-success" onclick="registerNewUser();" value="Зарегистрироваться" />
                </div>
            </div>
        <?php }?>
    <?php }?>
    
    <div class="well">
        <div class="menuCaption">Корзина</div>
        <a href="/cart/" title="Перейти в корзину">В корзине</a>
        <span id="cartCntItems">
            <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value>0) {?> (<?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
) <?php } else { ?> (0)<?php }?>
        </span>
    </div>
    <br />
    <br />
    <div class="menuCaption" id="admLink">
        <?php if ($_smarty_tpl->tpl_vars['isAdmin']->value=='true') {?>
            <a href="/admin/">Админцентр</a>
        <?php }?>
    </div>
</div><?php }} ?>
