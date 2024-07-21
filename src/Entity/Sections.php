<?php
namespace Els\Entity;

class Sections extends BaseEntity
{
    private ?int $id = null;
    private ?string $sectionName = null;
    private ?string $sectionLang = null;
    private ?string $sectionVersion = null;
    private ?string $sectionPretitle = null;
    private ?string $sectionTitle = null;
    private ?string $sectionText = null;

    /**
     * @return string|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return Sections
     */
    public function setId(?int $id): Sections
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSectionName(): ?string
    {
        return $this->sectionName;
    }

    /**
     * @param string|null $sectionName
     * @return Sections
     */
    public function setSectionName(?string $sectionName): Sections
    {
        $this->sectionName = $sectionName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSectionLang(): ?string
    {
        return $this->sectionLang;
    }

    /**
     * @param string|null $sectionLang
     * @return Sections
     */
    public function setSectionLang(?string $sectionLang): Sections
    {
        $this->sectionLang = $sectionLang;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSectionVersion(): ?string
    {
        return $this->sectionVersion;
    }

    /**
     * @param string|null $sectionVersion
     * @return Sections
     */
    public function setSectionVersion(?string $sectionVersion): Sections
    {
        $this->sectionVersion = $sectionVersion;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSectionPretitle(): ?string
    {
        return $this->sectionPretitle;
    }

    /**
     * @param string|null $sectionPretitle
     * @return Sections
     */
    public function setSectionPretitle(?string $sectionPretitle): Sections
    {
        $this->sectionPretitle = $sectionPretitle;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSectionTitle(): ?string
    {
        return $this->sectionTitle;
    }

    /**
     * @param string|null $sectionTitle
     * @return Sections
     */
    public function setSectionTitle(?string $sectionTitle): Sections
    {
        $this->sectionTitle = $sectionTitle;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSectionText(): ?string
    {
        return $this->sectionText;
    }

    /**
     * @param string|null $sectionText
     * @return Sections
     */
    public function setSectionText(?string $sectionText): Sections
    {
        $this->sectionText = $sectionText;
        return $this;
    }
}
