<?php /* Smarty version Smarty-3.1.19, created on 2014-07-18 10:23:57
         compiled from "..\views\default\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161153bf9a96cb3f99-90071636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '357190a6dd365eebe8fe3f261b8bcf3cd5bf13d9' => 
    array (
      0 => '..\\views\\default\\user.tpl',
      1 => 1405664635,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161153bf9a96cb3f99-90071636',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53bf9a96d12686_03633016',
  'variables' => 
  array (
    'arUser' => 0,
    'rsUserOrders' => 0,
    'item' => 0,
    'itemChild' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53bf9a96d12686_03633016')) {function content_53bf9a96d12686_03633016($_smarty_tpl) {?>

<h1>Ваши регистрационные данные</h1>
<form>
    <table id="userProfTable">
        <tr>
            <td>Логин (email)</td>
            <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
" name="newName" /></td>
        </tr>
        <tr>
            <td>Тел</td>
            <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
" name="newPhone" /></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><textarea name="newAddress"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['address'];?>
</textarea></td>
        </tr>
        <tr>
            <td>Новый пароль</td>
            <td><input type="password"  name="newPwd1" /></td>
        </tr>
        <tr>
            <td>Повтор пароля</td>
            <td><input type="password"  name="newPwd2" /></td>
        </tr>
        <tr>
            <td>Для сохранения настроек введите старый пароль</td>        
            <td><input type="password" name="curPwd" value='' /></td>        
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="button" value="Сохранить изменения" onclick="updateUserData();" /></td>
        </tr>
    </table>
        
        
    <h2>Заказы:</h2>
    <?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
        Нет заказов
    <?php } else { ?>
        <table border="1" cellpadding="1" cellspacing="1">
            <tr>
                <th>№</th>
                <th>Действие</th>
                <th>ID заказа</th>
                <th>Статус</th>
                <th>Дата создания</th>
                <th>Дата оплаты</th>
                <th>Дополнительная информация</th>
            </tr>
            <tr>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsUserOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']++;
?>
                    <tr>
                        <td <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['orders']['iteration'];?>
></td>
                        <td>
                            <a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
')">Показать товар заказа</a>
                        </td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
                    </tr>
                    <tr class="hideme" id="purchaseForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <td colspan="7">
                            <?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
                                <table border="1" cellpadding="1" cellspacing="1" width="100%">
                                    <tr>
                                        <th>№</th>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Цена</th>
                                        <th>Количество</th>
                                    </tr>
                                    <?php  $_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemChild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->key => $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
                                        <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
/" ><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            <?php }?>
                        </td>
                    </tr>
                <?php } ?>
            </tr>
        </table>
    <?php }?>
</form><?php }} ?>
