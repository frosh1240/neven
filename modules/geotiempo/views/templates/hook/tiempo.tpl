{*
* 2007-2022 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2022 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="panel">
	<!-- Traducciones <h3>{l s="Hello World" mod="tiempo"}</h3> -->
	<div  class="footer-clima">
	 <p class="page-product-heading">
	 <img src="{$module_dir|escape:'htmlall':'UTF-8'}views/img/{$icon|escape:'htmlall':'UTF-8'}.png"/>  
	<d class="description">{l s='' mod='weather' }{$description}</d>
	<br>
	<d class="ciudad"> {l s='Ciudad: ' mod='weather'}<strong>{$cityw}</strong></d>
	 <br> 
	<d class="temperatura"> {l s='Temperatura: ' mod='weather'}<strong>{$temp}{$units}</strong></d>
	 </p>
	</div>

</div>
