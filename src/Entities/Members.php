<?php
namespace Els\Entity;

class Members extends BaseEntity
{
    private int | null $id;
    private int | null $user_id;
    private string | null $prenom;
    private string | null $nom;
    private string | null $role;
    private string | null $presentation;
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
     * @return string|null
     */
    public function getPrenom(): string | null
    {
        return $this->prenom;
    }

    /**
     * @param string|null $prenom
     * @return Members
     */
    public function setPrenom(string | null $prenom): Members
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNom(): string | null
    {
        return $this->nom;
    }

    /**
     * @param string|null $nom
     * @return Members
     */
    public function setNom(string | null $nom): Members
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRole(): string | null
    {
        return $this->role;
    }

    /**
     * @param string|null $role
     * @return Members
     */
    public function setRole(string | null $role): Members
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPresentation(): string | null
    {
        return $this->presentation;
    }

    /**
     * @param string|null $presentation
     * @return Members
     */
    public function setPresentation(string | null $presentation): Members
    {
        $this->presentation = $presentation;
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
?>
