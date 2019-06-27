<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Petition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Petition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Petition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Petition[]    findAll()
 * @method Petition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PetitionRepository extends ServiceEntityRepository
{
    const ORDER_ASC = "asc";
    const ORDER_DESC = "desc";

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Petition::class);
    }

    /**
     * @param Petition[] $petitions
     * @param string $order
     * @return Petition[]
     */
    public static function orderPetitionsByDate(array $petitions, string $order): array
    {
        usort($petitions, function(Petition $petitionA, Petition $petitionB) use ($order) {
            if ($order === self::ORDER_ASC) {
                return $petitionA->getStopDate() < $petitionB->stopDate();
            } else if ($order === self::ORDER_DESC) {
                return $petitionA->getStopDate() > $petitionB->stopDate();
            } else {
                throw new \Exception("Wrong type of order");
            }
        });

        return $petitions;
    }
}
