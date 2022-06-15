<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Repository\UserRepository;

class ApiTest extends ApiTestCase
{
    public function apiToken(): string
    {
        $user = static::getContainer()->get(UserRepository::class)->findOneBy(['username' => 'timouri']);
        return $user->getApiToken();
    }

    public function testApiUsers()
    {
        $client = static::createClient();
        $client->request('GET', '/api/users');
        $this->assertResponseStatusCodeSame(401);
        $response = $client->withOptions([
            'headers' => ['x-auth-token' => $this->apiToken(), 'content-type' => 'application/json; charset=utf-8'],
        ])->request('GET', '/api/users');
        $this->assertResponseStatusCodeSame(200);
        $resultArray = $response->toArray();
        $this->assertJson($response->getContent());
        $this->assertIsArray($resultArray);
    }

    public function testPosts(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/posts');
        $this->assertResponseStatusCodeSame(401);
        $response = $client->withOptions([
            'headers' => ['x-auth-token' => $this->apiToken(), 'content-type' => 'application/json; charset=utf-8'],
        ])->request('GET', '/api/posts');
        $this->assertResponseStatusCodeSame(200);
        $resultArray = $response->toArray();
        $this->assertJson($response->getContent());
        $this->assertIsArray($resultArray);
    }

    public function testComments(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/comments');
        $this->assertResponseStatusCodeSame(401);
        $response = $client->withOptions([
            'headers' => ['x-auth-token' => $this->apiToken(), 'content-type' => 'application/json; charset=utf-8'],
        ])->request('GET', '/api/comments');
        $this->assertResponseStatusCodeSame(200);
        $resultArray = $response->toArray();
        $this->assertJson($response->getContent());
        $this->assertIsArray($resultArray);
    }

    public function testBlogs(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/blogs');
        $this->assertResponseStatusCodeSame(401);
        $response = $client->withOptions([
            'headers' => ['x-auth-token' => $this->apiToken(), 'content-type' => 'application/json; charset=utf-8'],
        ])->request('GET', '/api/blogs');
        $this->assertResponseStatusCodeSame(200);
        $resultArray = $response->toArray();
        $this->assertJson($response->getContent());
        $this->assertIsArray($resultArray);
    }
}