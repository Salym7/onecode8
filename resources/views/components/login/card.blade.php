<x-card>
    <x-card-header>
        <x-card-title>
            {{__('Вход')}}
        </x-card-title>
        <x-slot name="right">
          <a href="{{route('register')}}">
          {{__('Регистрация')}}
          </a>
        </x-slot>
    </x-card-header>

    <x-card-body>
        <x-form action="{{route('login.store')}}" method="POST" >
          {{-- @csrf --}}
            <x-form-item>
              <x-label for="exampleInputEmail1" class="form-label text-left" required>{{__('Email')}}</x-label>
              <x-input type="email" class="form-control" id="exampleInputEmail1" name='name'  autofocus aria-describedby="emailHelp"/>
            </x-form-item>
            <x-form-item>
              <x-label for="exampleInputPassword1" class="form-label">{{__('Password')}}
              </x-label>
              <x-input type="password" class="form-control" id="exampleInputPassword1" name='password'/>
            </x-form-item>
            <x-form-item>
              <x-checkbox value="1" name='agreement'>
                {{__('Check me out')}}
              </x-checkbox>
            </x-form-item>
            <x-button type="submit" class="btn btn-primary">Submit</x-button>
          </x-form>
        </x-card-body>
</x-card>