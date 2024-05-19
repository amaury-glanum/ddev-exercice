<?php
namespace Els\Entity;

class Projects extends BaseEntity
{
    private int | null $id;
    private string | null $project_date;
    private string | null $project_place;
    private string | null $project_category;
    private string $project_title;
    private string | null $project_extract;
    private string | null $project_teaser;
    private string | null $project_description;
    private string | null $project_goal;
    private string | null $project_method;
    private string | null $project_results;
    private string | null $project_single_url;
    private string | null $project_img_url;
    private string | null $project_img_name;
    private array | null $project_infos;
    private array | null $project_meta;

    /**
     * @return int|null
     */
    public function getId(): int | null
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Projects
     */
    public function setId(int | null $id): Projects
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectDate(): string | null
    {
        return $this->project_date;
    }

    /**
     * @param string|null $project_date
     * @return Projects
     */
    public function setProjectDate(string | null $project_date): Projects
    {
        $this->project_date = $project_date;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectPlace(): string | null
    {
        return $this->project_place;
    }

    /**
     * @param string|null $project_place
     * @return Projects
     */
    public function setProjectPlace(string | null $project_place): Projects
    {
        $this->project_place = $project_place;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectCategory(): string | null
    {
        return $this->project_category;
    }

    /**
     * @param string|null $project_category
     * @return Projects
     */
    public function setProjectCategory(string | null $project_category): Projects
    {
        $this->project_category = $project_category;
        return $this;
    }

    /**
     * @return string
     */
    public function getProjectTitle(): string
    {
        return $this->project_title;
    }

    /**
     * @param string $project_title
     * @return Projects
     */
    public function setProjectTitle(string $project_title): Projects
    {
        $this->project_title = $project_title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectExtract(): string | null
    {
        return $this->project_extract;
    }

    /**
     * @param string|null $project_extract
     * @return Projects
     */
    public function setProjectExtract(string | null $project_extract): Projects
    {
        $this->project_extract = $project_extract;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectTeaser(): string | null
    {
        return $this->project_teaser;
    }

    /**
     * @param string|null $project_teaser
     * @return Projects
     */
    public function setProjectTeaser(string | null $project_teaser): Projects
    {
        $this->project_teaser = $project_teaser;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectDescription(): string | null
    {
        return $this->project_description;
    }

    /**
     * @param string|null $project_description
     * @return Projects
     */
    public function setProjectDescription(string | null $project_description): Projects
    {
        $this->project_description = $project_description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectGoal(): string | null
    {
        return $this->project_goal;
    }

    /**
     * @param string|null $project_goal
     * @return Projects
     */
    public function setProjectGoal(string | null $project_goal): Projects
    {
        $this->project_goal = $project_goal;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectMethod(): string | null
    {
        return $this->project_method;
    }

    /**
     * @param string|null $project_method
     * @return Projects
     */
    public function setProjectMethod(string | null $project_method): Projects
    {
        $this->project_method = $project_method;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectResults(): string | null
    {
        return $this->project_results;
    }

    /**
     * @param string|null $project_results
     * @return Projects
     */
    public function setProjectResults(string | null $project_results): Projects
    {
        $this->project_results = $project_results;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectSingleUrl(): string | null
    {
        return $this->project_single_url;
    }

    /**
     * @param string|null $project_single_url
     * @return Projects
     */
    public function setProjectSingleUrl(string | null $project_single_url): Projects
    {
        $this->project_single_url = $project_single_url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectImgUrl(): string | null
    {
        return $this->project_img_url;
    }

    /**
     * @param string|null $project_img_url
     * @return Projects
     */
    public function setProjectImgUrl(string | null $project_img_url): Projects
    {
        $this->project_img_url = $project_img_url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProjectImgName(): string | null
    {
        return $this->project_img_name;
    }

    /**
     * @param string|null $project_img_name
     * @return Projects
     */
    public function setProjectImgName(string | null $project_img_name): Projects
    {
        $this->project_img_name = $project_img_name;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getProjectInfos(): array | null
    {
        return $this->project_infos;
    }

    /**
     * @param array|null $project_infos
     * @return Projects
     */
    public function setProjectInfos(array | null $project_infos): Projects
    {
        $this->project_infos = $project_infos;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getProjectMeta(): array | null
    {
        return $this->project_meta;
    }

    /**
     * @param array|null $project_meta
     * @return Projects
     */
    public function setProjectMeta(array | null $project_meta): Projects
    {
        $this->project_meta = $project_meta;
        return $this;
    }
}

