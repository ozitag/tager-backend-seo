<?php

namespace OZiTAG\Tager\Backend\Seo\Requests;

use Ozerich\FileStorage\Rules\FileRule;
use OZiTAG\Tager\Backend\Core\Http\FormRequest;

/**
 * Class TagerSeoAdminTemplatesSaveRequest
 * @package OZiTAG\Tager\Seo\Requests
 *
 * @property array $templates
 */
class TagerSeoAdminTemplatesSaveRequest extends FormRequest
{
    public function rules()
    {
        return [
            'templates' => 'nullable|array',
            'templates.*.template' => 'string',
            'templates.*.pageTitle' => 'string',
            'templates.*.pageDescription' => 'string',
            'templates.*.openGraphImage' => ['nullable', new FileRule()]
        ];
    }
}
