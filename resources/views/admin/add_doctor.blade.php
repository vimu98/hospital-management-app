<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        label {
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">



            <div class="container" align="center" style="padding-top: 100px; ">

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            x
                        </button>
                        {{ session()->get('success') }}
                    </div>
                @endif

                <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div style="padding: 15px">
                        <label for="">Doctor Name</label>
                        <input type="text" style="color: black;" name="name" placeholder="Enter the  name" required>
                    </div>
                    <div style="padding: 15px">
                        <label for="">Phone</label>
                        <input type="text" style="color: black;" name="phone" placeholder="Enter Phone No" required>
                    </div>
                    <div style="padding: 15px">
                        <label for="">Speciality</label>
                        <select name="speciality" style="width: 200px" required>
                            <option>--Select--</option>
                            <option value="skin">skin</option>
                            <option value="heart">heart</option>
                            <option value="eye">eye</option>
                            <option value="diabetics">diabetics</option>
                        </select>
                    </div>
                    <div style="padding: 15px">
                        <label for="">Room No</label>
                        <input type="text" style="color: black;" name="room" placeholder="Room No" required>
                    </div>
                    <div style="padding: 15px">
                        <label for="">Doctor Image</label>
                        <input type="file" name="file" required>
                    </div>
                    <div style="padding: 15px">

                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
        @include('admin.script')
    </div>
</body>

</html>
