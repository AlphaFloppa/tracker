<?php

namespace App\Common\Security;

use App\User\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AuthSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    public function onAuthenticationSuccess(Request $request, TokenInterface $token): ?Response
    {
        $user = $token->getUser();
        if(!$user instanceof User)
        {
            return new Response(
                '',
                502
            );
        }

        return new JsonResponse(
            [
                'userData' => array_filter(
                                $user->hydrateUserData(),
                                fn($key) => $key != 'password',
                                ARRAY_FILTER_USE_KEY
                            ),
                'isSuccessful' => true
            ]
        );
    }
}
