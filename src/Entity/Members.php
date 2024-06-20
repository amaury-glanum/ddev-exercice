<?php
namespace Els\Entity;

class Members extends BaseEntity
{
    private int | null $id;

    private string | null $prenom;
    private string | null $nom;

    private string | null $email;
    private string | null $role;
    private string | null $presentation;

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

    public function getEmail(): string | null {
        return $this->email;
    }

    public function setEmail(string | null $email): Members {
        $this->email = $email;
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

}
?>
