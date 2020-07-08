<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
  public function register()
  {
    config([
      'laravellocalization.supportedLocales' => [
        // 'ace' => array('name' => 'Achinese', 'script' => 'Latn', 'native' => 'Aceh'),
        // 'ca'  => array('name' => 'Catalan', 'script' => 'Latn', 'native' => 'català'),
        'ar'  => array('name' => 'Arabic','script' => 'Arab', 'native' => 'الغة العربية'),
        'en'  => array('name' => 'English', 'script' => 'Latn', 'native' => 'English'),
      ],

      'laravellocalization.useAcceptLanguageHeader' => true,

      'laravellocalization.hideDefaultLocaleInURL' => false,
    ]);
  }
}
