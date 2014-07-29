<?php /* Smarty version Smarty-3.1.19, created on 2014-07-29 11:43:33
         compiled from "..\views\default\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2910653b681ae6bef69-22470934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2822f2613a41a7e015fea6183cd056fac073e971' => 
    array (
      0 => '..\\views\\default\\product.tpl',
      1 => 1406619812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2910653b681ae6bef69-22470934',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53b681ae729ab8_39502708',
  'variables' => 
  array (
    'rsProduct' => 0,
    'itemInCart' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b681ae729ab8_39502708')) {function content_53b681ae729ab8_39502708($_smarty_tpl) {?>
<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
" class="img-polaroid" with="575" />
<br />
<br />
<span class="productPrice">Стоимость:</span> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


<a href="#" id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme" <?php }?> onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Удалить из корзины">Удалить из корзины</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme" <?php }?> onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false" alt="Добавить в корзину">Добавить в корзину</a>
<br />
<br />
<p><span class="productDescription">Описание:</span> <br /><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }} ?>
