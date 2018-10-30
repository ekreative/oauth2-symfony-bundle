<?php

/**
 * This file is part of the authbucket/oauth2-php package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AuthBucket\OAuth2\Symfony\Component\Validator\Constraints;

use Symfony\Component\Validator\Constraints\Regex;

/**
 * @Annotation
 *
 * @author Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 */
class Code extends Regex
{
    public function __construct($options = null)
    {
        parent::__construct(array_merge([
            'message' => 'This is not a valid code.',
            'pattern' => '/^([\x20-\x7E]+)$/',
        ], (array) $options));
    }
}
