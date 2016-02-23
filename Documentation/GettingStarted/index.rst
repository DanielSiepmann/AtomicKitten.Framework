.. _gettingStarted:

Getting Started
===============

.. _installation:

Installation
------------

You need composer to install AtomicKitten. If you didn't setup a project with composer yet, follow
the `official documentation <https://getcomposer.org/doc/00-intro.md>`_ to do so.

.. _installation-git:

Git
---

Just run the following command on CLI:

.. code-block:: shell

    git clone https://github.com/DanielSiepmann/AtomicKitten.git && cd AtomicKitten && composer install

.. _installation-composer:

Composer
--------

.. todo::

    Once the first stable version is released, we will update the necessary :file:`composer.json`
    and you can install as usual with `composer require "atomickitten/distribution"`.

.. _generateTheFirstTime:

Generate the first time
-----------------------

Run `./flow generator:build` and open :file:`Output/index.html` in your web browser.

.. tip::

    On OS X just run: `./flow generator:build && open Output/index.html`
