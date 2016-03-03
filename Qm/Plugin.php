<?php

namespace Kanboard\Plugin\Qm;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->setTemplateOverride('task/details', 'qm:task/details');
#        $this->hook->on('template:layout:css', 'plugins/qm/css/style.css');
        $this->hook->on('template:layout:css', 'plugins/qm/css/style.css', 'print');
#        $this->hook->on('template:layout:css', array('value' => 'plugins/qm/css/style.css', 'media' => 'screen'));
#        $this->hook->on('template:layout:css', array('plugins/qm/css/style.css', 'screen'));

        $this->on('app.bootstrap', function($container) {
            Translator::load($container['config']->getCurrentLanguage(), __DIR__.'/Locale');
        });
    }

    public function getClasses()
    {
        return array(
            'Plugin\Qm\Model' => array(
                'Qm',
            )
        );
    }

    public function getPluginName()
    {
        return 'Quality Management';
    }

    public function getPluginDescription()
    {
        return t('Extension for Quality Management');
    }

    public function getPluginAuthor()
    {
        return 'Martin Middeke';
    }

    public function getPluginVersion()
    {
        return '0.0.0';
    }

	    public function getPluginHomepage()
    {
        return 'https://github.com/Busfreak/Qm';
    }
}