<?php
namespace Els\Manager\ProjectsManager;

use Els\Entity\Projects;
use Els\Manager\BaseManager;

class ProjectsManager extends BaseManager
{
    /**
     * @return Projects[]
     */
    public function getAllProjects(): array
    {
        $query = $this->pdo->query("SELECT * FROM projects");
        $members = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $members[] = new Members($data);
        }

        return $members;
    }

    public function getProject(int $id): array {
        $getPostReq = $this->pdo->prepare("SELECT * FROM projects WHERE id = :id");
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

