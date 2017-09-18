<?php
/*
 * This file is part of the Magallanes package.
 *
 * (c) Andrés Montañez <andres@andresmontanez.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mage\Task\BuiltIn\Symfony;

use Symfony\Component\Process\Process;

/**
 * Symfony Task - Install Assets
 *
 * @author Andrés Montañez <andresmontanez@gmail.com>
 */
class DoctrineMigrationsTask extends AbstractSymfonyTask
{
    public function getName()
    {
        return 'symfony/doctrine-migrations';
    }

    public function getDescription()
    {
        return '[Symfony] Doctrine Migrations';
    }

    public function execute()
    {
        $options = $this->getOptions();
        $command = sprintf('%s doctrine:migrations:migrate -n --env=%s', $options['console'], $options['env']);

        /** @var Process $process */
        $process = $this->runtime->runCommand(trim($command));

        return $process->isSuccessful();
    }

    protected function getSymfonyOptions()
    {
        return [];
    }
}
