<?php
/* Smarty version 3.1.43, created on 2022-11-22 10:39:28
  from 'C:\xampp\htdocs\neven\modules\geotiempo\views\templates\hook\tiempo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_637ced307ee0b9_50906771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ac5ef5f95f3a13b70673080afaa5ec9bce46c2e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\neven\\modules\\geotiempo\\views\\templates\\hook\\tiempo.tpl',
      1 => 1669066274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_637ced307ee0b9_50906771 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel">
	<!-- Traducciones <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"Hello World",'mod'=>"tiempo"),$_smarty_tpl ) );?>
</h3> -->
	<div  class="footer-clima">
	 <p class="page-product-heading">
	 <img src="<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_dir']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
views/img/<?php echo htmlspecialchars(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['icon']->value,'htmlall','UTF-8' )), ENT_QUOTES, 'UTF-8');?>
.png"/>  
	<d class="description"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'','mod'=>'weather'),$_smarty_tpl ) );
echo htmlspecialchars($_smarty_tpl->tpl_vars['description']->value, ENT_QUOTES, 'UTF-8');?>
</d>
	<br>
	<d class="ciudad"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Ciudad: ','mod'=>'weather'),$_smarty_tpl ) );?>
<strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cityw']->value, ENT_QUOTES, 'UTF-8');?>
</strong></d>
	 <br> 
	<d class="temperatura"> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Temperatura: ','mod'=>'weather'),$_smarty_tpl ) );?>
<strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['temp']->value, ENT_QUOTES, 'UTF-8');
echo htmlspecialchars($_smarty_tpl->tpl_vars['units']->value, ENT_QUOTES, 'UTF-8');?>
</strong></d>
	 </p>
	</div>

</div>
<?php }
}
