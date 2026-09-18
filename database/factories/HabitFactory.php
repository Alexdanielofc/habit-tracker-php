<?php

namespace Database\Factories;

use App\Models\Habit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $habits = [
            'Ler 10 páginas de um livro',
            'Fazer 30 minutos de exercício físico',
            'Meditar por 10 minutos',
            'Escrever no diário',
            'Aprender uma nova palavra em outro idioma',
            'Beber 2 litros de água',
            'Evitar redes sociais por 1 hora',
            'Caminhar 10.000 passos',
            'Praticar gratidão escrevendo 3 coisas boas do dia',
            'Organizar o espaço de trabalho',
            'Cozinhar uma refeição saudável',
            'Fazer alongamentos pela manhã',
            'Estudar um tópico novo por 30 minutos',
            'Desconectar-se de dispositivos eletrônicos antes de dormir',
            'Ajudar alguém com uma tarefa',
            'Ouvir um podcast educativo',
            'Fazer uma pausa para respirar profundamente',
            'Escrever uma carta ou mensagem para um amigo',
            'Aprender uma habilidade prática, como costura ou carpintaria',
            'Praticar um instrumento musical por 20 minutos',
            ];

        return [
            'name' => $this
                ->faker
                ->unique()
                ->randomElement($habits),
            'user_id' => 1
        ];
    }
}
