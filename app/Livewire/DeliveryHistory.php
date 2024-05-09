<?php
namespace App\Livewire;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\PackageSent;

class DeliveryHistory extends Component
{
    public array $packageStatuses = [
    ];
    public User $user;
    public string $status = '';

    public function submitStatus()
    {
        PackageSent::dispatch(auth()->user()->name, $this->status, Carbon::now());
        $this->reset('status');
    }

//    #[On('echo:delivery,PackageSent')]
    #[On('echo-private:delivery.{user.id},PackageSent')]
    public function onPackageSent($event)
    {
        $this->packageStatuses[] = $event;
    }

    public function render()
    {
        $this->user = auth()->user();
        return view('livewire.delivery-history');
    }
}
