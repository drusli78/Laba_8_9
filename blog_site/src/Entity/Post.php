<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
)]

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $post_name;

    #[ORM\Column(type: 'text')]
    private $post_text;

    #[ORM\Column(type: 'date')]
    private $data_add;

    #[ORM\Column(type: 'text')]
    private $annotation;

    #[ORM\Column(type: 'integer')]
    private $view_quantity;

    #[ORM\Column(type: 'string', length: 255)]
    private $image_post;

    #[ORM\ManyToOne(targetEntity: Blog::class, inversedBy: 'post')]
    #[ORM\JoinColumn(nullable: false)]
    private $blog;

    #[ORM\OneToMany(mappedBy: 'post', targetEntity: Comment::class)]
    private $comment;

    #[ORM\Column(type: 'string', length: 255)]
    private $post_status;

    public function __construct()
    {
        $this->comment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostName(): ?string
    {
        return $this->post_name;
    }

    public function setPostName(string $post_name): self
    {
        $this->post_name = $post_name;

        return $this;
    }

    public function getPostText(): ?string
    {
        return $this->post_text;
    }

    public function setPostText(string $post_text): self
    {
        $this->post_text = $post_text;

        return $this;
    }

    public function getDataAdd(): ?\DateTimeInterface
    {
        return $this->data_add;
    }

    public function setDataAdd(\DateTimeInterface $data_add): self
    {
        $this->data_add = $data_add;

        return $this;
    }

    public function getAnnotation(): ?string
    {
        return $this->annotation;
    }

    public function setAnnotation(string $annotation): self
    {
        $this->annotation = $annotation;

        return $this;
    }

    public function getViewQuantity(): ?int
    {
        return $this->view_quantity;
    }

    public function setViewQuantity(int $view_quantity): self
    {
        $this->view_quantity = $view_quantity;

        return $this;
    }

    public function getImagePost(): ?string
    {
        return $this->image_post;
    }

    public function setImagePost(string $image_post): self
    {
        $this->image_post = $image_post;

        return $this;
    }

    public function getBlog(): ?Blog
    {
        return $this->blog;
    }

    public function setBlog(?Blog $blog): self
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComment(): Collection
    {
        return $this->comment;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comment->contains($comment)) {
            $this->comment[] = $comment;
            $comment->setPost($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comment->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getPost() === $this) {
                $comment->setPost(null);
            }
        }

        return $this;
    }

    public function getPostStatus(): ?string
    {
        return $this->post_status;
    }

    public function setPostStatus(string $post_status): self
    {
        $this->post_status = $post_status;

        return $this;
    }
}
