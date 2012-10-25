<?php

namespace Unbrewed\Entity;

class User
{
    protected $userId;

    protected $twitterHandle;

    protected $twitterId;

    /**
     * Get userId.
     *
     * @return userId.
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userId.
     *
     * @param userId the value to set.
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get twitterHandle.
     *
     * @return twitterHandle.
     */
    public function getTwitterHandle()
    {
        return $this->twitterHandle;
    }

    /**
     * Set twitterHandle.
     *
     * @param twitterHandle the value to set.
     */
    public function setTwitterHandle($twitterHandle)
    {
        $this->twitterHandle = $twitterHandle;
    }

    /**
     * Get twitterId.
     *
     * @return twitterId.
     */
    public function getTwitterId()
    {
        return $this->twitterId;
    }

    /**
     * Set twitterId.
     *
     * @param twitterId the value to set.
     */
    public function setTwitterId($twitterId)
    {
        $this->twitterId = $twitterId;
    }
}
