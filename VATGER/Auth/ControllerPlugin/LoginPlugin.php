<?php

namespace VATGER\Auth\ControllerPlugin;

use XF\Repository\UserRememberRepository;

class LoginPlugin extends XFCP_LoginPlugin {
    public function createVisitorRememberKey(): void
    {
        $cookie_ttl = intval($this->options()->login_session_length ?? 31536000);

        $visitor = \XF::visitor();
        if (!$visitor->user_id)
        {
            return;
        }

        /** @var UserRememberRepository $rememberRepo */
        $rememberRepo = $this->repository(UserRememberRepository::class);
        $key = $rememberRepo->createRememberRecord($visitor->user_id);
        $value = $rememberRepo->getCookieValue($visitor->user_id, $key);

        $this->app->response()->setCookie('user', $value, $cookie_ttl);
    }
}