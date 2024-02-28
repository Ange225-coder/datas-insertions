<?php

    namespace App\Forms\Fields;

    use Symfony\Component\Validator\Constraints as Assert;
    use Symfony\Component\HttpFoundation\File\UploadedFile;

    class ProductsInFileInsertionFields
    {
        #[Assert\NotBlank(message: 'Entrer un nom de produits')]
        #[Assert\Length(
            min: 5,
            max: 25,
            minMessage: 'Le nom du produit est court, min: 5',
            maxMessage: 'Le nom du produit est long, max: 25'
        )]
        private string $name;

        #[Assert\NotBlank(message: 'Entrer un prix pour le produit')]
        private string $price;

        #[Assert\NotBlank(message: 'Ajouter une image au produit')]
        #[Assert\File(
            maxSize: '2M',
            mimeTypes: ["image/jpeg", "image/png", "image/jpg", "image/jfif"],
            maxSizeMessage: 'Les fichiers ne doivent pas dépasser 2Mo',
            mimeTypesMessage: 'Les fichiers doivent être au format .jpeg, .png, .jpg, ou .jfif'
        )]
        private ?UploadedFile $image;

        //setters
        public function setName(string $name): void
        {
            $this->name = $name;
        }

        public function setPrice(string $price): void
        {
            $this->price = $price;
        }

        public function setImage(?UploadedFile $image): void
        {
            $this->image = $image;
        }


        //getters
        public function getName(): string
        {
            return $this->name;
        }

        public function getPrice(): string
        {
            return $this->price;
        }

        public function getImage(): ?UploadedFile
        {
            return $this->image;
        }
    }