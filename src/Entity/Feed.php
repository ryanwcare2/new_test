<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMSSerializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FeedRepository")
 */
class Feed
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @JMSSerializer\Exclude()
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     * @JMSSerializer\Type("array<App\Entity\Petition>")
     */
    private $petitions = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPetitions(): ?array
    {
        return $this->petitions;
    }

    public function setPetitions(?array $petitions): self
    {
        $this->petitions = $petitions;

        return $this;
    }
}
