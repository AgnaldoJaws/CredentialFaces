<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Produto;

class LoadProduto extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $categoriaLivros = $this->getReference('categoria-livros');
        $categoriaComputadores = $this->getReference('categoria-computadores');

        $produto = new Produto();
        $produto->setNome("Orientação a objetos")
            ->setCategoria($categoriaLivros)
            ->setDescricao("Descrição do livro");
        $manager->persist($produto);

        $produto = new Produto();
        $produto->setNome("Macbook Pro")
            ->setCategoria($categoriaComputadores)
            ->setDescricao("Descrição do computador");
        $manager->persist($produto);

        $manager->flush();

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 20;
    }


} 