<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_at;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="User_id_User")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=picture::class, inversedBy="comments")
     */
    private $picture_id_picture;



    public function __construct()
    {

    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getDateAt(): ?\DateTimeInterface
    {
        return $this->date_at;
    }

    public function setDateAt(\DateTimeInterface $date_at): self
    {
        $this->date_at = $date_at;

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

    public function getPictureIdPicture(): ?picture
    {
        return $this->picture_id_picture;
    }

    public function setPictureIdPicture(?picture $picture_id_picture): self
    {
        $this->picture_id_picture = $picture_id_picture;

        return $this;
    }




}
