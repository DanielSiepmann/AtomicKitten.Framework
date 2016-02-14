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

/**
 * Custom CommandController to extend default behaviour.
 *
 * E.g. add color to output lines.
 */
abstract class CommandController extends \TYPO3\Flow\Cli\CommandController
{
    const OK = "\033[32m";
    const RESET = "\033[0m";

    /**
     * Overwrite default outputLine to provide third parameter that will color
     * the provided text.
     *
     * @param string $text Text to output.
     * @param array $arguments Optional arguments to use for sprintf.
     * @param string $status The status the output has, will be used to apply color.
     *
     * @return void
     */
    protected function outputLine($text = '', array $arguments = [], $status = self::RESET)
    {
        $text = $status . $text . static::RESET;
        return parent::outputLine($text, $arguments);
    }
}
