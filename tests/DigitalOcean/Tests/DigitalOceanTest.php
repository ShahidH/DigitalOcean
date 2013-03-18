<?php

/**
 * This file is part of the DigitalOcean library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DigitalOcean\Tests;

use DigitalOcean\DigitalOcean;

/**
 * @author Antoine Corcy <contact@sbin.dk>
 */
class DigitalOceanTest extends TestCase
{
    public function testConstructorWithoutAdapterShouldUseCurlHttpAdapter()
    {
        $digitalOcean = new MockDigitalOcean($this->getMockCredentials($this->never()));

        $this->assertTrue(is_object($digitalOcean->getAdapter()));
        $this->assertInstanceOf('\\DigitalOcean\\HttpAdapter\\CurlHttpAdapter', $digitalOcean->getAdapter());
    }

    public function testReturnsDropletInstance()
    {
        $digitalOcean = new DigitalOcean($this->getMockCredentials(), $this->getMockAdapter($this->never()));
        $droplets = $digitalOcean->droplets();

        $this->assertTrue(is_object($droplets));
        $this->assertInstanceOf('\\DigitalOcean\\Droplets\\Droplets', $droplets);
    }

    public function testReturnsRegionInstance()
    {
        $digitalOcean = new DigitalOcean($this->getMockCredentials(), $this->getMockAdapter($this->never()));
        $regions = $digitalOcean->regions();

        $this->assertTrue(is_object($regions));
        $this->assertInstanceOf('\\DigitalOcean\\Regions\\Regions', $regions);
    }

    public function testReturnsImageInstance()
    {
        $digitalOcean = new DigitalOcean($this->getMockCredentials(), $this->getMockAdapter($this->never()));
        $images = $digitalOcean->images();

        $this->assertTrue(is_object($images));
        $this->assertInstanceOf('\\DigitalOcean\\Images\\Images', $images);
    }

    public function testReturnsSizeInstance()
    {
        $digitalOcean = new DigitalOcean($this->getMockCredentials(), $this->getMockAdapter($this->never()));
        $sizes = $digitalOcean->sizes();

        $this->assertTrue(is_object($sizes));
        $this->assertInstanceOf('\\DigitalOcean\\Sizes\\Sizes', $sizes);
    }

    public function testReturnsSSHKeysInstance()
    {
        $digitalOcean = new DigitalOcean($this->getMockCredentials(), $this->getMockAdapter($this->never()));
        $sshKeys = $digitalOcean->sshKeys();

        $this->assertTrue(is_object($sshKeys));
        $this->assertInstanceOf('\\DigitalOcean\\SSHKeys\\SSHKeys', $sshKeys);
    }
}

class MockDigitalOcean extends DigitalOcean
{
    public function getAdapter()
    {
        return $this->adapter;
    }
}
