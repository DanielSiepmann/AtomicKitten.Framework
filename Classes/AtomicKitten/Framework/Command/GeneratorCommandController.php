<?php
namespace AtomicKitten\Framework\Command;

/*
 * Copyright (C) 2016  Daniel Siepmann <coding@daniel-siepmann.de>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

use TYPO3\Flow\Annotations as Flow;
use AtomicKitten\Framework\Service\Generator;

/**
 * Command interface to generate different parts.
 *
 * E.g. generate the output for framework or atomic kitten.
 *
 * @Flow\Scope("singleton")
 */
class GeneratorCommandController extends \TYPO3\Flow\Cli\CommandController
{
    /**
     * @Flow\InjectConfiguration(package="AtomicKitten.Framework", path="build")
     * @var array
     */
    protected $buildSettings;

    /**
     * Will generate the static AtomicKitten.
     *
     * Parse configured sourced and generate static HTML.
     *
     * @return void.
     */
    public function buildCommand()
    {
        $this->cleanCommand();
        $framework = new Generator\Framework;
        $atomicKitten = new Generator\AtomicKitten;

        // 1. Build general output
        $framework->build();
        $this->outputLine("\033[32m Generation of framework finished. \033[0m");
        // 2. Walk through templates
        //  2.1 Parse structure
        $atomicKitten->build();
        $this->outputLine("\033[32m Generation finished. \033[0m");
    }

    /**
     * Will remove all generated files.
     *
     * @return void.
     */
    public function cleanCommand()
    {
        if (is_dir($this->buildSettings['target'])) {
            // TODO: Check how to delete folder containing files.
            rmdir($this->buildSettings['target']);
        }
        mkdir($this->buildSettings['target']);

        // TODO: Find to add color instead of writing this ugly strings.
        $this->outputLine("\033[32m Cleaned target folder. \033[0m");
    }
}
