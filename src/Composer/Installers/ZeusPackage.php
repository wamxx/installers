<?php
namespace Composer\Installers;
use ComposerScriptEvent;

class ZeusPackage
{
  public static function preInstall(\Composer\Installers\Event $event) {
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

  public static function postInstall(\Composer\Installers\Event $event) {
    // provides access to the current Composer instance
    $composer = $event->getComposer();
    // run any post install tasks here
  }

  public static function postPackageInstall(\Composer\Installers\Event $event) {
    $installedPackage = $event->getComposer()->getPackage();
    // any tasks to run after the package is installed?
  }

  public static function postPackageUninstall(\Composer\Installers\Event $event) {
    $installedPackage = $event->getComposer()->getPackage();
    // any tasks to run after the package is installed?
  }
}