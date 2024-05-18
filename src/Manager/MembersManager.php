<?php
namespace Els\Manager;

use Els\Entity\Members;
use Els\Manager\BaseManager;

class MembersManager extends BaseManager
{
    /**
     * @return Members[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->query("SELECT * FROM members");
        $members = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $members[] = new Members($data);
        }

        return $members;
    }

    public function getMember(int $id): array {
        $getPostReq = $this->pdo->prepare("SELECT * FROM members WHERE id = :id");
        $getPostReq->execute([
            'id' => $id
        ]);
        $readMembers = [];
        while ($data = $getPostReq->fetch(\PDO::FETCH_ASSOC)) {
            $readMembers[] = new Members($data);
        }
        return $readMembers;
    }

}
