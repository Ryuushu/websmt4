<?php

use App\Events\MessageSent;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

Broadcast::channel('chat', function () {
    return true;
});
