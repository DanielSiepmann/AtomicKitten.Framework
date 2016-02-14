.. _folderStructure:

Folder structure
================

.. _packages:

Packages
--------

The installation will follow Flow conventions, as it's only a Flow application. The
AtomicKitten.Framework will be at :file:`Packages\\Application\\AtomicKitten.Framework`. The
example will be at :file:`Packages\\Application\\AtomicKitten.Example`.

.. _templates:

Templates
---------

The important part will be the template structure inside your own package. As orientation you can
take a look at :file:`Packages\\Application\\AtomicKitten.Example\\Resources\\Private`.

It's up to you to choose a file structure, as you are able to :ref:`configure <configuration>` it for
your needs. But to achieve compatibility with the conventions and therefore TYPO3 CMS and Flow,
it's recommend to follow this structure::

    Packages/Application/AtomicKitten.Example/Resources/Private
    ├── Layouts
    │   └── Default.html
    ├── Partials
    │   └── Atoms
    │       └── Text
    │           └── Heading
    │               ├── H1.html
    │               ├── H2.html
    │               ├── H3.html
    │               ├── H4.html
    │               ├── H5.html
    │               └── H6.html
    └── Templates
        ├── Atoms
        │   └── 01-Text
        │       └── 01-Headings.html
        ├── Molecules
        │   └── 01-Text
        │       └── Byline.html
        ├── Organisms
        ├── Pages
        └── Templates

The only important part for AtomicKitten is inside :file:`Templates` as it's the only part parsed by
AtomicKitten. The first level has to be as documented above, as currently all folders are checked
hard coded, that is in the following order: Atoms, Molecules, Organisms, Pages, Templates.
Inside each folder, you can create another level of folders that will build the navigation (once
it's implemented). The numbers are up to you and will used for sorting in navigation. The same
applies to :file:`.html`-files inside the folders.

:file:`Partials` and :file:`Layouts` are fully up to you. The Example-package will use provide the
real Atomic Design inside :file:`Partials` and use :file:`Templates` to generate the output for
AtomicKitten.

.. note::

    The structure inside :file:`Templates` will change to enable the reuse in further projects, as
    mentioned in section :ref:`benefits`.

As AtomicKitten uses the `TYPO3Fluid/Fluid <https://github.com/TYPO3Fluid/Fluid>`_ template engine,
all information about the different folders are available at the `official Fluid documentation
<https://github.com/TYPO3Fluid/Fluid/blob/master/doc/FLUID_STRUCTURE.md>`_.

.. _output:

Output
------

The results will be inside :file:`Output`, unless you change the configuration. Inside that folder
you will have the following structure, enabling you to open each generated template without the need
of a web server::

    Output
    ├── Atoms
    │   └── 01-Text
    │       └── 01-Headings.html
    ├── Molecules
    │   └── 01-Text
    │       └── Byline.html
    └── index.html
