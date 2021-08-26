<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(empty($country) || empty($states))
                <div class="p-6 bg-white border-b border-gray-200">
                    No data available yet
                </div>
                 @else
                 <div class="p-6 bg-white border-b border-gray-200">
                    Total of number of people we have in the country is: 
                    <strong>{{ $country }}</strong>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    This is count of the registered population per state:
                    <ul class='space-y-4'>
                        
                        @foreach( $states as $nameOfState => $countPerState)
                            <li class='flex justify-between'> 
                                <div>{{ $nameOfState }}</div>

                                <div>{{ $countPerState }}</div>
                           </li>
                        @endforeach
                    </ul>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    This is count of the registered population per <strong>LGA</strong>:
                    <ul class='space-y-4'>
                        
                        @foreach( $lgas as $nameOfLga => $countPerLga)
                            <li class='flex justify-between'> 
                                <div>{{ $nameOfLga }}</div>
                                
                                <div>{{ $countPerLga }}</div>
                           </li>
                        @endforeach
                    </ul>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    This is count of the registered population per <strong>Ward</strong>:
                    <ul class='space-y-4'>
                        
                        @foreach( $wards as $nameOfWard => $countPerWard)
                            <li class='flex justify-between'> 
                                <div>{{ $nameOfWard }}</div>
                                
                                <div>{{ $countPerWard }}</div>
                           </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="flex items-center justify-end mt-4">
                <a href='/dashboard/register'>

                <x-button class="ml-4" >
                    {{ __('Register a Citizen') }}
                </x-button>
                </a>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
