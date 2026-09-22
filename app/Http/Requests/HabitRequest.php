<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HabitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $habit = $this->route('habit');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('habits', 'name')
                    ->where(fn ($query) => $query->where('user_id', $this->user()->id))
                    ->ignore($habit),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'Deve ser um texto válido.',
            'name.max' => 'Deve ter no máximo 255 caracteres.',
            'name.unique' => 'Você já possui um hábito com esse nome.',
        ];
    }
}
