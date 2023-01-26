<?php

declare(strict_types=1);

namespace Src\Controllers;

use PrettyPrint\Printer;

/**
 * Bannercontroller
 *
 * @package Src\Controllers
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
final class BannerController
{
    /**
     * Main App banner
     *
     * @return void
     */
    final public static function init(): void
    {
        Printer::success('
            ██      ███████ ██ ████████  ██████  ██████       ██████ ███████ ██    ██ 
            ██      ██      ██    ██    ██    ██ ██   ██     ██      ██      ██    ██ 
            ██      █████   ██    ██    ██    ██ ██████      ██      ███████ ██    ██ 
            ██      ██      ██    ██    ██    ██ ██   ██     ██           ██  ██  ██  
            ███████ ███████ ██    ██     ██████  ██   ██      ██████ ███████   ████   

            [*] Author: Thiago Silva AKA thiiagoms
            [*] E-mail: thiagom.devsec@gmail.com
        ');
    }
}
