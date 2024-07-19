<?php

namespace App\Http\Requests\Story\v1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SectionCFormRequest extends FormRequest
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
                'section_c_1' => 'nullable|boolean',
                'section_c_2' => 'nullable|boolean',
                'section_c_3' => 'nullable|boolean',
                'section_c_4' => 'nullable',
                'section_c_5' => 'nullable',
                'section_c_6' => 'nullable',
            ],
            2 => [
                'section_c_4' => 'nullable|required_if_accepted:section_c_1|numeric',
                'section_c_5' => 'nullable|required_if_accepted:section_c_2|numeric',
                'section_c_6' => 'nullable|required_if_accepted:section_c_3|numeric',
            ],
            3 => [
                'section_c_7' => 'nullable|boolean',
                'section_c_8' => 'nullable|boolean',
                'section_c_9' => 'nullable|boolean',
                'section_c_10' => 'nullable',
                'section_c_11' => 'nullable',
                'section_c_12' => 'nullable',
            ],
            4 => [
                'section_c_10' => 'nullable|required_if_accepted:section_c_7|numeric',
                'section_c_11' => 'nullable|required_if_accepted:section_c_8|numeric',
                'section_c_12' => 'nullable|required_if_accepted:section_c_9|numeric',
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
            'section_c_1.boolean' => 'This field must be a boolean.',
            'section_c_2.boolean' => 'This field must be a boolean.',
            'section_c_3.boolean' => 'This field must be a boolean.',
            'section_c_4.required_if' => 'This field is required.',
            'section_c_4.numeric' => 'This field must be a number.',
            'section_c_5.required_if' => 'This field is required.',
            'section_c_5.numeric' => 'This field must be a number.',
            'section_c_6.required_if' => 'This field is required.',
            'section_c_6.numeric' => 'This field must be a number.',
            'section_c_7.boolean' => 'This field must be a boolean.',
            'section_c_8.boolean' => 'This field must be a boolean.',
            'section_c_9.boolean' => 'This field must be a boolean.',
            'section_c_10.required_if' => 'This field is required.',
            'section_c_10.numeric' => 'This field must be a number.',
            'section_c_11.required_if' => 'This field is required.',
            'section_c_11.numeric' => 'This field must be a number.',
            'section_c_12.required_if' => 'This field is required.',
            'section_c_12.numeric' => 'This field must be a number.',
        ];
    }
}
