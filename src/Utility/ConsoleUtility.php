<?php

namespace SourceBroker\DeployerExtendedDatabase\Utility;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Class ConsoleUtility
 *
 * @package SourceBroker\DeployerExtendedDatabase\Utility
 */
class ConsoleUtility
{
    /**
     * Returns OutputInterface verbosity as parameter that can be used in cli command
     *
     * @param OutputInterface $output
     * @return string
     */
    public function getVerbosityAsParameter(OutputInterface $output)
    {
        switch ($output->getVerbosity()) {
            case OutputInterface::VERBOSITY_DEBUG:
                $verbosity = ' -vvv';
                break;
            case OutputInterface::VERBOSITY_VERY_VERBOSE:
                $verbosity = ' -vv';
                break;
            case OutputInterface::VERBOSITY_VERBOSE:
                $verbosity = ' -v';
                break;
            case OutputInterface::VERBOSITY_QUIET:
                $verbosity = ' -q';
                break;
            case OutputInterface::VERBOSITY_NORMAL:
            default:
                $verbosity = '';
        }
        return $verbosity;
    }

    /**
     * Check if option is present and return it. If not throw exception.
     *
     * @param string $requiredOption
     * @param InputInterface $input
     * @return mixed
     */
    public function optionRequired($requiredOption, InputInterface $input)
    {
        if (!empty($input->getOption($requiredOption))) {
            $requiredOptionValue = $input->getOption($requiredOption);
        } else {
            throw new \InvalidArgumentException('No --' . $requiredOption . ' option set.', 1458937128560);
        }
        return $requiredOptionValue;
    }
}
