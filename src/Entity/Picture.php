<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureRepository::class)
 */
class Picture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_img;

    /**
     * @ORM\Column(type="integer")
     */
    private $width;

    /**
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * @ORM\ManyToOne(targetEntity=Gallery::class, inversedBy="gallery_id_gallery")
     */
    private $gallery;

    /**
     * @ORM\ManyToOne(targetEntity=Comment::class, inversedBy="picture_id_picture")
     */
    private $comment;

    /**
     * @ORM\ManyToMany(targetEntity=keywords::class, inversedBy="pictures")
     */
    private $picture_has_keywords;

    public function __construct()
    {
        $this->picture_has_keywords = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNameImg(): ?string
    {
        return $this->name_img;
    }

    public function setNameImg(string $name_img): self
    {
        $this->name_img = $name_img;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(?Gallery $gallery): self
    {
        $this->gallery = $gallery;

        return $this;
    }

    public function getComment(): ?Comment
    {
        return $this->comment;
    }

    public function setComment(?Comment $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return Collection|keywords[]
     */
    public function getPictureHasKeywords(): Collection
    {
        return $this->picture_has_keywords;
    }

    public function addPictureHasKeyword(keywords $pictureHasKeyword): self
    {
        if (!$this->picture_has_keywords->contains($pictureHasKeyword)) {
            $this->picture_has_keywords[] = $pictureHasKeyword;
        }

        return $this;
    }

    public function removePictureHasKeyword(keywords $pictureHasKeyword): self
    {
        $this->picture_has_keywords->removeElement($pictureHasKeyword);

        return $this;
    }
}
