<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.io and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace BitBag\SyliusByrdShippingExportPlugin\Repository;

use BitBag\SyliusByrdShippingExportPlugin\Entity\ByrdProductMapping;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ProductInterface;

final class ByrdProductMappingRepository extends EntityRepository implements ByrdProductMappingRepositoryInterface
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(ByrdProductMapping::class));
    }

    public function findForProduct(ProductInterface $product): ?ByrdProductMapping
    {
        /** @var ByrdProductMapping|null $byrdProductMapping */
        $byrdProductMapping = $this->findOneBy(['product' => $product]);

        return $byrdProductMapping;
    }
}
