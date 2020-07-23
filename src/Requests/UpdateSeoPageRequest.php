<?php

namespace OZiTAG\Tager\Backend\Seo\Requests;

use OZiTAG\Tager\Backend\Core\Http\FormRequest;
use Ozerich\FileStorage\Rules\FileRule;

class UpdateSeoPageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'string|nullable',
            'openGraphTitle' => 'string|nullable',
            'openGraphDescription' => 'string|nullable',
            'openGraphImage' => ['nullable', 'numeric', new FileRule()],
        ];
    }
}
