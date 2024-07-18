<x-layout>
    <x-slot:heading>
       LOGIN
    </x-slot:heading>

    
  
    <form method ="POST" action="/login">
        @csrf

    <div class="space-y-12">
         <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Login into your account</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">It's easy, use your email and password</p>

                <div class="grid mt-3 grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field>
                        <x-form-label for="email">E-mail</x-form-label>
                        <div class="mt-2">
                        <!-- <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"> -->
                            <x-form-input 
                            name="email" 
                            id="email"  
                            placeholder="example@example.com"  
                            type="email" 
                            :value="old('email')"
                            required  />
                        </div>

                        <!-- Error validation server side -->
                        <x-form-error name="email" />
                    </x-form-field>



                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                        <!-- <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"> -->
                            <x-form-input 
                            name="password" 
                            id="password" 
                            placeholder="Abcd1234@!^" 
                            required />
                        </div>

                        <!-- Error validation server side -->
                        <x-form-error name="password" />
                    </x-form-field>


                </div>

            </div>

        
        </div>
    </div>

        <div class="mt-6 mr-321 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold ml-6 mr-56 leading-6 text-gray-900">Cancel</button>
            <x-form-button>Login</x-form-button>
        </div>
    </form>

</x-layout>