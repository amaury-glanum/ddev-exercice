<?php
namespace Els\Manager\MembersManager;

use GuzzleHttp\Client;
use Els\Entity\Members;
use Els\Manager\ApiBaseManager;
use Els\Traits\Hydrator;

class MembersApiManager extends ApiBaseManager
{
    use Hydrator;

    /**
     * @param string $url
     * @param string $method
     * @return array|null
     */
    public function getMembersFromUrl(): ?array
    {
        $client = new Client([]);
        $members = [];
        $datas = [];
        if($this->url && $this->method) {
            $response = $client->request($this->method, $this->url);
            $request = json_decode($response->getBody()->getContents(), true);
            $datas[] = $request;

            foreach ($datas[0] as $data) {
                $members[] = new Members($data);
            }
            return $members;
        } else {
            return $members;
        }

    }

}
