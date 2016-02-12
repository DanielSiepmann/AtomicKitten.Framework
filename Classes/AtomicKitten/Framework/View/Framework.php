<?php
namespace AtomicKitten\Framework\View;

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

use InvalidArgumentException;
use TYPO3\Flow\Configuration\ConfigurationManager;
use TYPO3\Fluid\Core\Rendering\RenderingContext;
use TYPO3\Fluid\View\StandaloneView;

/**
 * View to use, which provides basic auto loading.
 *
 * TODO: Write view for framework & another one for AtomicKitten
 *       Check what both Views have in common and refactor. E.g. to traits?
 *       Or another class that will be injected.
 */
class Framework extends StandaloneView
{
    /**
     * Initialize paths from settings.
     */
    public function initializeObject()
    {
        parent::initializeObject();

        $this->setPathsFromOptions();
        $this->setFormat('html');

        // Doesn't work without setting rendering context.
        // Even if StandaloneView works and we just extend it.
        $renderingContent = new RenderingContext;
        $renderingContent->setControllerContext($this->controllerContext);
        $this->setRenderingContext($renderingContent);
    }

    /**
     * Loads the template source and render the template.
     *
     * @param string $templateName The file name of template, relative to configured template path.
     *
     * @return string
     */
    public function render($templateName = null)
    {
        if ($templateName === null) {
            throw new InvalidArgumentException(
                'An template name is required and will be search relative from configured templates path'
            );
        }
        $this->setTemplateName($templateName);

        return parent::render($templateName);
    }

    /**
     * Set all needed paths by reading configured configuration.
     *
     * Will provide "autoloading" inside templates.
     *
     * @return void
     */
    protected function setPathsFromOptions()
    {
        $configuration = $this->objectManager->get(ConfigurationManager::class)
            ->getConfiguration(
                ConfigurationManager::CONFIGURATION_TYPE_SETTINGS,
                'AtomicKitten.Framework.build.source.framework'
            );

        $this->setLayoutRootPath($configuration['layouts']);
        $this->setPartialRootPath($configuration['partials']);
        $this->setTemplatePathAndFilename($configuration['templates']);
    }

    /**
     * Set template name, relative to configured template root path.
     *
     * Template Name will be converted to follow conventions.
     *
     * @param string $templateName E.g. generator/index
     *
     * @return void
     */
    protected function setTemplateName($templateName)
    {
        $this->setTemplatePathAndFilename(
            $this->getTemplatePathAndFilename()
            . $templateName
            . '.' . $this->getFormat()
        );
    }
}
