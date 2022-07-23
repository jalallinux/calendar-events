<?php

namespace App\Http\Requests\Api\Event;

use Illuminate\Foundation\Http\FormRequest;
use Morilog\Jalali\CalendarUtils;

class ShowEventRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'type' => $this->route('type'),
            'year' => $this->route('year'),
            'month' => $this->route('month'),
            'day' => $this->route('day'),
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function jDateArray(): array
    {
        [$year, $month, $day] = [$this->route('year'), $this->route('month'), $this->route('day', 1)];

        if ($this->route('type') == 'gregorian') {
            [$year, $month, $day] = CalendarUtils::toJalali($this->route('year'), $this->route('month'), $this->route('day', 1));
        }

        throw_unless(CalendarUtils::isValidateJalaliDate($year, $month, $day), new \Exception("Date is invalid."));

        return [$year, $month, is_null($this->route('day')) ? null : $day];
    }

    public function isDaily(): bool
    {
        return $this->route()->hasParameter('day');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => ['required', 'string', 'in:jalali,gregorian'],
            'year' => ['required', 'numeric', $this->type == 'jalali' ? 'gte:1349' : 'gte:1970'],
            'month' => ['required', 'numeric', 'gte:1', 'lte:12'],
            'day' => ['nullable', 'numeric', 'gte:1', 'lte:31'],
        ];
    }
}
