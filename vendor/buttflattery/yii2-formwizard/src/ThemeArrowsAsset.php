<?php
namespace buttflattery\formwizard;

use buttflattery\formwizard\ThemeBase;

class ThemeArrowsAsset extends ThemeBase
{

    public $css = [
        'css/theme/smart_wizard_theme_arrows.min.css',
    ];

    public function init()
    {
        parent::init();
        array_push($this->depends, 'buttflattery\formwizard\FormWizardAsset');
    }
}
