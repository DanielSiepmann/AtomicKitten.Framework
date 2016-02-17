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
class GeneratorCommandController extends CommandController
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
        // $framework = new Generator\Framework;
        $atomicKitten = new Generator\AtomicKitten;

        $this->outputLine('Generation of framework finished.', [], CommandController::OK);
        $atomicKitten->build();
        // $templateNames = $atomicKitten->build();
        // TODO: Use in construct?
        // $framework->build($templateNames);

        $this->outputLine('Generation finished.', [], CommandController::OK);
    }

    /**
     * Will remove all generated files.
     *
     * @return void.
     */
    public function cleanCommand()
    {
        if (is_dir($this->buildSettings['target']['outputFolder'])) {
            \TYPO3\Flow\Utility\Files::removeDirectoryRecursively($this->buildSettings['target']['outputFolder']);
        }
        mkdir($this->buildSettings['target']['outputFolder']);

        $this->outputLine('Cleaned target folder.', [], CommandController::OK);
    }
}
