<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'place' => 'required',
            'date' => 'required',
            'hour' => 'required',
            'ata' => 'mimes:jpeg,png,jpg,zip,pdf,doc,docx,odt|max:2048',
            'report' => 'mimes:jpeg,png,jpg,zip,pdf,doc,docx,odt|max:2048',
            'authoritie' => 'mimes:jpeg,png,jpg,zip,pdf,doc,docx,odt|max:2048',
            'attendance' => 'mimes:jpeg,png,jpg,zip,pdf,doc,docx,odt|max:2048',
            'evidence' => 'mimes:jpeg,png,jpg,zip,pdf,doc,docx,odt|max:2048',
        ];
    }
}
