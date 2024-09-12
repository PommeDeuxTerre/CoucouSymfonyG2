<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column(
    options: ["unsigned" => true]
  )]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $SectionTitle = null;

  #[ORM\Column(length: 600)]
  private ?string $SectionDescription = null;

  /**
   * @var Collection<int, Post>
   */
  #[ORM\ManyToMany(targetEntity: Post::class, mappedBy: 'sections')]
  private Collection $posts;

  public function __construct()
  {
      $this->posts = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getSectionTitle(): ?string
  {
      return $this->SectionTitle;
  }

  public function setSectionTitle(string $SectionTitle): static
  {
      $this->SectionTitle = $SectionTitle;

      return $this;
  }

  public function getSectionDescription(): ?string
  {
      return $this->SectionDescription;
  }

  public function setSectionDescription(string $SectionDescription): static
  {
      $this->SectionDescription = $SectionDescription;

      return $this;
  }

  /**
   * @return Collection<int, Post>
   */
  public function getPosts(): Collection
  {
      return $this->posts;
  }

  public function addPost(Post $post): static
  {
      if (!$this->posts->contains($post)) {
          $this->posts->add($post);
          $post->addSection($this);
      }

      return $this;
  }

  public function removePost(Post $post): static
  {
      if ($this->posts->removeElement($post)) {
          $post->removeSection($this);
      }

      return $this;
  }
}
