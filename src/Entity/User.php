<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=gallery::class, mappedBy="user")
     */
    private $gallery_has_user;

    /**
     * @ORM\OneToMany(targetEntity=comment::class, mappedBy="user")
     */
    private $User_id_User;

    public function __construct()
    {
        $this->gallery_has_user = new ArrayCollection();
        $this->User_id_User = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|gallery[]
     */
    public function getGalleryHasUser(): Collection
    {
        return $this->gallery_has_user;
    }

    public function addGalleryHasUser(gallery $galleryHasUser): self
    {
        if (!$this->gallery_has_user->contains($galleryHasUser)) {
            $this->gallery_has_user[] = $galleryHasUser;
            $galleryHasUser->setUser($this);
        }

        return $this;
    }

    public function removeGalleryHasUser(gallery $galleryHasUser): self
    {
        if ($this->gallery_has_user->removeElement($galleryHasUser)) {
            // set the owning side to null (unless already changed)
            if ($galleryHasUser->getUser() === $this) {
                $galleryHasUser->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|comment[]
     */
    public function getUserIdUser(): Collection
    {
        return $this->User_id_User;
    }

    public function addUserIdUser(comment $userIdUser): self
    {
        if (!$this->User_id_User->contains($userIdUser)) {
            $this->User_id_User[] = $userIdUser;
            $userIdUser->setUser($this);
        }

        return $this;
    }

    public function removeUserIdUser(comment $userIdUser): self
    {
        if ($this->User_id_User->removeElement($userIdUser)) {
            // set the owning side to null (unless already changed)
            if ($userIdUser->getUser() === $this) {
                $userIdUser->setUser(null);
            }
        }

        return $this;
    }


}
