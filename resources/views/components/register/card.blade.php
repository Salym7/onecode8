<x-card>
    <x-card-header>
        <x-card-title>
            {{__('Register')}}
        </x-card-title>
        <x-slot name="right">
        <a href="{{route('login')}}">
        {{__('Вход')}}
        </a>
        </x-slot>
    </x-card-header>

    <x-card-body>
        <x-form action="{{route('register.store')}}" method="POST" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            {{-- <x-form-item>  --}}
            <x-label for="name" class="form-label text-left" required>{{__('Name')}}</x-label>
            <x-input type="name" name="name" class="form-control" id='name' autofocus aria-describedby="nameHelp" autofocus/>
            {{-- </x-form-item> --}}
            <x-form-item>
            <x-label for="email" class="form-label text-left" required>{{__('Email')}}</x-label>
            <x-input type="email" name="email" class="form-control" id='email' aria-describedby="emailHelp"/>
            </x-form-item>

            <x-form-item>
                <x-label for="exampleInputPassword1" class="form-label">{{__('Password')}}
                </x-label>
                <x-input type="password" name="password" class="form-control" id="exampleInputPassword1"/>
            </x-form-item>

            <x-form-item>
                <x-label for="exampleInputPassword2" class="form-label">{{__('Reapet password')}}
                </x-label>
                <x-input type="password" name="password2" class="form-control" id="exampleInputPassword2"/>
            </x-form-item>

            <x-form-item>
                <x-checkbox value="1" name="remember">
                {{__('read docum')}}
                </x-checkbox>
            </x-form-item>
            <x-button type="submit">Submit</x-button>
        </x-form>
    </x-card-body>
</x-card>