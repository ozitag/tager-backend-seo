<?php

namespace App\Http\Requests\Admin\Product;

use OZiTAG\Tager\Backend\Core\FormRequest;
use Ozerich\FileStorage\Rules\FileRule;

class UpdateSeoPageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'numeric|nullable',
            'openGraphTitle' => 'string|nullable',
            'openGraphDescription' => 'string|nullable',
            'coverImage' => ['nullable', 'numeric', new FileRule()],
        ];
    }
}
