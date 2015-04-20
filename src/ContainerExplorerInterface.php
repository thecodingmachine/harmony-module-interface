<?php
/*
 * This file is part of the Harmony package.
 *
 * (c) 2013-2015 David Negrier <david@mouf-php.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */
namespace Harmony\Module;

/**
 * Classes implementing this interface can explore a container.
 *
 * @author David Negrier
 */
interface ContainerExplorerInterface
{
    /**
     * Returns the name of the instances implementing `$type`
     * @return string[]
     */
    public function getInstancesByType($type);
}
