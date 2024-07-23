<?php
namespace Els\Manager\ProjectsManager;

use GuzzleHttp\Client;
use Els\Entity\Projects;
use Els\Manager\ApiBaseManager;
use Els\Traits\Hydrator;

class ProjectsApiManager extends ApiBaseManager
{
    use Hydrator;

    /**
     * @param string $url
     * @param string $method
     * @return array|null
     */
    public function getProjectsFromUrl(): ?array
    {
        $client = new Client([]);
        $projects = [];
        $datas = [];
        if($this->url && $this->method) {
            $response = $client->request($this->method, $this->url);
            $request = json_decode($response->getBody()->getContents(), true);
            $datas[] = $request;
            $i = 0;
            foreach ($datas[0] as $data) {
                $projects[] = new Projects($data);
            }
            return $projects;
        } else {
            return $projects;
        }

    }

}
