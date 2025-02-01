<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'full_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'is_admin' => ['boolean'],
            'student_id' => ['nullable', 'exists:students,id'],
        ];

        // إضافة قواعد كلمة المرور فقط عند إنشاء مستخدم جديد أو تحديث كلمة المرور
        if ($this->isMethod('POST') || $this->has('password')) {
            $rules['password'] = [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ];
        }

        // تحقق من تفرد البريد الإلكتروني واسم المستخدم
        if ($this->isMethod('POST')) {
            $rules['email'][] = 'unique:users';
            $rules['name'][] = 'unique:users';
        } else {
            $rules['email'][] = 'unique:users,email,' . $this->user?->id;
            $rules['name'][] = 'unique:users,name,' . $this->user?->id;
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'اسم المستخدم مطلوب',
            'name.min' => 'يجب أن يكون اسم المستخدم على الأقل 3 أحرف',
            'name.unique' => 'اسم المستخدم مستخدم بالفعل',
            'full_name.required' => 'الاسم الكامل مطلوب',
            'full_name.min' => 'يجب أن يكون الاسم الكامل على الأقل 3 أحرف',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'يجب إدخال بريد إلكتروني صحيح',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'يجب أن تكون كلمة المرور على الأقل 8 أحرف',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
        ];
    }
}
