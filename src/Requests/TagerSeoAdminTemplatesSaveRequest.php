<?php

namespace OZiTAG\Tager\Backend\Seo\Requests;

use Ozerich\FileStorage\Rules\FileRule;
use OZiTAG\Tager\Backend\Core\Http\FormRequest;
use OZiTAG\Tager\Backend\Crud\Requests\CrudFormRequest;
use OZiTAG\Tager\Backend\Seo\TagerSeoConfig;

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
            'templates.*.pageTitle' => 'nullable|string',
            'templates.*.pageDescription' => 'nullable|string',
            'templates.*.pageKeywords' => 'nullable|string',
            'templates.*.openGraphImage' => ['nullable', new FileRule()]
        ];
    }
}
