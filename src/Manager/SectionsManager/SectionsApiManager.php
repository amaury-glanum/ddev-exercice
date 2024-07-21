<?php
namespace Els\Manager\SectionsManager;

use GuzzleHttp\Client;
use Els\Entity\Sections;
use Els\Manager\ApiBaseManager;
use Els\Traits\Hydrator;

class SectionsApiManager extends ApiBaseManager
{
    use Hydrator;

    /**
     * @param string $url
     * @param string $method
     * @return array|null
     */
    public function getSectionsFromUrl(): ?array
    {
        $client = new Client([]);
        $sectionsText = [];
        if($this->url && $this->method) {
            $response = $client->request($this->method, $this->url);
            $request = json_decode($response->getBody()->getContents(), true);
            $datas = $request;
            $sectionsText[] = new Sections($datas);

            return $sectionsText;
        } else {
            return $sectionsText;
        }

    }

}
