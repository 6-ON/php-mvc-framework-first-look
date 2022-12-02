<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public array $errors = [];

    public function loadData($data)
    {
        foreach ($data as $item => $value) {
            if (property_exists($this, $item)) {
                $this->{$item} = $value;
            }
        }
    }

    public function validate(): bool
    {
        foreach ($this->rules() as $attr => $rules) {
            $value = $this->{$attr};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($rule)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName == self::RULE_REQUIRED && !$value) {
                    $this->addError($attr, self::RULE_REQUIRED);
                }
                if ($ruleName == self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attr, self::RULE_EMAIL);
                }
                if ($ruleName == self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addError($attr, self::RULE_MIN, $rule);
                }
                if ($ruleName == self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($attr, self::RULE_MAX,$rule);
                }
                if ($ruleName == self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addError($attr, self::RULE_MATCH,$rule);
                }


            }

        }
        return empty($this->errors);
    }

    abstract public function rules(): array;


    public function addError(string $attr, string $rule, $params = [])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attr][] = $message;
    }

    public function errorMessages(): array
    {
        return [
            self::RULE_REQUIRED => "this Field is Required",
            self::RULE_EMAIL => "this Field must be an email",
            self::RULE_MIN => "the min length of this must be {min}",
            self::RULE_MAX => "the max length of this must be {max}",
            self::RULE_MATCH => "this Field does not match {match}"
        ];
    }

}
