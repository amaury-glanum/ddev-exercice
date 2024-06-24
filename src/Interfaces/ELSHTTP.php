<?php
// IL MANQUE ICI LE TYPAGE POUR RESPONSE HTTP
namespace Els\Interfaces;

interface ELSHTTP
{
    public function getDataFromUrl(): array | string;
}

