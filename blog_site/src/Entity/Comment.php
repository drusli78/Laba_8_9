<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    collectionOperations: ['get'],
    itemOperations: ['get'],
)]

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $comment_text;

    #[ORM\Column(type: 'date')]
    private $data_add_comment;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'comment')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\ManyToOne(targetEntity: Post::class, inversedBy: 'comment')]
    #[ORM\JoinColumn(nullable: false)]
    private $post;

    #[ORM\Column(type: 'string', length: 255)]
    private $comment_status;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentText(): ?string
    {
        return $this->comment_text;
    }

    public function setCommentText(string $comment_text): self
    {
        $this->comment_text = $comment_text;

        return $this;
    }

    public function getDataAddComment(): ?\DateTimeInterface
    {
        return $this->data_add_comment;
    }

    public function setDataAddComment(\DateTimeInterface $data_add_comment): self
    {
        $this->data_add_comment = $data_add_comment;

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

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getCommentStatus(): ?string
    {
        return $this->comment_status;
    }

    public function setCommentStatus(string $comment_status): self
    {
        $this->comment_status = $comment_status;

        return $this;
    }
}
