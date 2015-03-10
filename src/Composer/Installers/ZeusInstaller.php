<?php
namespace Composer\Installers;

class ZeusInstaller extends BaseInstaller
{
    protected $locations = array(
        'module'    => 'app/modules/{$name}/',
    );

    public function getInstallPath(\Composer\Package\PackageInterface $package, $frameworkType = '')
    {
        /*if( preg_match('#(.*)/zeus-module-(.*)#',$package->getName(),$aMatches) )
        {
            return $this->templatePath($this->locations['module'], array('name' => $aMatches[2]) );
        }
        else
        {*/
            return parent::getInstallPath($package, $frameworkType);
        //}
    }
}
