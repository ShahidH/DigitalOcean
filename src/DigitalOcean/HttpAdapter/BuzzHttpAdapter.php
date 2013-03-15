<?php

/**
 * This file is part of the DigitalOcean library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DigitalOcean\HttpAdapter;

use Buzz\Browser;

/**
 * BuzzHttpAdapter class.
 *
 * @author Antoine Corcy <contact@sbin.dk>
 */
class BuzzHttpAdapter implements HttpAdapterInterface
{
    /**
     * {@inheritDoc}
     */
    public function getContent($url)
    {
        $browser = new Browser();

        try {
            $content = $browser->get($url)->getContent();
        } catch (\Exception $e) {
            $content = null;
        }

        return $content;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'buzz';
    }
}
