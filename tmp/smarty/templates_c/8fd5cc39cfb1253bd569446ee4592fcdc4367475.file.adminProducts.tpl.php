<?php /* Smarty version Smarty-3.1.19, created on 2014-07-29 14:24:27
         compiled from "..\views\admin\adminProducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2544053cfa813457df5-60575398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fd5cc39cfb1253bd569446ee4592fcdc4367475' => 
    array (
      0 => '..\\views\\admin\\adminProducts.tpl',
      1 => 1406629455,
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
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cfa8134b0653_04725196')) {function content_53cfa8134b0653_04725196($_smarty_tpl) {?><h2 id="adminPageHeader">Товар</h2>
<table class="table table-striped table-bordered table-hover table-condensed">
    <caption class="productsCaption">Добавить продукт</caption>
    <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Описание</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <input type="text" id="newItemName" value="" />
            </td>
            <td>
                <input type="text" id="newItemPrice" value="" />
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
                <input type="button" value="Сохранить"  class="btn btn-block btn-success" onclick="addProduct();" />
            </td>
        </tr>
    </tbody>
</table>
<br />
<br />
                
<table class="table table-bordered table-hover table-condensed">
    <caption class="productsCaption">Редактировать</caption>
    <thead>
        <tr>
            <th>№</th>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Описание</th>
            <th>Удалить</th>
            <th>Изображение</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
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
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                <td>
                    <input type="text" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" />
                </td>
                <td>
                    <input type="text" id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
" />
                </td>
                <td>
                    <select id="itemCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <option value="0">Главная категория</option>
                        <?php  $_smarty_tpl->tpl_vars['itemCat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemCat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->key => $_smarty_tpl->tpl_vars['itemCat']->value) {
$_smarty_tpl->tpl_vars['itemCat']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['category_id']==$_smarty_tpl->tpl_vars['itemCat']->value['id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>
</option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <textarea id="itemDesc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</textarea>
                </td>
                <td>
                    <input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['status']==0) {?> checked="checked" <?php }?> />
                </td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['image']) {?>
                        <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="" />
                    <?php }?>
                    <form action="/admin/upload/" method="post" enctype="multipart/form-data">
                        <input type="file"  name="filename" /><br />
                        <input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
                        <input type="submit" class="btn btn-block btn-success" value="Загрузить" /><br />
                    </form>
                </td>
                <td>
                    <input type="button" value="Сохранить" class="btn btn-block btn-success" onclick="updateProduct('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');" />
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table><?php }} ?>
