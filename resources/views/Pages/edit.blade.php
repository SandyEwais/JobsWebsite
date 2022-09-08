
<x-layout>
    <div class="mx-4">
        <a href="{{route('index')}}" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Create a Post
                </h2>
                <p class="mb-4">Post a job to find a developer</p>
            </header>
    
            <form action="{{route('update',['job' => $job->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="company"
                        class="inline-block text-lg mb-2"
                        >Company Name</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="company"
                        value="{{$job->company}}"
                    />
                    @error('company')
                        <p style="width: 100%;
                        margin-top: 0.25rem;
                        font-size: .875em;
                        color: #dc3545;">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2"
                        >Job Title</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="title"
                        placeholder="Example: Senior Laravel Developer"
                        value="{{$job->title}}"
                    />
                    @error('title')
                        <p style="width: 100%;
                        margin-top: 0.25rem;
                        font-size: .875em;
                        color: #dc3545;">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label
                        for="location"
                        class="inline-block text-lg mb-2"
                        >Job Location</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="location"
                        placeholder="Example: Remote, Boston MA, etc"
                        value="{{$job->location}}"
                    />
                    @error('location')
                        <p style="width: 100%;
                        margin-top: 0.25rem;
                        font-size: .875em;
                        color: #dc3545;">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2"
                        >Contact Email</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="email"
                        value="{{$job->email}}"
                    />
                    @error('email')
                        <p style="width: 100%;
                        margin-top: 0.25rem;
                        font-size: .875em;
                        color: #dc3545;">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label
                        for="website"
                        class="inline-block text-lg mb-2"
                    >
                        Website/Application URL
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="website"
                        value="{{$job->website}}"
                    />
                    @error('website')
                        <p style="width: 100%;
                        margin-top: 0.25rem;
                        font-size: .875em;
                        color: #dc3545;">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Tags (Comma Separated)
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="tags"
                        placeholder="Example: Laravel, Backend, Postgres, etc"
                        value="{{$job->tags}}"
                    />
                    @error('tags')
                        <p style="width: 100%;
                        margin-top: 0.25rem;
                        font-size: .875em;
                        color: #dc3545;">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">
                        Company Logo
                    </label>
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="logo"
                        value=""
                    />
                    @error('logo')
                        <p style="width: 100%;
                        margin-top: 0.25rem;
                        font-size: .875em;
                        color: #dc3545;">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label
                        for="description"
                        class="inline-block text-lg mb-2"
                    >
                        Job Description
                    </label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="description"
                        rows="10"
                        placeholder="Include tasks, requirements, salary, etc"
                    >{{$job->description}}</textarea>
                    @error('description')
                        <p style="width: 100%;
                        margin-top: 0.25rem;
                        font-size: .875em;
                        color: #dc3545;">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Update Job
                    </button>
    
                    <a href="{{route('index')}}" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>