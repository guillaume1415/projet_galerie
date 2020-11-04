<?php

namespace App\Entity;

use App\Repository\GalleryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GalleryRepository::class)
 */
class Gallery
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
     * @ORM\Column(type="binary")
     */
    private $status_gallery;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="gallery_has_user")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=picture::class, mappedBy="gallery")
     */
    private $gallery_id_gallery;

    /**
     * @ORM\ManyToMany(targetEntity=keywords::class, inversedBy="galleries")
     */
    private $keywords_has_gallery;



    public function __construct()
    {
        $this->gallery_id_gallery = new ArrayCollection();
        $this->keywords_has_gallery = new ArrayCollection();
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

    public function getStatusGallery()
    {
        return $this->status_gallery;
    }

    public function setStatusGallery($status_gallery): self
    {
        $this->status_gallery = $status_gallery;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|picture[]
     */
    public function getGalleryIdGallery(): Collection
    {
        return $this->gallery_id_gallery;
    }

    public function addGalleryIdGallery(picture $galleryIdGallery): self
    {
        if (!$this->gallery_id_gallery->contains($galleryIdGallery)) {
            $this->gallery_id_gallery[] = $galleryIdGallery;
            $galleryIdGallery->setGallery($this);
        }

        return $this;
    }

    public function removeGalleryIdGallery(picture $galleryIdGallery): self
    {
        if ($this->gallery_id_gallery->removeElement($galleryIdGallery)) {
            // set the owning side to null (unless already changed)
            if ($galleryIdGallery->getGallery() === $this) {
                $galleryIdGallery->setGallery(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|keywords[]
     */
    public function getKeywordsHasGallery(): Collection
    {
        return $this->keywords_has_gallery;
    }

    public function addKeywordsHasGallery(keywords $keywordsHasGallery): self
    {
        if (!$this->keywords_has_gallery->contains($keywordsHasGallery)) {
            $this->keywords_has_gallery[] = $keywordsHasGallery;
        }

        return $this;
    }

    public function removeKeywordsHasGallery(keywords $keywordsHasGallery): self
    {
        $this->keywords_has_gallery->removeElement($keywordsHasGallery);

        return $this;
    }
}
