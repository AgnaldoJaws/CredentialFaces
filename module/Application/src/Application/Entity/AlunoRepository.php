<?php

namespace Application\Entity;

use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository {
	
public function findByEmailAndPassword($email, $password) {

        $user = $this->findOneByEmail($email);
        if ($user) {
            $hashSenha = $user->encryptPassword($password);

            if ($hashSenha == $user->getSenha()) {
                return $user;
            }
            else
                return false;
        }
        else
            return false;
    }
	
} 