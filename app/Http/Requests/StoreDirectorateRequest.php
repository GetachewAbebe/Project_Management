<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDirectorateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $directorateId = $this->route('directorate') ? $this->route('directorate')->id : null;

        return [
            'name' => 'required|string|max:255|unique:directorates,name' . ($directorateId ? ",$directorateId" : ""),
        ];
    }
}
