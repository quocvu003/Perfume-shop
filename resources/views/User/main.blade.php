<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.head')
</head>

<body> {{-- class="animsition" --}}

    <!-- Header -->
    @include('user.header')

    <!-- Cart -->
    @include('user.cart')








    @yield('content')
    <!-- Footer -->
    @include('user.footer')
</body>

</html>
