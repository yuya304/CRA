<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
         <div>
            <x-input-label for="student_number" :value="__('学籍番号')" />
            <x-text-input id="student_number" name="student_number" type="text" class="mt-1 block" :value="old('student_number', $user->student_number)" required autofocus autocomplete="student_number" />
            <x-input-error class="mt-2" :messages="$errors->get('student_number')" />
        </div>
        
        <div>
            <x-input-label for="name" :value="__('名前')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        
        <div>
            <x-input-label for="grade" :value="__('学年')" />
            <x-text-input id="grade" name="grade" type="text" class="mt-1 block" :value="old('grade', $user->grade)" required autofocus autocomplete="grade" />
            <x-input-error class="mt-2" :messages="$errors->get('grade')" />
        </div>
        
        <div>
            <x-input-label for="admission" :value="__('入学年度')" />
            <x-text-input id="admission" name="admission" type="text" class="mt-1 block" :value="old('admission', $user->admission)" required autofocus autocomplete="admission" />
            <x-input-error class="mt-2" :messages="$errors->get('admission')" />
        </div>
        
        <div>
            <x-input-label for="course_id" :value="__('学科・コース')" />
            <select class="block mt-1   border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="course_id" type="text" name="course_id" required autofocus autocomplete="course_id">
                @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('course_id')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block " :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('変更') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
