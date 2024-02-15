<?php

namespace App\Security;

use App\Entity\User;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{
    /**
     * @param User $user
     * @return void
     */
    public function checkPreAuth(UserInterface $user)
    {
        $bannedUntil = $user->getBannedUntil();
        if (null === $bannedUntil) {
            return;
        }
        $now = new \DateTime();
        if ($now < $bannedUntil) {
            throw new AccessDeniedHttpException('The user is banned');
        }
    }

    /**
     * @param User $user
     * @return void
     */
    public function checkPostAuth(UserInterface $user)
    {
        // TODO: Implement checkPostAuth() method.
    }
}