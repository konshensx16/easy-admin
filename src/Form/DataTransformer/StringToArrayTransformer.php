<?php

namespace App\Form\DataTransformer;

use App\Entity\Tag;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class StringToArrayTransformer implements DataTransformerInterface {

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function transform($value)
    {
        return implode(', ', $value);
    }


    public function reverseTransform($value)
    {
        $names = array_unique(array_filter(array_map('trim', explode(',', $value))));

        $tags = $this->entityManager->getRepository(Tag::class)->findBy([
            'name' => $names,
        ]);

        $newNames = array_diff($names, $tags);

        foreach ($newNames as $name) {
            $tag = new Tag();
            $tag->setName($name);
            $tag->setSlug(strtolower(str_replace(" ", "-", $name)));
            $tags[] = $tag;
        }

        return $tags;
    }
}