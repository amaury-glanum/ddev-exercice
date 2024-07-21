<?php
namespace Els\Manager\MembersManager;

use Els\Entity\Members;
use Els\Manager\PdoBaseManager;

class MembersManagerPdo extends PdoBaseManager
{
    /**
     * @return Members[]
     */
    public function getMembers(): array
    {
        $query = $this->pdo->query("SELECT id, nom, prenom, email, presentation, role FROM members");
        $members = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $members[] = new Members($data);
        }

        return $members;
    }
}
