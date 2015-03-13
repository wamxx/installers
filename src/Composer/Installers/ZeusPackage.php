<?php
namespace Composer\Installers;

class ZeusPackage
{
  public static function preInstall( \Composer\Script\Event $oEvent )
  {

  }

  public static function postInstall( \Composer\Script\Event $oEvent )
  {

  }

  public static function postPackageInstall( \Composer\Script\PackageEvent $oEvent )
  {

    $oPackage = $oEvent->getOperation()->getPackage();
    $oEvent->getIO()->write('Zeus module -- install '.$oPackage->getName(),true);

  }

  public static function postPackageUninstall( \Composer\Script\PackageEvent $oEvent )
  {

    $oPackage = $oEvent->getOperation()->getPackage();

    if( $oEvent->getIO()->askConfirmation('Are you sure you want to unInstall '.$oPackage->getName().' ?', false) )
    {
      return true;
    }
    else
    {
      return false;
    }
  }
}