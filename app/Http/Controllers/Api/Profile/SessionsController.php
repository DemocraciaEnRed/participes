<?php

namespace Vanguard\Http\Controllers\Api\Profile;

use Vanguard\Http\Controllers\Api\ApiController;
use Vanguard\Http\Resources\SessionResource;
use Vanguard\Repositories\Session\SessionRepository;

/**
 * @package Vanguard\Http\Controllers\Api\Profile
 */
class SessionsController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('session.database');
    }

    /**
     * Handle user details request.
     * @param SessionRepository $sessions
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(SessionRepository $sessions)
    {
        $sessions = $sessions->getUserSessions(auth()->id());

        return SessionResource::collection($sessions);
    }
}
