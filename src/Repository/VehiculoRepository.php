<?php

namespace App\Repository;

use App\Entity\Vehiculo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vehiculo>
 *
 * @method Vehiculo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehiculo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehiculo[]    findAll()
 * @method Vehiculo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehiculo::class);
    }

    public function add(Vehiculo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Vehiculo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function obtenDetalleVehiculo($id_vehiculo)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * FROM detalle_vehiculo WHERE detalle_vehiculo.id =( SELECT detalle_id FROM vehiculo WHERE id = $id_vehiculo )";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        $detalle = $resultSet->fetchAll();
        return $detalle;
    }

    public function obtenVehiculo($id_vehiculo)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * FROM vehiculo WHERE id = $id_vehiculo";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        $v = $resultSet->fetchAll();
        return $v;
    }

    public function obtenVehiculos()
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * FROM vehiculo";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        $vehiculos = $resultSet->fetchAll();
        return $vehiculos;
    }

    public function obtenVehiculosDetalle()
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT
        v.id,
        v.matricula,
        dv.marca,
        dv.modelo,
        dv.caballos,
        dv.kilometros,
        dv.precio
        FROM
        detalle_vehiculo dv INNER JOIN vehiculo v ON
        dv.id = v.detalle_id";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        $vehiculos = $resultSet->fetchAllAssociative();
        return $vehiculos;
        var_dump($vehiculos);
    }


    //    /**
    //     * @return Vehiculo[] Returns an array of Vehiculo objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('v.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Vehiculo
    //    {
    //        return $this->createQueryBuilder('v')
    //            ->andWhere('v.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
