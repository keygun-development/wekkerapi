@extends('layouts.app')

@section('content')
    <div class="container px-4 mt-4">
        <div class="md:flex items-center justify-between">
            <div class="md:w-5/12 w-full">
                <h1 class="text-2xl font-bold">
                    Simple Alarm API
                </h1>
                <p class="text-justify">
                    This is just a basic API which uses post and get requests. The post request will send a request to the Javelin API
                    on the raspberry pi. The raspberry pi is hooked up to a 7 segment display which displays the current local time.
                    When the set time is reached the code will tell the buzzer to go off.
                </p>
            </div>
            <div class="md:w-6/12 w-full mt-4 md:mt-0">
                <p class="text-xl font-bold">
                    What time do you want to set the alarm?
                </p>
                <set-time>
                </set-time>
            </div>
        </div>
        <h2 class="mt-4 font-bold text-lg">
            Alle alarmen
        </h2>
        <div class="grid gap-2 md:grid-cols-4 sm:grid-cols-2 grid-cols-1">
            @foreach($alarms as $alarm)
                <card
                    ref="cardRef{{ $alarm->id }}"
                    :alarm-id="'{{ $alarm->id }}'"
                    :alarm-time="'{{ $alarm->time }}'"
                >
                    <div class="border border-black rounded-lg flex justify-between p-4 items-center">
                        <p class="text-lg">
                            {{ $alarm->time }}
                        </p>
                        <label class="switch">
                            <input
                                type="checkbox" {{ $alarm->isactive ? 'checked' : '' }}
                            @change="this.$refs.cardRef{{ $alarm->id }}.changeState($event)" />
                            <span class="slider round"></span>
                        </label>
                    </div>
                </card>
            @endforeach
        </div>
    </div>
@endsection
