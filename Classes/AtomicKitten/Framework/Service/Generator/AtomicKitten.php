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
 *
 * @TODO: Copy patternlab.io _patterns to example and test whether everything
 * is generated as expected.
 */
class AtomicKitten extends AbstractGenerator
{
    /**
     * @Flow\InjectConfiguration(package="AtomicKitten.Framework", path="build.source.atomicKitten.templates")
     * @var string
     */
    protected $templatesFolder;

    /**
     * @var string
     */
    protected $viewConfigPath = 'AtomicKitten.Framework.build.source.atomicKitten';

    /**
     * Generate static html files from AtomicKitten.
     *
     * @return array
     */
    public function build()
    {
        $templates = $this->getTemplateFiles();
        $this->renderTemplates($templates);

        return $templates;
    }

    /**
     * Get all absolute file names to render.
     *
     * @return array
     */
    protected function getTemplateFiles()
    {
        $parts = [];
        foreach ($this->navigationNames as $folderName) {
            $parts[$folderName] = \TYPO3\Flow\Utility\Files::readDirectoryRecursively(
                $this->templatesFolder . $folderName,
                '.' . $this->sourceFormat
            );
        }

        return $parts;
    }

    /**
     * Rendeer all provided templates.
     *
     * Structure has to follow:
     *  'navigation name' => [
     *      'absolute file name',
     *      'absolute file name',
     *  ]
     *
     *  @param array $templates
     *
     *  @return void
     */
    protected function renderTemplates(array $templates)
    {
        // TODO: Refactor to utility / service. Use callbacks as argument to
        // work on single template, also provide navigation title.
        foreach ($templates as $navigationTitle => $templateNames) {
            foreach ($templateNames as $templateName) {
                $targetFilename = $this->targetFolder . $navigationTitle . '/' . basename($templateName);
                $fileNameForRendering = str_replace($this->templatesFolder, '', $templateName);

                $this->writeRenderedTemplate(
                    $this->renderTemplate($fileNameForRendering),
                    $targetFilename
                );
            }
        }
    }
}
