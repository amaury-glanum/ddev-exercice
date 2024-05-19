<?php
namespace Els\Manager\ProjectsManager;

use Els\Entity\Projects;
use Els\Manager\BaseManager;

class ProjectsManager extends BaseManager
{
    /**
     * @return Projects[]
     */
    public function getProjects(): array
    {
        $query = $this->pdo->query("SELECT id, project_date, project_title, project_place FROM projects");
        $projects= [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $projects[] = new Projects($data);
        }

        return $projects;
    }

    public function getProject(int $id): array {
        $getProjectReq = $this->pdo->prepare("SELECT id, project_date, project_title, project_place FROM projects WHERE id = :id");
        $getProjectReq->execute([
            'id' => $id
        ]);
        $readProjects = [];
        while ($data = $getProjectReq->fetch(\PDO::FETCH_ASSOC)) {
            $readProjects[] = new Projects($data);
        }
        return $readProjects;
    }

}

