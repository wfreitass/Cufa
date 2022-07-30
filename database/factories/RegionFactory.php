<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $regionsPlanaltina = array('Arapoanga', 'Condomínio Mestre Darmas', 'Estância', 'Jardim Roriz', 'Nossa Senhora de Fátima', 'Setor Sul', 'Setor Tradicional', 'Vale do Amanhecer', 'Vila Vicentina');
        return [
            'name' => STR::class,
            'uf' => 'DF',
        ];
    }
}
