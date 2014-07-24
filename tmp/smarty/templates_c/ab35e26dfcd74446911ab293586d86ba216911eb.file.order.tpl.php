<?php /* Smarty version Smarty-3.1.19, created on 2014-07-16 15:39:23
         compiled from "..\views\default\order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1478353c5171c81b1f1-44951463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab35e26dfcd74446911ab293586d86ba216911eb' => 
    array (
      0 => '..\\views\\default\\order.tpl',
      1 => 1405510647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1478353c5171c81b1f1-44951463',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53c5171c95f092_16457926',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
    'arUser' => 0,
    'buttonClass' => 0,
    'name' => 0,
    'phone' => 0,
    'address' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c5171c95f092_16457926')) {function content_53c5171c95f092_16457926($_smarty_tpl) {?>

<h2>Данные заказа</h2>
<form action="/cart/saveorder/" method="POST" id="frmOrder">
    <table>
        <tr>
            <td>№</td>
            <td>Наименование</td>
            <td>Количество</td>
            <td>Цена за единицу</td>
            <td>Стоимость</td>
        </tr>
        
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
                <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
                <td>
                    <span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></span>
                    <input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
" />
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

                </td>
                <td>
                    <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
" />
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                    </span>
                </td>
                <td>
                    <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <input type="hidden" name="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
" />
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>

                    </span>
                </td>
            </tr>
        <?php } ?>
    </table>
    
    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_variable('', null, 0);?>
        <h2>Данные заказчика</h2>
        <div id="orderUserInfoBox" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
>
            <?php $_smarty_tpl->tpl_vars['name'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['name'], null, 0);?>
            <?php $_smarty_tpl->tpl_vars['phone'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['phone'], null, 0);?>
            <?php $_smarty_tpl->tpl_vars['address'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['address'], null, 0);?>
            <table>
                <tr>
                    <td>Имя*</td>
                    <td><input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" id="name" /></td>
                </tr>
                <tr>
                    <td>Тел*</td>
                    <td><input type="text" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
" id="phone" /></td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea name="address" id="address" cols="30" rows="10"><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</textarea></td>
                </tr>
            </table>
        </div>
    <?php } else { ?>
        <div id="loginBox">
            <div class="menuCaption">Авторизация</div>
            <table>
                <tr>
                    <td>Логин</td>
                    <td><input type="text" name="loginEmail" value="" id="loginEmail" /></td>
                </tr>
                <tr>
                    <td>Пароль</td>
                    <td><input type="password" name="loginPwd" value="" id="loginPwd" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="button" value="Войти" onclick="login();" /></td>
                </tr>
            </table>
        </div>
        
        <div id="registerBox">
            <div class="menuCaption">Регистрация</div>            
                E-mail*:<br />
                <input type="text" id="email" name="email" value=""/><br />
                Пароль*:<br />
                <input type="password" id="pwd1" name="pwd1" value="" /><br />
                Повторить пароль*:<br />
                <input type="password" id="pwd2" name="pwd2" value="" /><br />
                
                Имя*: <input type="text" name="name" value="" id="name" /><br />
                Тел*: <input type="text" name="phone" value="" id="phone" /><br />
                Адрес*: <textarea name="address" id="address" cols="30" rows="10"></textarea>
                <input type="button" onclick="registerNewUser();" value="Зарегистрироваться" />
           
        </div>
        <?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_variable("class='hidden'", null, 0);?>
    <?php }?>
    
    <input type="button" id="btnSaveOrder" value="Оформить заказ" onclick="saveOrder();" />
</form><?php }} ?>
