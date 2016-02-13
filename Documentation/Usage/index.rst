Usage
=====

.. sectionauthor:: Daniel Siepmann <coding@daniel-siepmann.de>

Generate
--------

The only usage of the framework is to parse your package templates and generate static HTML out of
them.
To generate the static version trigger the process via command line interface::

    ./flow generator:build

That will command will parse your Fluid templates and generate static HTML.
Currently there are no options available. All Configuration is done via file system. Further
information are available in :ref:`configuration`.
