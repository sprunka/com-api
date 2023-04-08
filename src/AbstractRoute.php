<?php

namespace CoMAPI;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class AbstractRoute
 * @package CoMAPI
 * Help is currently unused and undocumented. It is left here as a placeholder for a possible future upgrade.
 *
 */
abstract class AbstractRoute extends \CommonRoutes\AbstractRoute
{
    /**
     * @var array
     */
    protected array $help = [];

    /**
     * @return object
     */
    public function getHelp(): object
    {
        return (object) $this->help;
    }


}
