<?php

namespace App\Livewire;

use Livewire\Component;

class HelloComponent extends Component
{
    public $message = '';
    // public $name = '';
    // public $pass = '';
    // public $check = '';
    public $input = '';

    public function mount()
    {
        $this->message = "内部コンポーネントの利用";
        // $this->message = 'Event hook.';
        // $this->name = 'no name';
        // $this->check = 'no check.';
    }

    public function doAction()
    {
        $this->triggerChildEvent($this->input);
    }

    //子コンポーネントにイベントを送るメソッド
    public function triggerChildEvent($msg)
    {
        // 'childEvent' イベントを発生させ、メッセージを渡す
        $this->dispatch('child-event', $msg);
    }

    // public function updating($propertyName)
    // {
    //     $this->check = $propertyName;
    // }

    // public function updatingName($propertyValue)
    // {
    //     $this->message = 'update: ' . $this->check . ' = ' . $propertyValue;

    // }

    // public function updatingPass($propertyValue)
    // {
    //     $this->message = 'update: ' . $this->check . ' = ' . $propertyValue;
    // }

    // public function updateMessage()
    // {
    //     // not used.

    // }

    // コンポーネントのレンダリング処理
    public function render()
    {
        // $ob = ['msg' => 'レンダリングで値を渡します。'];
        // return view('livewire.hello-component', $ob);
        $alert = [
            'alert_title' => '重要なお知らせ',
            'alert_content' => 'システムからの重要な通知です。'
        ];
        return view('livewire.hello-component', $alert);
    }
}
