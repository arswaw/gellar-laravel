<?php

namespace App;


class UserSessionSingleton
{
    private $user;

    public function __construct()
    {
        $this->user = null;
    }

    /**
     * Fetches the stored user object
     *
     * @return null | User
     */
    public function user()
    {
        return $this->user;
    }

    /**
     * Stores the user object
     *
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Validates that specified parameters exist in the request body JSON
     *
     * @param Array $requiredParameters
     * @throws \Exception
     */
    public function checkParameters($requiredParameters)
    {
        // parse request body as an array
        $data = request()->getContent();
        $jsonParsed = json_decode($data, true);

        // make sure each required parameter is in the array
        foreach ($requiredParameters as $parameter) {
            if (!isset($jsonParsed[$parameter])) {
                throw new \Exception('Missing Parameters');
            }
        }
    }
}