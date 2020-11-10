<?php

namespace App\Entity;

use App\Repository\GalleryHasUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GalleryHasUserRepository::class)
 */
class GalleryHasUser
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
    private $status_user;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="user_id_user")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Gallery::class, inversedBy="gallery_id_gallery")
     */
    private $gallery;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusUser(): ?string
    {
        return $this->status_user;
    }

    public function setStatusUser(string $status_user): self
    {
        $this->status_user = $status_user;

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

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(?Gallery $gallery): self
    {
        $this->gallery = $gallery;

        return $this;
    }
}
