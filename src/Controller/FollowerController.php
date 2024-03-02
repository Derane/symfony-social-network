<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FollowerController extends AbstractController
{
    #[Route('/follow/{id}', name: 'app_follow')]
    public function follow(User $user, ManagerRegistry $managerRegistry, Request $request): Response
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if ($currentUser !== $user) {
            $currentUser->follow($user);
            $managerRegistry->getManager()->flush();
        }
        return $this->redirect($request->headers->get('referer'));
    }

    #[Route('/unfollow/{id}', name: 'app_unfollow')]
    public function unfollow(User $user, ManagerRegistry $managerRegistry, Request $request): Response
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if ($currentUser !== $user) {
            $currentUser->unfollow($user);
            $managerRegistry->getManager()->flush();
        }
        return $this->redirect($request->headers->get('referer'));
    }
}
