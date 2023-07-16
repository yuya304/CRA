<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
    
        <!-- 学籍番号 -->
        <div class="mt-4">
            <x-input-label for="student_number" :value="__('学籍番号')" />
            <x-text-input id="student_number" class="block mt-1 w-full" type="text" name="student_number" :value="old('student_number')" required autofocus autocomplete="student_number" placeholder="20210000" />
            <x-input-error :messages="$errors->get('student_number')" class="mt-2" />
        </div>
    
        <!-- メールアドレス -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nihontaro@gmail.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    
        <!-- 名前 -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('名前')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="日本太郎" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
    
        <!-- 学年 -->
        <div class="mt-4">
            <x-input-label for="grade" :value="__('学年')" />
            <x-text-input id="grade" class="block mt-1 w-full" type="text" name="grade" :value="old('grade')" required autofocus autocomplete="grade" placeholder="1" />
            <x-input-error :messages="$errors->get('grade')" class="mt-2" />
        </div>
        
        <!-- 入学年度 -->
        <div class="mt-4">
            <x-input-label for="admission" :value="__('入学年度(西暦)')" />
            <x-text-input id="admission" class="block mt-1 w-full" type="text" name="admission" :value="old('admission')" required autofocus autocomplete="admission" placeholder="2021" />
            <x-input-error :messages="$errors->get('admission')" class="mt-2" />
        </div>
        
        <!-- 学科・コース -->
        <div class="mt-4">
            <x-input-label for="course_id" :value="__('学科・コース')" />
            <select class="block mt-1 w-full  border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="course_id" type="text" name="course_id" required autofocus autocomplete="course_id">
                @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
        </div>
        
        <!--パスワード -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- パスワード再入力 -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('パスワード(再入力)')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('すでに登録済みの場合') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
