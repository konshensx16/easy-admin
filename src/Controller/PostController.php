<?php

namespace App\Controller;

use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class PostController extends EasyAdminController
{

    protected function createListQueryBuilder($entityClass, $sortDirection, $sortField = null, $dqlFilter = null)
    {
        /** @var QueryBuilder $result */
        $result = parent::createListQueryBuilder($entityClass, $sortDirection, $sortField, $dqlFilter);
        if (method_exists($entityClass, 'getUser')) {
            $result->andWhere('entity.user = :user');
            $result->setParameter('user', $this->getUser());
        }
        return $result;
    }

    protected function createSearchQueryBuilder($entityClass, $searchQuery, array $searchableFields, $sortField = null, $sortDirection = null, $dqlFilter = null)
    {
        /** @var QueryBuilder $result */
        $result = parent::createListQueryBuilder($entityClass, $sortDirection, $sortField, $dqlFilter);
        if (method_exists($entityClass, 'getUser')) {
            $result->andWhere('entity.user = :user');
            $result->setParameter('user', $this->getUser());
        }
        return $result;
    }

}