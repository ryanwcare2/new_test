<?php
declare(strict_types=1);

namespace App\Entity;

/**
 * Created by PhpStorm.
 * User: sash
 * Date: 27.06.19
 * Time: 11:34
 */

/**
 * Class PetitionOutputFormat
 * @package App\Entity
 */
class PetitionOutputFormat
{
    /** @var bool */
    private $isTitlePresent;
    /** @var bool */
    private $isLinkPresent;
    /** @var bool */
    private $isDescriptionPresent;
    /** @var bool */
    private $isPetitionIDPresent;
    /** @var bool */
    private $isSignatureCountPresent;
    /** @var bool */
    private $isSummaryPresent;

    /**
     * PetitionOutputFormat constructor.
     */
    public function __construct()
    {
        $this->isTitlePresent = false;
        $this->isLinkPresent = false;
        $this->isDescriptionPresent = false;
        $this->isPetitionIDPresent = false;
        $this->isSignatureCountPresent = false;
        $this->isSummaryPresent = false;
    }

    public function setIsTitlePresent($isTitlePresent): self
    {
        $this->isTitlePresent = $isTitlePresent;
        return $this;
    }

    public function getIsTitlePresent(): bool
    {
        return $this->isTitlePresent;
    }

    public function setIsLinkPresent($isLinkPresent): self
    {
        $this->isLinkPresent = $isLinkPresent;
        return $this;
    }

    public function getIsLinkPresent(): bool
    {
        return $this->isLinkPresent;
    }

    public function setIsDescriptionPresent($isDescriptionPresent): self
    {
        $this->isDescriptionPresent = $isDescriptionPresent;
        return $this;
    }

    public function getIsDescriptionPresent(): bool
    {
        return $this->isDescriptionPresent;
    }

    public function setIsPetitionIDPresent($isPetitionIDPresent): self
    {
        $this->isPetitionIDPresent = $isPetitionIDPresent;
        return $this;
    }

    public function getIsPetitionIDPresent(): bool
    {
        return $this->isPetitionIDPresent;
    }

    public function setIsSignatureCountPresent($isSignatureCountPresent): self
    {
        $this->isSignatureCountPresent = $isSignatureCountPresent;
        return $this;
    }

    public function getIsSignatureCountPresent(): bool
    {
        return $this->isSignatureCountPresent;
    }

    public function setIsSummaryPresent($isSummaryPresent): self
    {
        $this->isSummaryPresent = $isSummaryPresent;
        return $this;
    }

    public function getIsSummaryPresent(): bool
    {
        return $this->isSummaryPresent;
    }
}