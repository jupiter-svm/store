<?php /* Smarty version Smarty-3.1.19, created on 2014-07-29 11:43:17
         compiled from "..\views\default\category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1921253b6537f87fcc7-80496445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6ed03858ce61aefed1dd21f0054ba9dc8f2346f' => 
    array (
      0 => '..\\views\\default\\category.tpl',
      1 => 1406619795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1921253b6537f87fcc7-80496445',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53b6537f8f2367_43060871',
  'variables' => 
  array (
    'rsCategory' => 0,
    'rsChildCats' => 0,
    'item' => 0,
    'rsProducts' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b6537f8f2367_43060871')) {function content_53b6537f8f2367_43060871($_smarty_tpl) {?><h2>Товары категории "<?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
"</h2>
<br />

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsChildCats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    <h3><a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h3>
<?php } ?>

<br />

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>    
    <div class="goodPosition">
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
            <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" class="img-polaroid" width="100" />
        </a>
        <br />
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
    </div>
        
    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%3==0) {?>
        <div id="prodClear"></div>
    <?php }?>
<?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
    <?php if (!$_smarty_tpl->tpl_vars['rsChildCats']->value) {?>
        <h4>В категории нет товаров</h4>
    <?php }?>
<?php } ?><?php }} ?>
