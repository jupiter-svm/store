<?php /* Smarty version Smarty-3.1.19, created on 2014-07-29 14:15:38
         compiled from "..\views\admin\adminCategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133753cf90bf541829-53973207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0256d69ff43211cdcc3bc4b6c8a02d689cfb1365' => 
    array (
      0 => '..\\views\\admin\\adminCategory.tpl',
      1 => 1406628817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133753cf90bf541829-53973207',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53cf90bf5e2ca4_15372340',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
    'rsMainCategories' => 0,
    'mainItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53cf90bf5e2ca4_15372340')) {function content_53cf90bf5e2ca4_15372340($_smarty_tpl) {?><h2>Категории</h2>
<br />
<form class="form-inline" role="form">
    <table class="table table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th>№</th>
                <th>ID</th>
                <th>Название</th>
                <th>Родительская категория</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['iteration']++;
?>
            <tr>                
                <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['iteration'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                <td>
                    <input type="text" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" />
                </td>
                <td>
                    <select id="parentId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <option value="0">Главная категория</option>
                        <?php  $_smarty_tpl->tpl_vars['mainItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mainItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsMainCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mainItem']->key => $_smarty_tpl->tpl_vars['mainItem']->value) {
$_smarty_tpl->tpl_vars['mainItem']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id']==$_smarty_tpl->tpl_vars['mainItem']->value['id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['mainItem']->value['name'];?>
</option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <input type="button" value="Сохранить" class="btn btn-block btn-success" onclick="updateCat(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" />
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</form><?php }} ?>
