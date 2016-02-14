AtomicKitten |version| Documentation
====================================

This documentation covering version |release| has been rendered at: |today|.

.. _about:

About
-----

AtomicKitten is an Atomic Design framework like `PatternLab <http://patternlab.io/>`_, implemented
in `FLOW framework <http://flowframework.io/>`_ with  `TYPO3 Fluid
<https://github.com/TYPO3Fluid/Fluid>`_ Template Engine.

If you don't know Atomic Design yet, check out the book `Atomic Design
<http://atomicdesign.bradfrost.com/chapter-2/>`_ by Brad Frost, or his `blog post
<http://bradfrost.com/blog/post/atomic-web-design/>`_.

.. _goal:

Goal
----

Reimplement `PatternLab <http://patternlab.io/>`_ using PHP framework `Flow
<http://flowframework.readthedocs.org/>`_ and `TYPO3 Fluid <https://github.com/TYPO3Fluid/Fluid>`_
as Template Engine.

AtomicKitten should enable an easy way to develop HTML and CSS websites, following the Atomic Design
concept. The developer should be able to use different data sources, from static :file:`.json`-files
to dynamic ones like databases or REST-Apis.

.. _benefits:

Benefits
--------

It's possible to build a static version of a new website with real data to test the design. Also, by
using Fluid as template engine and following conventions, you are able to use the development state
as it is inside your `TYPO3 CMS <https://typo3.org/>`_, `Flow
<http://flowframework.readthedocs.org/>`_ or `Neos <https://www.neos.io/>`_ project, without any
additional costs. Enabling you to modify your dynamic website in a closed environment with static
HTML as result, enabling you to run `Behat <http://docs.behat.org/>`_ tests or other testings.
Following Atomic Design, it enables you to create unit tests for your CSS / HTML.

.. _devState:

Development State
-----------------

The project is in very early state. First very basic features are already implemented. The
documentation is in sync with current development. Everything that's documented is implemented.
To get an impression, follow the :ref:`gettingStarted`.

You can watch the project on `Github <https://github.com/DanielSiepmann/AtomicKitten.Framework>`_.

.. _name:

Name
----

The name was provided by my colleague and Atomic Design. And the internet loves cats. Beside that, my
colleague was inspired by https://www.youtube.com/watch?v=5u-N_EtVESQ

.. _toc:

.. toctree::
    :caption: Table of Contents
    :maxdepth: 2

    GettingStarted/index
    Usage/index
    Configuration/index
    FolderStructure/index
    Todos/index
