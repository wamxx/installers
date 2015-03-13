# A Multi-Framework [Composer](http://getcomposer.org) Library Installer

Fork of [Composer Installers](https://github.com/composer/installers)

This is for PHP package authors to require in their `composer.json`. It will
install their package to the correct location based on the specified package
type.

The `installers` is made for [Zeus](https://github.com/minutebuzz/zeus), his goal is to perform complete installation of Zeus modules and more.

`installers` isn't intended on replacing all custom installers. If your
package requires special installation handling then by all means, create a
custom installer to handle it.

## Example `composer.json` File For Zeus Module

The only important parts to set in your
composer.json file are `"type": "zeus-module"` which describes what your
package is and `"require": { "minutebuzz/zeus-installers": "dev-master" }` which tells composer
to load the custom installers.
In `"extra"` the entry `"name"` is the name of your module (and his directory) in Zeus and `"className"` is the access of your module boot who implement `\Phalcon\Mvc\ModuleDefinitionInterface`

```json
{
    "name": "minutebuzz/zeus-module-yourmodule",
    "type": "zeus-module",
    "require": {
        "minutebuzz/zeus-installers": "dev-master"
    },
    "extra": {
        "zeus":{
            "name":"User",
            "className":"Zeus\\User\\Module"
        }
    }
}
```