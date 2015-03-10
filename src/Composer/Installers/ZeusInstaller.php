<?php
namespace Composer\Installers;

class ZeusInstaller extends BaseInstaller
{
    protected $locations = array(
        'module'    => 'app/modules/{$name}/',
    );
}
