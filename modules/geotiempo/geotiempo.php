<?php
/**
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
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class Geotiempo extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'geotiempo';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Carlos Moreno';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('pr_geotiempo');
        $this->description = $this->l('Modulo para mostrar el clima');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        Configuration::updateValue('GEOTIEMPO_LIVE_MODE', false);
        
        if (!Configuration::updateValue(
            'WEATHER_SKIP_CAT',
            15
        )
        ) {
            return false;
        }
        if (!Configuration::updateValue(
            'WEATHER_COLOR',
            '10'
        )
        ) {
            return false;
        }
        if (!Configuration::updateValue(
            'WEATHER_DESC',
            'Title'
        )
        ) {
            return false;
        }
        
        if (!Configuration::updateValue(
            'WEATHER_LOCATION2',
            'Bogota'
        )
        ) {
            return false;
        }
        
        if (!Configuration::updateValue(
            'WEATHER_UNITS',
            '°C'
        )
        ) {
            return false;
        }
    
        if (!Configuration::updateValue(
            'WEATHER_WIDTH',
            'auto'
        )
        ) {
            return false;
        }
        if (!Configuration::updateValue(
            'WEATHER_HEIGHT',
            'auto'
        )
        ) {
            return false;
        }
        if (!Configuration::updateValue(
            'WEATHER_ALIGN',
            '75531ffd230550d695d0046d4c03e120'
        )){
            return false;
        }
        if (!Configuration::updateValue(
            'WEATHER_DESC',
            'Title'
        )
        ) {
            return false;
        }
      
        if (!Configuration::updateValue(
            'WEATHER_STYLE',
            '1'
        )
        ) {
            return false;
        }
        if (!Configuration::updateValue(
            'WEATHER_SORT',
            0
        )
        ) {
            return false;
        }

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('displayBackOfficeFooter') &&
            $this->registerHook('displayFooter');


    }

    public function uninstall()
    {
        Configuration::deleteByName('GEOTIEMPO_LIVE_MODE');

        return parent::uninstall();
    }

    /**
     * Load the configuration form
     */
    public function getContent()
    {
        /**
         * If values have been submitted in the form, process.
         */
        if (((bool)Tools::isSubmit('submitGeotiempoModule')) == true) {
            $this->postProcess();
        }

        $this->context->smarty->assign('module_dir', $this->_path);

        $output = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        return $output.$this->renderForm();
    }

    /**
     * Create the form that will be displayed in the configuration of your module.
     */
    protected function renderForm()
    {
        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitGeotiempoModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            .'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), /* Add values for your inputs */
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm(array($this->getConfigForm()));
    }

    /**
     * Create the structure of your form.
     */
    protected function getConfigForm()
    {
        return array(
            'form' => array(
                'legend' => array(
                'title' => $this->l('Settings'),
                'icon' => 'icon-cogs',
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Live mode'),
                        'name' => 'GEOTIEMPO_LIVE_MODE',
                        'is_bool' => true,
                        'desc' => $this->l('Use this module in live mode'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'col' => 3,
                        'type' => 'text',
                        'prefix' => '<i class="icon icon-envelope"></i>',
                        'desc' => $this->l('Enter a valid email address'),
                        'name' => 'GEOTIEMPO_ACCOUNT_EMAIL',
                        'label' => $this->l('Email'),
                    ),
                    array(
                        'type' => 'password',
                        'name' => 'GEOTIEMPO_ACCOUNT_PASSWORD',
                        'label' => $this->l('Password'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );
    }

    /**
     * Set values for the inputs.
     */
    protected function getConfigFormValues()
    {
        return array(
            'GEOTIEMPO_LIVE_MODE' => Configuration::get('GEOTIEMPO_LIVE_MODE', true),
            'GEOTIEMPO_ACCOUNT_EMAIL' => Configuration::get('GEOTIEMPO_ACCOUNT_EMAIL', 'contact@prestashop.com'),
            'GEOTIEMPO_ACCOUNT_PASSWORD' => Configuration::get('GEOTIEMPO_ACCOUNT_PASSWORD', null),
        );
    }

    /**
     * Save form data.
     */
    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

    /**
    * Add the CSS & JavaScript files you want to be loaded in the BO.
    */
    public function hookBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            $this->context->controller->addCSS($this->_path.'views/css/back.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
        $this->context->controller->addCSS($this->_path.'/views/css/front.css');
    }

    public function hookDisplayBackOfficeFooter()
    {
        /* Place your code here. */
    }



    public function hookDisplayFooter($ipaddress)
    {   
        
        
        $ip = Tools::getRemoteAddr();
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        
        $units = Configuration::get('WEATHER_UNITS');

        //Se crea un valor por medio de una representación almacenada UNSERIALIZE
        //File_get_contents permite transmitir el contenido de un fichero a una cadena
        //Se obtiene los datos principales para calcular el tiempo por medio de la IP

        //$query = @unserialize(Tools::file_get_contents('http://ip-api.com/php/'.$ip));
        $query = @unserialize(Tools::file_get_contents('http://ip-api.com/php/186.155.11.212'));
        if ($query && $query['status'] == 'success') {
            //Se obtienen las coordenadas a buscar 
            $lat = $query['lat'];
            $lon = $query['lon'];
            $configF = Configuration::get('WEATHER_ALIGN');
            
            $url = "http://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid=".Configuration::get('WEATHER_ALIGN')."&units=".Configuration::get('WEATHER_UNITS')."&lang=".$lang."";
            if (@Tools::file_get_contents($url)) {
                $djson = Tools::file_get_contents($url);
                $clima = json_decode($djson);
                $temp = $clima->main->temp;
                $weather = Tools::strtolower($clima->weather[0]->main);
                $icon = Tools::strtolower($clima->weather[0]->icon);
                $description =Tools::strtolower($clima->weather[0]->description);
                $city = $clima->name;
            } else {
                return false;
            }
        } else {
            $url = "http://api.openweathermap.org/data/2.5/weather?q=".Configuration::get('WEATHER_LOCATION2')."&appid=".Configuration::get('WEATHER_ALIGN')."&units=".Configuration::get('WEATHER_UNITS')."&lang=".$lang."";
            if (@Tools::file_get_contents($url)) {
                $djson = Tools::file_get_contents($url);
                $clima = json_decode($djson);
                @$temp = $clima->main->temp;
                @$weather = Tools::strtolower($clima->weather[0]->main);
                @$icon = Tools::strtolower($clima->weather[0]->icon);
                @$city = $clima->name;
                @$description = $clima->description;
                
            } else {
                return false;
            }
        }

        $width = Configuration::get('WEATHER_WIDTH');
        $height = Configuration::get('WEATHER_HEIGHT');
        if ($width != "auto") {
            $width2 = $width - 80;
        } else {
            $width2 = $width;
        }
        if ($width != "auto") {
            $height2 = $height - 100;
        } else {
            $height2 = $height;
        }
        
        $type = Configuration::get('WEATHER_TYPE');

        $style = Configuration::get('WEATHER_STYLE');
        $color = Configuration::get('WEATHER_COLOR');
        $sort = Configuration::get('WEATHER_SORT');

        $this->context->controller->addCSS(
            ($this->_path).'views/css/front.css',
            'all'
        );
        
        $this->context->smarty->assign(
            [
                'style' => $style,
                'heighta' => $height,
                'icon' => $icon,
                'temp' =>  $temp,
                'cityw' => $city,
                'trimp' => $color,
                'units' => $units,
                'typei' => $type,
                'description' => $description
            ]
        );

        

        //smarty php sirve para marquetear en HTML
        //return $this->context->smarty->fetch($this->local_path.'views/templates/hook/tiempo.tpl');
        return $this->display(__FILE__,'tiempo.tpl');
    }


}