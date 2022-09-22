@auth
    <div class="py-4  flex justify-between items-center border-b mb-8">
        <div>
            <p class="text-medium text-3xl">mini-crm</p>
        </div>
        <div class="flex space-x-8">
                <a href="{{ url('admin/dashboard')}}" class="mr-4 dark:text-gray-500 {{ Request::is('admin/dashboard')  ? 'underline text-gray-900 font-bold' : 'text-gray-700' }}">Home</a>
                <a href="{{ url('admin/companies')}}" class="mr-4 dark:text-gray-500 {{ Request::is('admin/companies')  ? 'underline text-gray-900 font-bold' : 'text-gray-700' }}">Company</a>
                <a href="{{ url('admin/employees')}}" class="mr-4 dark:text-gray-500 {{ Request::is('admin/employees')  ? 'underline text-gray-900 font-bold' : 'text-gray-700' }}">Employee</a>
                <a href="{{ url('admin/logout') }}" class="{{ Request::is('admin/logout')  ? 'underline text-gray-900' : 'text-red-700' }}">Logout</a>
        </div>
    </div>
@endauth