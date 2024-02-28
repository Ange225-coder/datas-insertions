<?php

    namespace App\Entity\Tables;

    use Doctrine\ORM\Mapping as ORM;

    #[ORM\Entity]
    #[ORM\Table(name: 'products')]
    class Products
    {
        #[ORM\Id]
        #[ORM\GeneratedValue(strategy: 'AUTO')]
        #[ORM\Column(type: 'integer')]
        private int $id;

        #[ORM\Column(type: 'string', length: 55)]
        private string $name;

        #[ORM\Column(type: 'decimal')]
        private float $price;

        #[ORM\Column(type: 'blob')]
        private $image;


        //setters
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function setName(string $name): void
        {
            $this->name = $name;
        }

        public function setPrice(int $price): void
        {
            $this->price = $price;
        }

        public function setImage($image): void
        {
            $this->image = $image;
        }


        //getters
        public function getId(): int
        {
            return $this->id;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getPrice(): int
        {
            return $this->price;
        }

        public function getImage()
        {
            return $this->image;
        }
    }