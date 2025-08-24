<?php

namespace App\Livewire;

use Livewire\Component;

class HelloComponent extends Component
{
    public $input = '';
    public $message = 'no message';

    // バリデーションルールをメソッドとして定義する
    protected function rules()
    {
        return [
            'input' => 'required|min:5|max:255',
        ];
    }
    public function updateMessage()
    {
        $this->validate(); // 引数なしで呼び出すとrules()メソッドが自動的に使われる
        $this->message = 'Updated: ' . $this->input;
    }

    // コンポーネントのレンダリング処理
    public function render()
    {
        return view('livewire.hello-component');
    }
}
