<?php

declare(strict_types=1);

namespace Quest\Commands;

use PrettyPrint\Printer;

/**
 * Banner command
 *
 * @package Quest\Commands
 * @author Thiago <thiiagoms@proton.me>
 * @version 1.1
 */
final class BannerCommand
{
    /**
     * @return void
     */
    public static function init(): void
    {
        Printer::info('
            ██      ███████ ██ ████████  ██████  ██████       ██████ ███████ ██    ██ 
            ██      ██      ██    ██    ██    ██ ██   ██     ██      ██      ██    ██ 
            ██      █████   ██    ██    ██    ██ ██████      ██      ███████ ██    ██ 
            ██      ██      ██    ██    ██    ██ ██   ██     ██           ██  ██  ██  
            ███████ ███████ ██    ██     ██████  ██   ██      ██████ ███████   ████
            
                -> Desafio 02: Leitor CSV para importação/atualização de arquivos.
                
                [*] Author: Thiago Silva
                [*] E-mail: thiagom.devsec@gmail.com
        ');
    }

    /**
     * @return void
     */
    public static function help(): void
    {
        Printer::info('
            => Para realizar a importação/atualização de arquivos para a base de dados: 
            
            $ ./quest --seed
        ');
    }
}
