<?php

namespace App\Controller;

use Doctrine\Common\Collections\Criteria;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class AdminController extends EasyAdminController
{
    public function recordsAction()
    {
        // get all the criteria for the search
        $search = $this->request->get('search', null);
        $order = $this->request->get('order', null);
        $offset = $this->request->get('offset', null);
        $sort = $this->request->get('sort', 'id');
        $limit = $this->request->get('limit', null);
        // get the searchable fields
        $class = $this->entity['class'];
        $em = $this->getDoctrine()->getManagerForClass($class);
        $searchableFields = array_keys($this->entity['search']['fields']);
        if ($search != "") {
            // FIXME:
            $criteria = new Criteria();
            foreach ($searchableFields as $field) {
                $criteria->orWhere($criteria->expr()->contains($field, $search));
            }
            if ($order) {
                $criteria->orderBy([$sort => $order]); // FIXME:
            }
            if (!is_null($offset)) {
                $criteria->setFirstResult($offset);
            }
            if ($limit) {
                $criteria->setMaxResults($limit);
            }
            $records = $em->getRepository($class)->matching($criteria);
        } else {
            $records = $em->getRepository($class)->findAll();
        }

        // fields to serialize
        $fields = $this->entity['list']['fields'];
        $fields['id'] = null;

        $fields = array_map(function ($field) {
            if (strpos($field, '.') !== false) {
                return explode('.', $field)[0];
            }
            return $field;
        }, array_keys($fields));


        // Serialize the data
        return $this->json([
            'rows' => $records,
            'total' => count($records),
            'totalNotFiltered' => count($records) // FIXME: get the proper total
        ], 200, [], [
            'attributes' => $fields,
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);
    }
}