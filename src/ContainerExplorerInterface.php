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
     *
     * @param string $type A fully qualified class or interface name
     * @return string[]
     */
    public function getInstancesByType($type);

    /**
     * Returns the name of the instances whose tag is `$tag`
     *
     * @param string $tag The tag to retrieve
     * @return string[]
     */
    public function getInstancesByTag($tag);
}
