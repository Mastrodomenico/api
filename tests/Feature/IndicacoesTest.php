<?php

namespace Tests\Feature;

use App\Models\Indicacao;
use Tests\TestCase;

class IndicacoesTest extends TestCase
{

    public $header = [
        'Content-Type' => 'application/x-www-form-urlencoded',
        'Accept' => 'application/json'
    ];

    public function testCriarIndicacao(){

        $this->withHeaders($this->header)
            ->post(
                '/api/v1/indicacao',
                [
                    "nome" => 'Daniel Mastrodomenico',
                    "email" => 'dan.mastrodomenico@gmail.com',
                    "telefone" => '123123123',
                    "tipos_seguros_id" => '1',
                    "clientes_agentes_id" => '1'
                ]
            )
            ->assertStatus(201)
            ->assertJsonStructure(
                [
                    "id",
                    "nome",
                    "email",
                    "telefone",
                    "tipos_seguros_id",
                    "clientes_agentes_id",
                    "created_at",
                    "updated_at",
                    "tipo_seguro",
                    "valor_seguro"
                ]
            )->assertJsonFragment(
                [
                    "nome" => 'Daniel Mastrodomenico',
                    "email" => 'dan.mastrodomenico@gmail.com',
                    "telefone" => '123123123'
                ]
            );

    }

    public function testTodasAsIndicacoes()
    {

        $response = $this->withHeaders($this->header)->get('/api/v1/indicacao');

        $response->assertStatus(200);

        $response->assertJsonStructure(
            [
                [
                    "id",
                    "nome",
                    "email",
                    "telefone",
                    "status",
                    "tipos_seguros_id",
                    "clientes_agentes_id",
                    "created_at",
                    "updated_at",
                    "tipo_seguro",
                    "valor_seguro"
                ]
            ]
        );

        $response = $this->withHeaders($this->header)->get('/api/v1/indicacao?status=analise');

        $response
            ->assertStatus(200)
            ->assertJsonFragment(
            [
                'status' => 'analise',
            ]
        );

        $response = $this->withHeaders($this->header)->get('/api/v1/indicacao?status=123');

        $response->assertStatus(422);

    }

    public function testAtualizarIndicacao()
    {

        $this->withHeaders($this->header)->get('/api/v1/indicacao');

        $id = Indicacao::all()->last()->id;

        $response = $this->withHeaders($this->header)->put(
            "/api/v1/indicacao/$id",
            [
                "nome" => 'James Hatfield',
                "email" => 'metallica@gmail.com',
                "telefone" => '12 1234-1234',
                "tipos_seguros_id" => '2',
                "status" => "negociacao"
            ]
        );

        $response->assertStatus(200);

        $response->assertJsonStructure(
            [
                "id",
                "nome",
                "email",
                "telefone",
                "tipos_seguros_id",
                "clientes_agentes_id",
                "created_at",
                "updated_at"
            ]
        );

        $response->assertJsonFragment(
            [
                "nome" => 'James Hatfield',
                "email" => 'metallica@gmail.com',
                "telefone" => '12 1234-1234',
                "tipos_seguros_id" => '2',
                "status" => "negociacao"
            ]
        );

        $this->withHeaders($this->header)->put(
            "/api/v1/indicacao/$id",
            [
                "status" => "123"
            ]
        )->assertStatus(422);

        $this->withHeaders($this->header)->put(
            "/api/v1/indicacao/$id",
            [
                "tipos_seguros_id" => 'a',
            ]
        )->assertStatus(422);

    }

    public function testDeletarIndicacao()
    {

        $this->withHeaders($this->header)->get('/api/v1/indicacao');
        $id = Indicacao::all()->last()->id;

        $this->withHeaders($this->header)->delete(
            "/api/v1/indicacao/$id"
        )->assertStatus(204);

        $this->withHeaders($this->header)->delete(
            "/api/v1/indicacao/abc"
        )->assertStatus(404);

    }

    public function testIndicacao_porCorretora(){

        $response = $this->withHeaders($this->header)->get('/api/v1/indicacao/corretora/1');

        $response->assertStatus(200);

        $response->assertJsonStructure(
            [
                [
                    "id",
                    "nome",
                    "email",
                    "telefone",
                    "status",
                    "tipos_seguros_id",
                    "clientes_agentes_id",
                    "created_at",
                    "updated_at"
                ]
            ]
        )->assertJsonFragment(
            [
                'status' => 'analise',
            ]
        );

        $response = $this->withHeaders($this->header)->get('/api/v1/indicacao/corretora/1?status=analise');

        $response
            ->assertStatus(200)
            ->assertJsonFragment(
                [
                    'status' => 'analise',
                ]
            );

        $response = $this->withHeaders($this->header)->get('/api/v1/indicacao/corretora/1?status=123');

        $response->assertStatus(422);

    }


}
