<?php /* Smarty version Smarty-3.1.19, created on 2014-07-03 15:16:38
         compiled from "..\views\default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:327153b3df372dd6c9-65745621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a936e90acf2299d7a8c0263bb8d340a4e3483666' => 
    array (
      0 => '..\\views\\default\\index.tpl',
      1 => 1404386196,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327153b3df372dd6c9-65745621',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53b3df374fc728_86042789',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b3df374fc728_86042789')) {function content_53b3df374fc728_86042789($_smarty_tpl) {?>

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
" width="100" />
        </a>
        <br />
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
    </div>
        
    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%3==0) {?>
        <div id="prodClear"></div>
    <?php }?>
<?php } ?><?php }} ?>
