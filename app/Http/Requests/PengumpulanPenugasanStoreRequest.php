<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Status;

class PengumpulanPenugasanStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return $this->user()->roles[0]->name === 'karyawan';
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
            'penugasan_id'=>'required',
            'link_google_drive'=>'required',
            'user_id'=>'required',
            'catatan'=>'nullable',
            'status' => ['required', 'string', 'in:' . implode(',', array_column(Status::cases(), 'value'))],
        ];
    }
}
