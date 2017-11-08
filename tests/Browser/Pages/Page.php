<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Page as BasePage;

abstract class Page extends BasePage
{
    /**
     * Get the global element shortcuts for the site.
     *
     * @return array
     */
    public static function siteElements()
    {
        return [
//            '@element' => '#selector',
        ];
    }

    /**
     * @return string
     */
    public function currentUrl() {
        switch (env('APP_ENV')){
            case 'production':
                die();
                break;
            case 'local':
                return 'http://hff.dev';
                break;
            case 'dusk':
                return '127.0.0.1';
                break;
            default:
                return 'http://localhost';
        }
    }
}
