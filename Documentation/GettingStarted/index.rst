.. _gettingStarted:

Getting Started
===============

.. _installation:

Installation
------------

Via Composer
^^^^^^^^^^^^

Create the following :file:`composer.json` and run :code:`composer update`.

:file:`composer.json`::

    {
        "name": "vendor/projectname",
        "description": "AtomicKitten",
        "license": "GPL",
        "config": {
            "vendor-dir": "Packages/Libraries",
            "bin-dir": "bin"
        },
        "repositories": [
            { "type": "vcs", "url":  "https://github.com/DanielSiepmann/AtomicKitten.Example.git" },
            { "type": "vcs", "url":  "https://github.com/DanielSiepmann/AtomicKitten.Framework.git" }
        ],
        "require": {
            "typo3/flow": "~3.1.0",
            "atomickitten/framework": "dev-master",
            "atomickitten/example": "dev-master"
        },
        "scripts": {
            "post-update-cmd": "TYPO3\\Flow\\Composer\\InstallerScripts::postUpdateAndInstall",
            "post-install-cmd": "TYPO3\\Flow\\Composer\\InstallerScripts::postUpdateAndInstall",
            "post-package-update": "TYPO3\\Flow\\Composer\\InstallerScripts::postPackageUpdateAndInstall",
            "post-package-install": "TYPO3\\Flow\\Composer\\InstallerScripts::postPackageUpdateAndInstall"
        }
    }

That will register the needed repositories to enable installation.


Via Git
^^^^^^^

.. _generateTheFirstTime:

Generate the first time
-----------------------
