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
     * @ORM\OneToMany(targetEntity=picture::class, mappedBy="comment")
     */
    private $picture_id_picture;

    public function __construct()
    {
        $this->picture_id_picture = new ArrayCollection();
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

    /**
     * @return Collection|picture[]
     */
    public function getPictureIdPicture(): Collection
    {
        return $this->picture_id_picture;
    }

    public function addPictureIdPicture(picture $pictureIdPicture): self
    {
        if (!$this->picture_id_picture->contains($pictureIdPicture)) {
            $this->picture_id_picture[] = $pictureIdPicture;
            $pictureIdPicture->setComment($this);
        }

        return $this;
    }

    public function removePictureIdPicture(picture $pictureIdPicture): self
    {
        if ($this->picture_id_picture->removeElement($pictureIdPicture)) {
            // set the owning side to null (unless already changed)
            if ($pictureIdPicture->getComment() === $this) {
                $pictureIdPicture->setComment(null);
            }
        }

        return $this;
    }


}
