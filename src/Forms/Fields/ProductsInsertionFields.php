<?php

    namespace App\Forms\Fields;

    use Symfony\Component\Validator\Constraints as Assert;

    class ProductsInsertionFields
    {
        #[Assert\NotBlank(message: 'Le nom du produit est requis ')]
        #[Assert\Length(
            min: 4,
            max: 20,
            minMessage: 'Le nom du produit est trop court, min: 4',
            maxMessage: 'Le nom du produit est trop long, max: 20'
        )]
        private string $name;

        #[Assert\NotBlank(message: 'Entrez un prix pour le produit')]
        private float $price;

        #[Assert\File(
            maxSize: '2M',
            mimeTypes: ["image/jpeg", "image/png", "image/jpg", "image/jfif"],
            maxSizeMessage: 'Les fichiers ne doivent pas dépasser 2Mo',
            mimeTypesMessage: 'Les fichiers doivent être au format .jpeg, .png, .jpg, ou .jfif'
        )]
        #[Assert\NotBlank(message: 'Entrer un fichier pour continuer')]
        private $image;

        //setters
        public function setName(string $name): void
        {
            $this->name = $name;
        }

        public function setPrice(float $price): void
        {
            $this->price = $price;
        }

        public function setImage($image): void
        {
            $this->image = $image;
        }


        //getters
        public function getName(): string
        {
            return $this->name;
        }

        public function getPrice(): float
        {
            return $this->price;
        }

        public function getImage()
        {
            return $this->image;
        }
    }