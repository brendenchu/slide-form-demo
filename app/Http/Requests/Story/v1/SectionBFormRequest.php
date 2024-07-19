<?php

namespace App\Http\Requests\Story\v1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SectionBFormRequest extends FormRequest
{
    public function __construct(
        private readonly int $page
    ) {
        parent::__construct();
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return (bool) $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return match ($this->page) {
            1 => [
                'section_b_1' => 'required|string|max:255',
                'section_b_2' => 'required|string|max:255',
                'section_b_3' => 'required|string|max:255',
            ],
            2 => [
                'section_b_4' => 'required|string|max:255',
                'section_b_5' => 'required|string|max:255',
                'section_b_6' => 'required|string|max:255',
            ],
            3 => [
                'section_b_7' => 'required|string|max:255',
                'section_b_8' => 'required|string|max:255',
                'section_b_9' => 'required|string|max:255',
            ],
            default => [],
        };
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'section_b_1.required' => 'This field is required.',
            'section_b_1.string' => 'This field must be a string.',
            'section_b_1.max' => 'This field must not exceed 255 characters.',
            'section_b_2.required' => 'This field is required.',
            'section_b_2.string' => 'This field must be a string.',
            'section_b_2.max' => 'This field must not exceed 255 characters.',
            'section_b_3.required' => 'This field is required.',
            'section_b_3.string' => 'This field must be a string.',
            'section_b_3.max' => 'This field must not exceed 255 characters.',
            'section_b_4.required' => 'This field is required.',
            'section_b_4.string' => 'This field must be a string.',
            'section_b_4.max' => 'This field must not exceed 255 characters.',
            'section_b_5.required' => 'This field is required.',
            'section_b_5.string' => 'This field must be a string.',
            'section_b_5.max' => 'This field must not exceed 255 characters.',
            'section_b_6.required' => 'This field is required.',
            'section_b_6.string' => 'This field must be a string.',
            'section_b_6.max' => 'This field must not exceed 255 characters.',
            'section_b_7.required' => 'This field is required.',
            'section_b_7.string' => 'This field must be a string.',
            'section_b_7.max' => 'This field must not exceed 255 characters.',
            'section_b_8.required' => 'This field is required.',
            'section_b_8.string' => 'This field must be a string.',
            'section_b_8.max' => 'This field must not exceed 255 characters.',
            'section_b_9.required' => 'This field is required.',
            'section_b_9.string' => 'This field must be a string.',
            'section_b_9.max' => 'This field must not exceed 255 characters.',
        ];
    }
}
