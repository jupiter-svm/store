<?php /* Smarty version Smarty-3.1.19, created on 2014-07-23 17:20:33
         compiled from "..\views\admin\adminProducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2544053cfa813457df5-60575398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fd5cc39cfb1253bd569446ee4592fcdc4367475' => 
    array (
      0 => '..\\views\\admin\\adminProducts.tpl',
      1 => 1406121631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2544053cfa813457df5-60575398',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53cfa8134b0653_04725196',
  'variables' => 
  array (
    'rsCategories' => 0,
    'itemCat' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cfa8134b0653_04725196')) {function content_53cfa8134b0653_04725196($_smarty_tpl) {?><h2>Товар</h2>
<table border="1" cellpadding="1" cellspacing="1">
    <caption>Довабить продукт</caption>
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Описание</th>
        <th>Сохранить</th>
    </tr>
    <tr>
        <td>
            <input type="edit" id="newItemName" value="" />
        </td>
        <td>
            <input type="edit" id="newItemPrice" value="" />
        </td>
        <td>
            <select name="" id="newItemCatId">
                <option value="0">Главная категория</option>
                <?php  $_smarty_tpl->tpl_vars['itemCat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemCat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->key => $_smarty_tpl->tpl_vars['itemCat']->value) {
$_smarty_tpl->tpl_vars['itemCat']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>
</option>
                <?php } ?>
            </select>
        </td>
        <td>
            <textarea name="" id="newItemDesc" cols="30" rows="10"></textarea>
        </td>
        <td>
            <input type="button" value="Сохранить" onclick="addProduct();" />
        </td>
    </tr>
</table><?php }} ?>
