<?php

namespace App\Repository;

use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

class CategoryRepository extends NestedTreeRepository
{
    public function updateAllChildrenPath($oldPath, $newPath, $left, $right)
    {
        $query = $this->getEntityManager()->createQuery('
            UPDATE Entity/Category c
            SET c.path = REGEXP_REPLACE(c.path, :oldPath, :newPath)
            WHERE c.lft > :left AND c.rgt < :right
            ')
            ->setParameter('oldPath', '^' . $oldPath)
            ->setParameter('newPath', $newPath)
            ->setParameter('left', $left)
            ->setParameter('right', $right);

        $query->execute();
    }
}