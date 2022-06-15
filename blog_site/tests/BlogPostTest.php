<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogPostTest extends WebTestCase
{
    private array $trueCredentials = ['username' => 'timouri', 'password' => 'VwZEbFzs'];
    private array $falseCredentials = ['username' => 'root@mail.ru', 'password' => 'password'];

    public function testHomePage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseStatusCodeSame(200);
        $this->assertPageTitleContains('Post index');
        $this->assertCount(4, $crawler->filter('.supercard123'));
        $link = $crawler->selectLink('продолжить чтение...')->link();
        $client->click($link);
        $this->assertResponseStatusCodeSame(200);
        $this->assertPageTitleContains('Post');
    }

    public function testLogin(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $link = $crawler->selectLink('Вход')->link();
        $client->click($link);
        $this->assertResponseStatusCodeSame(200);
        $this->assertPageTitleContains('Log in!');
        $client->submitForm('Войти', $this->falseCredentials);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertSelectorTextContains('.alert.alert-danger', 'Invalid credentials.');
        $client->submitForm('Войти', $this->trueCredentials);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertPageTitleContains('Post index');
    }

    public function testAdding()
    {
        $client = static::createClient();
        $client->request('GET', '/add/post');
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertPageTitleContains('Log in!');
        $client->submitForm('Войти', $this->trueCredentials);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $post = [
            'post[post_name]' => '      ',
            'post[post_text]' => '      ',
            'post[blog][blog_name]' => '      '
        ];
        $client->submitForm('Отправить на проверку', $post);
        $this->assertResponseStatusCodeSame(500);
        $client->request('GET', '/add/post');
        $post = [
            'post[post_name]' => 'Заголовок поста',
            'post[post_text]' => 'Текст поста',
            'post[blog][blog_name]' => 'Блог'
        ];
        $client->submitForm('Отправить на проверку', $post);
        $this->assertResponseRedirects();
        $client->followRedirect();
        $this->assertPageTitleContains('Post index');
    }
}
