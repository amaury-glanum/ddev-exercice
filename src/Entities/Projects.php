<?php
namespace Els\Entity;

class Projects extends BaseEntity
{
    private int | null $id;
    private int | null $user_id;
    private \DateTime | null $created_at;
    private \DateTime | null $updated_at;

    /**
     * @return int|null
     */
    public function getId(): int | null
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Members
     */
    public function setId(int | null $id): Members
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): int | null
    {
        return $this->user_id;
    }

    /**
     * @param int|null $user_id
     * @return Members
     */
    public function setUserId(int | null $user_id): Members
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): \DateTime | null
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime|null $created_at
     * @return Members
     */
    public function setCreatedAt(\DateTime | null $created_at): Members
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): \DateTime | null
    {
        return $this->updated_at;
    }

    /**
     * @param \DateTime|null $updated_at
     * @return Members
     */
    public function setUpdatedAt(\DateTime | null $updated_at): Members
    {
        $this->updated_at = $updated_at;
        return $this;
    }
}

