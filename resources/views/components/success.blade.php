@if(session('success'))
    <div class="bg-teal-100 border border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-5" role="alert">
        <p>{{ session('success') }}</p>
    </div>
@endif
