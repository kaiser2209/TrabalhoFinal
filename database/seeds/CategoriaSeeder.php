<?php

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nome' => 'Informática',
            'descricao' => 'Itens diversos de Informática'
        ]);
        Categoria::create([
            'nome' => 'Gamers',
            'descricao' => 'Consoles e Acessórios para Gamers'
        ]);
        Categoria::create([
            'nome' => 'Celular e Telefone',
            'descricao' => 'Telefones, celulares e smartphones'
        ]);
    }
}
