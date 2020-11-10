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
     * @ORM\OneToMany(targetEntity=galleryHasUser::class, mappedBy="user")
     */
    private $user_id_user;

    public function __construct()
    {
        $this->user_id_user = new ArrayCollection();
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
     * @return Collection|galleryHasUser[]
     */
    public function getUserIdUser(): Collection
    {
        return $this->user_id_user;
    }

    public function addUserIdUser(galleryHasUser $userIdUser): self
    {
        if (!$this->user_id_user->contains($userIdUser)) {
            $this->user_id_user[] = $userIdUser;
            $userIdUser->setUser($this);
        }

        return $this;
    }

    public function removeUserIdUser(galleryHasUser $userIdUser): self
    {
        if ($this->user_id_user->removeElement($userIdUser)) {
            // set the owning side to null (unless already changed)
            if ($userIdUser->getUser() === $this) {
                $userIdUser->setUser(null);
            }
        }

        return $this;
    }

}
