<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column(
    options: ["unsigned" => true]
  )]
  private ?int $id = null;

  #[ORM\Column(length: 255)]
  private ?string $postTitle = null;

  #[ORM\Column(type: Types::TEXT)]
  private ?string $postDescription = null;

  #[ORM\Column(
    type: Types::DATETIME_MUTABLE,
    options: [
      'default' => 'CURRENT_TIMESTAMP',
    ],
  )]
  private ?\DateTimeInterface $postDateCreated = null;

  #[ORM\Column(
    type: Types::DATETIME_MUTABLE, nullable: true)]
  private ?\DateTimeInterface $postDatePublished = null;

  #[ORM\Column]
  private ?bool $postIsPublished = null;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getPostTitle(): ?string
  {
      return $this->postTitle;
  }

  public function setPostTitle(string $postTitle): static
  {
      $this->postTitle = $postTitle;

      return $this;
  }

  public function getPostDescription(): ?string
  {
      return $this->postDescription;
  }

  public function setPostDescription(string $postDescription): static
  {
      $this->postDescription = $postDescription;

      return $this;
  }

  public function getPostDateCreated(): ?\DateTimeInterface
  {
      return $this->postDateCreated;
  }

  public function setPostDateCreated(\DateTimeInterface $postDateCreated): static
  {
      $this->postDateCreated = $postDateCreated;

      return $this;
  }

  public function getPostDatePublished(): ?\DateTimeInterface
  {
      return $this->postDatePublished;
  }

  public function setPostDatePublished(?\DateTimeInterface $postDatePublished): static
  {
      $this->postDatePublished = $postDatePublished;

      return $this;
  }

  public function isPostIsPublished(): ?bool
  {
      return $this->postIsPublished;
  }

  public function setPostIsPublished(bool $postIsPublished): static
  {
      $this->postIsPublished = $postIsPublished;

      return $this;
  }
}
