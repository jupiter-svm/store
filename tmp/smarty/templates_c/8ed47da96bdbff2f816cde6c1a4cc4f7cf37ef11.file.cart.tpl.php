<?php /* Smarty version Smarty-3.1.19, created on 2014-07-29 10:11:28
         compiled from "..\views\default\cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1489853bd3ba8c6d2a0-48041612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ed47da96bdbff2f816cde6c1a4cc4f7cf37ef11' => 
    array (
      0 => '..\\views\\default\\cart.tpl',
      1 => 1406614287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1489853bd3ba8c6d2a0-48041612',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53bd3ba8cbba03_34343483',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53bd3ba8cbba03_34343483')) {function content_53bd3ba8cbba03_34343483($_smarty_tpl) {?>
<h2>Корзина</h2>
<br />
<br />

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
    В корзине пусто
<?php } else { ?>
    <form action="/cart/order/" method="POST">
        <table id="cartTable">
            <tr>
                <td>№</td>
                <td>Наименование</td>
                <td>Количество</td>
                <td>Цена за единицу</td>
                <td>Цена</td>
                <td>Действие</td>
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
</a></td><br />
                <td><input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="1" size="2" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" type="text" /></td>
                <td>
                    <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span>
                </td>
                <td>
                    <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span>
                </td>
                <td>
                    <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Удалить из корзины">Удалить</a>
                    <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="hideme" href="#" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Добавить в корзину">Добавить</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        
        <input type="submit" value="Оформить заказ" />
    </form>
<?php }?><?php }} ?>
