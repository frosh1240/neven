<?php
/* Smarty version 3.1.43, created on 2022-11-22 10:39:24
  from 'C:\xampp\htdocs\neven\themes\classic\templates\_partials\helpers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_637ced2c5e5c98_01078933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b688a29688de026af9da5f5c15737d86283ff18f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\neven\\themes\\classic\\templates\\_partials\\helpers.tpl',
      1 => 1658334665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_637ced2c5e5c98_01078933 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'renderLogo' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\neven\\var\\cache\\prod\\smarty\\compile\\classiclayouts_layout_full_width_tpl\\b6\\88\\a2\\b688a29688de026af9da5f5c15737d86283ff18f_2.file.helpers.tpl.php',
    'uid' => 'b688a29688de026af9da5f5c15737d86283ff18f',
    'call_name' => 'smarty_template_function_renderLogo_1907234413637ced2c56ede0_01484743',
  ),
));
?> 

<?php }
/* smarty_template_function_renderLogo_1907234413637ced2c56ede0_01484743 */
if (!function_exists('smarty_template_function_renderLogo_1907234413637ced2c56ede0_01484743')) {
function smarty_template_function_renderLogo_1907234413637ced2c56ede0_01484743(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
?>

  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
">
    <img
      class="logo img-fluid"
      src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo_details']['src'], ENT_QUOTES, 'UTF-8');?>
"
      alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"
      width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo_details']['width'], ENT_QUOTES, 'UTF-8');?>
"
      height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo_details']['height'], ENT_QUOTES, 'UTF-8');?>
">
  </a>
<?php
}}
/*/ smarty_template_function_renderLogo_1907234413637ced2c56ede0_01484743 */
}
