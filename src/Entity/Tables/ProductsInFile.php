<?php

    namespace App\Entity\Tables;

    use Doctrine\ORM\Mapping as ORM;

    #[ORM\Entity]
    #[ORM\Table(name: 'products_in_file')]
    class ProductsInFile
    {
        #[ORM\Id]
        #[ORM\GeneratedValue(strategy: 'AUTO')]
        #[ORM\Column(type: 'integer')]
        private int $id;

        #[ORM\Column(type: 'string')]
        private string $name;

        #[ORM\Column(type: 'decimal')]
        private float $price;

        #[ORM\Column(type: 'string')]
        private string $image;

        //setters
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        public function setName(string $name): void
        {
            $this->name = $name;
        }

        public function setPrice(string $price): void
        {
            $this->price = $price;
        }

        public function setImage(string $image): void
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

        public function getPrice(): string
        {
            return $this->price;
        }

        public function getImage(): string
        {
            return $this->image;
        }
    }