<?php 
class MainController 
{
    // PUBLIC METHODS

    /**
     * Génère la data pour une page standard du site
     * @method setPage
     * @param array $pageData
     * @param array $headerLinks
     * @param array $footerLinks
     * @param array $assets
     * @return void
     */
    public function setPageData(array $pageData, array $headerLinks, array $footerLinks, array $assets): void
    {
        $data_page = [
            "page_css_id" => $pageData["page_css_id"],
            "page_description" => $pageData["meta"]["page_description"],
            "page_title" => $pageData["meta"]["page_title"],
            "header_links" => $headerLinks,
            "footer_links" => $footerLinks,
            "assets" => $assets,
            "view" => $pageData['view'],
            "template" => $pageData['template'],
            "header_slug" => $pageData['header'],
            "footer_slug" =>  $pageData['footer']
        ];

        $this->generatePage($data_page);
    }

    private function generatePage($data) {
        return;
    }
}