<?php /* Smarty version Smarty-3.1.19, created on 2014-07-22 16:18:52
         compiled from "..\views\admin\admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1592753c8d7525ae6d8-28076782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '877fa133d4a1fd47bc95cac3cd20c3e23765e6c2' => 
    array (
      0 => '..\\views\\admin\\admin.tpl',
      1 => 1406031529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1592753c8d7525ae6d8-28076782',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53c8d7525af171_92892149',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c8d7525af171_92892149')) {function content_53c8d7525af171_92892149($_smarty_tpl) {?><div id="blockNewCategory">
    Новая категория:
    <input type="text" name="newCategoryName" value="" id="newCategory" />
    <br />
    
    Является подкатегорией для
    <select name="generalCatId">
        <option value="0">Главная категория</option>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
        <?php } ?>
    </select>
    <br />
    <input type="button" onclick="newCategory()" value="Добавить категорию" />
</div><?php }} ?>
