<?php
namespace buttflattery\formwizard;

use buttflattery\formwizard\ThemeBase;

class ThemeMaterialVerticleAsset extends ThemeBase
{
    public $js = [
        'js/theme/waves.js',
        'js/theme/material.js',
    ];

    public $css = [
        'css/theme/smart_wizard_theme_material-v.min.css',
        'css/theme/waves.css',
    ];

    public function init()
    {
        parent::init();
        array_push($this->depends, 'buttflattery\formwizard\FormWizardAsset');
    }
}