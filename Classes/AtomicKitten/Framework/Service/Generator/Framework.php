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
 * This class provides the public API to generate different parts of
 * AtomicKitten.
 */
class Framework
{
    /**
     * @Flow\InjectConfiguration(package="AtomicKitten.Framework", path="build")
     * @var array
     */
    protected $buildSettings;

    /**
     * Generate files from framework.
     *
     * Contains the outer design like navigation.
     *
     * @return void
     */
    public function build(array $templates)
    {
        $this->buildAll($templates);
        // foreach ($templates as $navigationPoint) {
        //     $this->generateNavigationPoint($navigationPoint);
        // }
        // $this->generateNavigation($templates);
        // $view = new View\AtomicKitten;
        // $resultFile = new SplFileObject($this->buildSettings['target'] . 'index.html', 'w');
        // $resultFile->fwrite($view->render('Generator/Index'));
    }

    protected function buildAll(array $templates);
    {
    }
}
