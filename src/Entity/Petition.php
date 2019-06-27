<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMSSerializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PetitionRepository")
 */
class Petition
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $petitionID;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $signatureCount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wideImage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wideThumb;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wideFacebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wideMobile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $freeFormSponsor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $freeFormTarget;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $uri;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $flowTemplate;

    /**
     * @ORM\Column(type="string")
     */
    private $stopdate;

    /**
     * @ORM\Column(type="text")
     */
    private $summary;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $extendedBody;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPetitionID(): ?int
    {
        return $this->petitionID;
    }

    public function setPetitionID(int $petitionID): self
    {
        $this->petitionID = $petitionID;

        return $this;
    }

    public function getSignatureCount(): ?int
    {
        return $this->signatureCount;
    }

    public function setSignatureCount(?int $signatureCount): self
    {
        $this->signatureCount = $signatureCount;

        return $this;
    }

    public function getWideImage(): ?string
    {
        return $this->wideImage;
    }

    public function setWideImage(?string $wideImage): self
    {
        $this->wideImage = $wideImage;

        return $this;
    }

    public function getWideThumb(): ?string
    {
        return $this->wideThumb;
    }

    public function setWideThumb(?string $wideThumb): self
    {
        $this->wideThumb = $wideThumb;

        return $this;
    }

    public function getWideFacebook(): ?string
    {
        return $this->wideFacebook;
    }

    public function setWideFacebook(?string $wideFacebook): self
    {
        $this->wideFacebook = $wideFacebook;

        return $this;
    }

    public function getWideMobile(): ?string
    {
        return $this->wideMobile;
    }

    public function setWideMobile(?string $wideMobile): self
    {
        $this->wideMobile = $wideMobile;

        return $this;
    }

    public function getFreeFormSponsor(): ?string
    {
        return $this->freeFormSponsor;
    }

    public function setFreeFormSponsor(?string $freeFormSponsor): self
    {
        $this->freeFormSponsor = $freeFormSponsor;

        return $this;
    }

    public function getFreeFormTarget(): ?string
    {
        return $this->freeFormTarget;
    }

    public function setFreeFormTarget(?string $freeFormTarget): self
    {
        $this->freeFormTarget = $freeFormTarget;

        return $this;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(?string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    public function getFlowTemplate(): ?string
    {
        return $this->flowTemplate;
    }

    public function setFlowTemplate(?string $flowTemplate): self
    {
        $this->flowTemplate = $flowTemplate;

        return $this;
    }

    public function getStopdate(): ?\DateTimeInterface
    {
        return $this->stopdate;
    }

    public function setStopdate(\DateTimeInterface $stopdate): self
    {
        $this->stopdate = $stopdate;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getExtendedBody(): ?string
    {
        return $this->extendedBody;
    }

    public function setExtendedBody(?string $extendedBody): self
    {
        $this->extendedBody = $extendedBody;

        return $this;
    }
}
