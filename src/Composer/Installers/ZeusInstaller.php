<?php
namespace Composer\Installers;

class ZeusInstaller extends BaseInstaller
{
    protected $locations = array(
        'module'    => 'app/modules/{$name}/',
    );

    public function getInstallPath(\Composer\Package\PackageInterface $package, $frameworkType = '')
    {
        if( preg_match('#(.*)/zeus-module-(.*)#',$package->getName(),$aMatches) )
        {
            $aExtra = $package->getExtra();

            $vendorPath = $this->composer->getConfig()->get('vendor-dir');
            var_dump($vendorPath);exit;

            $sModuleFile = '';
            if( file_exists($sModuleFile) )
            {
                $aModules = include $sModuleFile;
                $aModules[$package->getName()] = [
                    'className' => $aExtra['className'],
                    'path' => '../app/modules/'.$aMatches[2],
                ];
                file_put_contents($sModuleFile,'return '.var_export($aModules,true));
            }
            else
            {

            }


            return $this->templatePath($this->locations['module'], array('name' => $aMatches[2]) );
        }
        else
        {
            return parent::getInstallPath($package, $frameworkType);
        }
    }
}