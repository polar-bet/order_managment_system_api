<?php

namespace App\Http\Requests\Order;

use App\Models\Product;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'destination' => ['required', 'string'],
            'count' => ['required', 'integer', 'min:0'],
        ];
    }

    protected function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $product = Product::find($this->product_id);

            if ($product && $this->count > $product->count) {
                $validator->errors()->add('count', 'Запитувана кількість перевищує наявний запас.');
            }
        });
    }
}
