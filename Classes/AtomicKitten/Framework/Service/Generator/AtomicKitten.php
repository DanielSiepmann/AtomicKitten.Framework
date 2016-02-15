<?php
namespace AtomicKitten\Framework\Service\Generator;

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

use AtomicKitten\Framework\View;
use SplFileObject;
use TYPO3\Flow\Annotations as Flow;

/**
 * Generator for AtomicKitten, will parse the templates and generate static
 * html output.
 */
class AtomicKitten
{
    /**
     * @Flow\InjectConfiguration(package="AtomicKitten.Framework", path="build")
     * @var array
     */
    protected $buildSettings;

    /**
     * Generate files from AtomicKitten.
     *
     * @return void
     */
    public function build()
    {
        $this->renderTemplates();
    }

    protected function getTemplateFiles()
    {
        // TODO: Move folder names (ordering) to settings?
        $parts = [
            'Atoms' => [],
            'Molecules' => [],
            'Organisms' => [],
            'Templates' => [],
            'Pages' => [],
        ];

        foreach (array_keys($parts) as $folderName) {
            $parts[$folderName] = \TYPO3\Flow\Utility\Files::readDirectoryRecursively(
                $this->buildSettings['source']['atomicKitten']['templates'] . $folderName,
                '.html'
            );
        }

        return $parts;
    }

    protected function renderTemplate($templateName)
    {
        $view = new View\AtomicKitten;
        $view->setPathsFromOptions('AtomicKitten.Framework.build.source.atomicKitten');
        $targetFilename = $this->buildSettings['target'] . $templateName;

        if (!is_dir(dirname($targetFilename))) {
            mkdir(dirname($targetFilename), 0777, true);
        }

        $resultFile = new SplFileObject($targetFilename . '.html', 'w');
        $resultFile->fwrite($view->render($templateName));
    }
}
