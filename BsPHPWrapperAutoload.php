<?php
/**
 * BsPHPWrapper SPL autoloader.
 * PHP Version 7.1.1
 * @package BsPHPWrapper
 * @link https://github.com/PHPMailer/PHPMailer/ The BsPHPWrapper GitHub project
 * @author Philip Tomson (Avalon) <philip.tomson@avalon-zone.be>
 * @author Cédric Singelé (Ced) <cedricsingele@gmail.com>
 * @copyright 2018 - 2019 Tomson Philip
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL)
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * BsPHPWrapper SPL autoloader.
 * @param string $classname The name of the class to load
 */
function BsPHPWrapperAutoload($classname)
{
    $filename = dirname(__FILE__).DIRECTORY_SEPARATOR.$classname.'.php';
    if (is_readable($filename)) {
        require $filename;
    }
}

spl_autoload_register('BsPHPWrapperAutoload', true, true);