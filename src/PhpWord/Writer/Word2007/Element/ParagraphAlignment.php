<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @see         https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2018 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Writer\Word2007\Element;

use PhpOffice\PhpWord\SimpleType\Jc;

/**
 * @since 0.13.0
 */
class ParagraphAlignment
{
    private $name = 'w:jc';

    private $attributes = array();

    /**
     * @since 0.13.0
     *
     * @param string $value Any value provided by Jc simple type
     *
     * @see \PhpOffice\PhpWord\SimpleType\Jc For the allowed values of $value parameter.
     */
    final public function __construct($value)
    {
        // keep from this issue : https://github.com/PHPOffice/PHPWord/issues/1450
        switch ($value) {
            case Jc::CENTER:
                $textAlign = 'center';
                break;
            case Jc::END:
            case Jc::MEDIUM_KASHIDA:
            case Jc::HIGH_KASHIDA:
            case Jc::LOW_KASHIDA:
            case Jc::RIGHT:
                $textAlign = 'right';
                break;
            case Jc::BOTH:
            case Jc::DISTRIBUTE:
            case Jc::THAI_DISTRIBUTE:
            case Jc::JUSTIFY:
                $textAlign = 'justify';
                break;
            default: //all others, align left
                $textAlign = 'left';
                break;
        }

        $this->attributes['w:val'] = $textAlign;
    }

    /**
     * @since 0.13.0
     *
     * @return string
     */
    final public function getName()
    {
        return $this->name;
    }

    /**
     * @since 0.13.0
     *
     * @return string[]
     */
    final public function getAttributes()
    {
        return $this->attributes;
    }
}
