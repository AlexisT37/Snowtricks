<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TrickRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: TrickRepository::class)]
#[UniqueEntity(fields: ['name'], message: 'This name is already used')]
class Trick
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $trickgroup = null;

    #[ORM\Column(length: 255)]
    private ?string $imageLink = null;

    #[ORM\Column(length: 255)]
    private ?string $videoLink = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $modifedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $discussionChannel = null;

    #[ORM\Column]
    private ?bool $deleted = null;

    #[ORM\OneToMany(mappedBy: 'trick', targetEntity: ImageLink::class,cascade: ['persist'], orphanRemoval: true)]
    private Collection $imageLinks;

    public function __construct()
    {
        $this->setAuthor('Alexon');
        $this->setCreatedAt(new DateTimeImmutable());
        $this->setModifedAt(new DateTimeImmutable());
        $this->setDeleted(0);
        $this->setDiscussionChannel('trick-ollie');
        $this->imageLinks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getTrickgroup(): ?string
    {
        return $this->trickgroup;
    }

    public function setTrickgroup(string $trickgroup): self
    {
        $this->trickgroup = $trickgroup;

        return $this;
    }

    public function getImageLink(): ?string
    {
        return $this->imageLink;
    }

    public function setImageLink(string $imageLink): self
    {
        $this->imageLink = $imageLink;

        return $this;
    }

    public function getVideoLink(): ?string
    {
        return $this->videoLink;
    }

    public function setVideoLink(string $videoLink): self
    {
        $this->videoLink = $videoLink;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getModifedAt(): ?\DateTimeImmutable
    {
        return $this->modifedAt;
    }

    public function setModifedAt(\DateTimeImmutable $modifedAt): self
    {
        $this->modifedAt = $modifedAt;

        return $this;
    }

    public function getDiscussionChannel(): ?string
    {
        return $this->discussionChannel;
    }

    public function setDiscussionChannel(string $discussionChannel): self
    {
        $this->discussionChannel = $discussionChannel;

        return $this;
    }

    public function isDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return Collection<int, ImageLink>
     */
    public function getImageLinks(): Collection
    {
        return $this->imageLinks;
    }

    public function addImageLink(ImageLink $imageLink): self
    {
        if (!$this->imageLinks->contains($imageLink)) {
            $this->imageLinks->add($imageLink);
            $imageLink->setTrick($this);
        }

        return $this;
    }

    public function removeImageLink(ImageLink $imageLink): self
    {
        if ($this->imageLinks->removeElement($imageLink)) {
            // set the owning side to null (unless already changed)
            if ($imageLink->getTrick() === $this) {
                $imageLink->setTrick(null);
            }
        }

        return $this;
    }
}
