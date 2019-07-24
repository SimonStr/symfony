<?php
/**
 * Created by PhpStorm.
 * User: AcerNotebook
 * Date: 24.07.2019
 * Time: 10:46
 */

namespace App\Security;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class JwsLogoutHandler implements LogoutSuccessHandlerInterface
{
    public function onLogoutSuccess(Request $request)
    {
        $jsonResponse = new JsonResponse(["result" => true]);
        $jsonResponse->headers->clearCookie("jwt");
    }
}