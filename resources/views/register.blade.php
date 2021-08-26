<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- gender  -->
            <div class="mt-4">
                <x-label for='gender' :value="__('Gender')" />
                <select name='gender' id="gender" required value="old('gender')" class="block mt-1 w-full">
                    <option value='male'>Male</option>
                    <option value='female'>Female</option>
                </select>
            </div>
            <!-- Address Address -->
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            </div>
            
            <div class="mt-4 flex justify-between">
                <!-- State  -->
                <div>
                <x-label for='state' :value="__('State')" />
                <select name='state' id="state" required value="old('state')" class="block mt-1 ">
                    @foreach($states as $stateId => $stateArr)
                    
                        <option value="{{ $stateId}}">{{ $stateArr['state']->name }}</option>
                    @endforeach
                </select>
                </div>
                <!-- local government in  that state  -->
                <div>
                <x-label for='lga' :value="__('LGA')" />
                <select name='lga' id="lga" required value="old('lga')" class="block mt-1 w-full">
                    @foreach($states as $stateId => $stateArr)
                       @foreach($stateArr['lgas']->get() as $lga)
                      <strong>{{ $lga }}</strong>
                       <option value="{{ $lga->id}}">{{ $lga->name}}</option>
                       @endforeach
                    @endforeach
                </select>
                </div>
            </div>
             <!-- Ward in that local government -->
             <div class='mt-4'>
                <x-label for='ward' :value="__('ward')" />
                <select name='ward' id="ward" required value="old('ward')" class="block mt-1 w-full">
                    @foreach($states as $stateId => $stateArr)
                       @foreach($stateArr['lgas']->get() as $lga)
                        @foreach($lga->wards()->get() as $ward)
                       
                        <option value="{{ $ward->id}}">{{ $ward->name}}</option>
                        @endforeach
                       @endforeach
                    @endforeach
                </select>
                </div>
            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>


            <div class="flex items-center justify-end mt-4">
                

                <x-button class="ml-4">
                    {{ __('Register User') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
