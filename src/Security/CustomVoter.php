<?php

namespace App\Security;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class CustomVoter extends Voter {

    protected function supports($attribute, $subject)
    {
        dump($attribute, $subject);
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        // TODO: Implement voteOnAttribute() method.
    }
}