<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Notification extends Component
{
    //通知タイトルと内容を受け取る公開プロパティ
    public $title;
    public $content;

    //childイベントを受け取るメソッド
    #[On('child-event')]
    public function handleChildEvent($msg)
    {
        $this->content = '親からの送信:' .$msg;
    }
    public function render()
    {
        return view('livewire.notification');
    }
}
