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


            $sModuleFile = getcwd().'/app/configs/modules.php';
            if( file_exists($sModuleFile) )
            {
                $aModules = include $sModuleFile;
                $aModules[$package->getName()] = [
                    'className' => $aExtra['zeus']['className'],
                    'path' => '../app/modules/'.ucfirst($aMatches[2]),
                ];
                file_put_contents($sModuleFile,'<?php return '.var_export($aModules,true));
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
