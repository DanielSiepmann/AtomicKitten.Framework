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
 */
abstract class AbstractGenerator
{
    /**
     * @Flow\InjectConfiguration(package="AtomicKitten.Framework", path="build.target.outputFolder")
     * @var string
     */
    protected $targetFolder;

    /**
     * @Flow\InjectConfiguration(package="AtomicKitten.Framework", path="build.source.atomicKitten.folders.firstLevel")
     * @var string
     */
    protected $navigationNames;

    /**
     * @Flow\InjectConfiguration(package="AtomicKitten.Framework", path="build.source.atomicKitten.format")
     * @var string
     */
    protected $sourceFormat;

    /**
     * @var string
     */
    protected $viewConfigPath = 'AtomicKitten.Framework.build.source.framework';

    protected function renderTemplate($templateName, array $variables = [])
    {
        $templateName = str_replace('.' . $this->sourceFormat, '', $templateName);
        $view = new View\AtomicKitten;
        $view->setFormat($this->sourceFormat);
        $view->setPathsFromOptions($this->viewConfigPath);
        $view->assignMultiple($variables);
        return $view->render($templateName);
    }

    /**
     * Write content of rendered template to file.
     *
     * @param string $templateContent The content to write.
     * @param string $targetFilename Absolute file name.
     *
     * @return void
     */
    protected function writeRenderedTemplate($templateContent, $targetFilename)
    {
        if (!is_dir(dirname($targetFilename))) {
            // TODO: Make 0777 configurable?
            mkdir(dirname($targetFilename), 0777, true);
        }

        $resultFile = new SplFileObject($targetFilename, 'w');
        $resultFile->fwrite($templateContent);
    }
}
