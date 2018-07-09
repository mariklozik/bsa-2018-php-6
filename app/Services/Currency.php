<?php

namespace App\Services;


class Currency
{
    private $id;
    private $name;
    private $shortName;
    private $actualCourse;
    private $actualCourseDate;
    private $isActive;

    public function __construct(int $id,
                                string $name,
                                string $shortName,
                                int $actualCourse,
                                \DateTime $actualCourseDate,
                                bool $isActive
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->shortName = $shortName;
        $this->actualCourse = $actualCourse;
        $this->actualCourseDate = $actualCourseDate;
        $this->isActive = $isActive;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getShortName(): string
    {
        return $this->shortName;
    }
    public function getActualCourse(): int
    {
        return $this->actualCourse;
    }
    public function getActualCourseDate(): \DateTime
    {
        return $this->actualCourseDate;
    }
    public function isActive(): bool
    {
        return $this->isActive;
    }
}