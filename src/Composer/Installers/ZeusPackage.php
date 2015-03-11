<?php
namespace Composer\Installers;

class ZeusPackage
{
  public static function preInstall(\Composer\Script\Event $event) {
    // provides access to the current ComposerIOConsoleIO
    // stream for terminal input/output
    $io = $event->getIO();
    if ($io->askConfirmation("Are you sure you want to proceed? ", false)) {
      // ok, continue on to composer install
      return true;
    }
    // exit composer and terminate installation process
    exit;
  }

  public static function postInstall(\Composer\Script\Event $event) {
    // provides access to the current Composer instance
    $composer = $event->getComposer();
    // run any post install tasks here
  }

  public static function postPackageInstall(\Composer\Script\PackageEvent $event) {

    $oPackage = $event->getOperation()->getPackage();


    // any tasks to run after the package is installed?
    $io = $event->getIO();
    if ($io->askConfirmation("Are you sure you want to proceed? ".$oPackage->getName()." -- ".$oPackage->getType(), false)) {
      // ok, continue on to composer install
      return true;
    }
  }

  public static function postPackageUninstall(\Composer\Script\PackageEvent $event) {

    $packageName = $event->getOperation()->getInitialPackage()->getName();

    // any tasks to run after the package is installed?
  }
}