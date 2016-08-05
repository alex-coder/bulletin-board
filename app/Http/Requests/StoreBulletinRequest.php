<?php

    namespace App\Http\Requests;

    class StoreBulletinRequest extends Request
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
                'title'       => 'required|filled|max:255',
                'description' => 'required|filled',
                'cost'        => 'required|filled|numeric|min:0',
                'image'       => 'image|max:3145728', // 3mb
                'image_url'   => 'url',
            ];
        }
    }
