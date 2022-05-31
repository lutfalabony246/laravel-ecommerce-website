<?php

class LoginRequest extends FormRequest
{
  protected $loginField;
  protected $loginValue;
  /**
   * Prepare the data for validation.
   *
   * @return void
   */
    protected function prepareForValidation()
    {
        $this->loginField = filter_var($this->input('login'),FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $this->loginValue = $this->input('login');
        $this->merge([$this->loginField => $this->loginValue]);
    }
}

  ?>
