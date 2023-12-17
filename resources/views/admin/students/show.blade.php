@extends('layouts.layout')

@section('content')
<section id='detail'>
    <div class="container">
      @auth
        <h1 class='tambahh1'>{{ $student->full_name }}</h1>
            <p class='tambahp'>Detail Student {{ $student->full_name }}</p>
                <div class='d-flex justify-content-center align-items-start gap-5 mt-5'>
                    <form action='{{ route('admin.students.updateStatus', [$student->id]) }}' method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('POST')
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" name="full_name" value='{{ $student->full_name }}'>
                    <label for="id_card_address">Id Card Address</label>
                    <input type="text" id="id_card_address" name="id_card_address" value='{{ $student->id_card_address }}'>
                    <label for="current_address">Current Address</label>
                    <input type="text" id="current_address" name="current_address" value='{{ $student->current_address }}'>
                    <label for="district">District</label>
                    <input type="text" id="district" name="district" value='{{ $student->district }}'>
                    <label for="regency">Regency</label>
                    <input type="text" id="regency" name="regency" value='{{ $student->regency }}'>
                    <label for="province">Province</label>
                    <input type="text" id="province" name="province" value='{{ $student->province }}'>
                    <label for="phone_number">Phone Number</label>
                    <input type="number" id="phone_number" name="phone_number" value='{{ $student->phone_number }}'>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value='{{ $student->email }}'>
                    <label for="nationality_status">Nationality Status</label>
                    <select id="nationality_status" name="nationality_status">
                      <option value="WNI">WNI</option>
                      <option value="WNI Keturanan">WNI Keturunan</option>
                      <option value="WNA">WNA</option>
                    </select>
                    <label for="foreign_nationality">Foreign Nationality</label>
                    <input type="text" id="foreign_nationality" name="nationality_status" value='{{ $student->nationality_status }}'>
                    <label for="date_of_birth">Date Of Birth</label>
                    <input type="date" id="birth_data" name="birth_date">
                    <label for="birth_place">Birth Place</label>
                    <input type="text" id="birth_place" name="birth_place" value='{{ $student->birth_place }}'>
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      </select>
                      <label for="marital_status">Marital Status</label>
                      <select id="marital_status" name="marital_status">
                          <option value="single">Single</option>
                          <option value="married">Married</option>
                          <option value="other">Other</option>
                      </select>          
                    <label for="religion">Religion</label>
                    <select id="religion" name="religion">
                      <option value="Islam">Islam</option>
                      <option value="Catholic">Catholic</option>
                      <option value="Christian">Christian</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Buddha">Buddha</option>
                      <option value="Other">Other</option>
                    </select>
                      <label for="inputGroupFile01">Document</label>
                      <input type="file" class="form-control" id="inputGroupFile01" name="document" style="height: 40px;">
                      <label for="regis_status">Registration Status</label>
                      <input type="text" id="regis_status" name="registration status" value='{{ $student->registration_status }}'>
                      <button type="submit" class='btn btn-primary' style='margin-top: 40px;'>Edit</button>
                  </form>
              </div>
            @endauth
        </div>
    </section>
@if (session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif
@endsection