<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
)]

#[ORM\Entity(repositoryClass: BlogRepository::class)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $blog_name;

    #[ORM\OneToMany(mappedBy: 'blog', targetEntity: Post::class)]
    private $post;

    public function __construct()
    {
        $this->post = new ArrayCollection();
    }
    public function __toString()
    {
        return (string) $this->getBlogName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlogName(): ?string
    {
        return $this->blog_name;
    }

    public function setBlogName(string $blog_name): self
    {
        $this->blog_name = $blog_name;

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getPost(): Collection
    {
        return $this->post;
    }

    public function addPost(Post $post): self
    {
        if (!$this->post->contains($post)) {
            $this->post[] = $post;
            $post->setBlog($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->post->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getBlog() === $this) {
                $post->setBlog(null);
            }
        }

        return $this;
    }
}
