<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'title' => 'required|string|max:255|unique:posts,title',
			'content' => 'required|string|max:10000',
			'category_id' => 'required|integer|exists:categories,id',
			'created_by' => 'required|integer|exists:users,id',
		];
	}
    
	/**
	 * Get the validation messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'title.required' => 'Title should not be empty!',
			'title.string' => 'Title must be a string!',
			'title.max' => 'Title length must not exceed 255 characters!',
			'title.unique' => 'Title already exists!',
			'content.required' => 'Content should not be empty!',
			'content.string' => 'Content must be a string!',
			'content.max' => 'Content length must not exceed 10000 characters!',
			'category_id.required' => 'Category is required!',
			'category_id.integer' => 'Selected category is not valid!',
			'category_id.exists' => 'Selected category does not exist!',
			'created_by.required' => 'Created by is required!',
			'created_by.integer' => 'Created by must be an integer!',
			'created_by.exists' => 'Created by user does not exist!',
		];
	}
}