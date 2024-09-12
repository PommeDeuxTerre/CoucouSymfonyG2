<?php

namespace App\Entity;

use App\Repository\SectionRepository;
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
}
