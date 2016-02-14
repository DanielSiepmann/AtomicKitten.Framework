.. _gettingStarted:

Getting Started
===============

.. _installation:

Installation
------------

Only composer is supported as we need to install some dependencies like the underlying framework
Flow and template engine Fluid.

Create the following :file:`composer.json` and run `composer install`.

Content of :file:`composer.json`::

    {
        "name": "vendor/projectname",
        "description": "AtomicKitten",
        "license": "GPL",
        "minimum-stability": "dev",
        "config": {
            "vendor-dir": "Packages/Libraries",
            "bin-dir": "bin"
        },
        "require": {
            "typo3/flow": "~3.1.0",
            "atomickitten/framework": "dev-master"
        },
        "scripts": {
            "post-update-cmd": "TYPO3\\Flow\\Composer\\InstallerScripts::postUpdateAndInstall",
            "post-install-cmd": "TYPO3\\Flow\\Composer\\InstallerScripts::postUpdateAndInstall",
            "post-package-update": "TYPO3\\Flow\\Composer\\InstallerScripts::postPackageUpdateAndInstall",
            "post-package-install": "TYPO3\\Flow\\Composer\\InstallerScripts::postPackageUpdateAndInstall"
        }
    }

Please adjust `vendor` and `projectname` as needed.


.. note::

    During development, we need to set the `minimum-stability` to `dev`. Once the first version is
    out that will be removed. Until then, composer will clone most dependencies, which can take some
    time.

.. todo::

    Remove the need of reducing stability, but use Compoer `Branch alias
    <https://getcomposer.org/doc/articles/aliases.md#branch-alias>`_ to require the first stable
    version.

.. _generateTheFirstTime:

Generate the first time
-----------------------

Run `./flow generator:build` and open :file:`Output/index.html` in your web browser.

.. tip::

    On OS X just run: `./flow generator:build && open Output/index.html`

.. todo::

    Fix command, to allow deletion of folder, even if files are inside. Currently you will get an
    error that php could not delete the folder, because there are files in it.
